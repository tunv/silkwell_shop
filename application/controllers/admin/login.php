<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class login extends MY_Controller
{
    const USER_COOKIE = 'user_id';
    const COOKIE_TIME = 86400;
    public function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('muser');
        $this->muser = new MUser();
    }

    public function index()
    {
        $user_id = get_cookie(self::USER_COOKIE);
        if (empty($user_id)) {
            $this->load->shop_login('admin/login');
            return;
        }

        redirect('admin/dashboard');
    }

    public function do_login() {
        $post_data = $this->input->post();
        if (empty($post_data['user_name'] || empty($post_data['password']))) {
            $data['error_message'] = 'Bạn cần nhập tài khoản và mật khẩu';
            $this->load->shop_login('admin/login', $data);
            return;
        }

        $result = $this->muser->login($post_data['user_name'], $post_data['password']);
        if (empty($result)) {
            $data['error_message'] = 'Tên đăng nhập hoặc mật khẩu không đúng ';
            $this->load->shop_login('admin/login', $data);
            return;
        }

        set_cookie(self::USER_COOKIE, $result[0]->user_id, self::COOKIE_TIME);
        redirect('admin/dashboard');
    }
}
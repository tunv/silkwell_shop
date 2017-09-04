<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {

    private $validation_rules = array(
        array(
            'field' => 'title',
            'label' => 'Tiêu đề',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => 'Nội dung',
            'rules' => 'required'
        )
    );

    function __construct() {
        parent::__construct();
        $this->load->model('mnews');
        $this->mnews = new MNews();
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Quản lý thông báo trên web";
        $data['action'] = 'insert';
        $post = $this->input->post();
        if ($post) {
            $insert_data = [
                'title' => $post['title'],
                'content' => $post['content'],
                'da_create' => date_create()->format('Y-m-d h:i:s'),
                'da_update' => date_create()->format('Y-m-d h:i:s')
            ];
            $news_id = $this->mnews->insertNew($insert_data);
            redirect(site_url() . 'admin/dashboard/news');
        }
        $this->load->admin_template('admin/news_insert', $data);
    }
    
    /**
     * For Edit / Update Product
     *
     * @param int $id
     */
    public function update($id = NULL) {
        $data['title'] = "Quản lý thông báo trên web";
        $data['action'] = 'update';
        $post = $this->input->post();
        if ($post) {
            $data = [
                'title' => $post['title'],
                'content' => $post['content'],
                'da_update' => date_create()->format('Y-m-d h:i:s')
            ];
            $this->mnews->updateNew($data, $id);
            redirect(site_url() . 'admin/dashboard/news');
        } else {
            $data['news'] = $this->mnews->getNew($id);
            $this->load->admin_template('admin/news_insert', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->mnews->deleteNew($id);

        redirect('admin/dashboard/news');
    }
}
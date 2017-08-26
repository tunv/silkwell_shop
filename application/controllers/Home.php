<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('mproduct');
        $this->mproduct = new MProduct();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['products'] = $this->mproduct->getAllProductCat();
        $data['giay_kho'] = $this->mproduct->getAllProductCat(1, 3);
        $data['giay_lau_tay'] = $this->mproduct->getAllProductCat(2, 3);
        $data['giay_cuon'] = $this->mproduct->getAllProductCat(3, 3);
        $this->load->shop_template('home', $data);
    }
}
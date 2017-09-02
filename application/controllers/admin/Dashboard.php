<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->mproduct = new MProduct();
        $this->mcategory = new MCategory();
    }

    public function index() {
        $data['title'] = "Dashboard Admin";
        $data['products'] = $this->mproduct->getAllProductCat();
        $this->load->admin_template('admin/product_list', $data);
    }

    public function category()
    {
        $data['title'] = "Dashboard Admin";
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/category_list', $data);
    }

}
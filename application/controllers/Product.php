<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->mproduct = new MProduct();
    }

    public function index() {
        $data['products'] = $this->mproduct->getAllProductCat();
        $this->load->shop_template('shop/product_index', $data);
    }

    public function detail($id) {
        $data['title'] = 'Details';
        $data['product'] = $this->mproduct->getProduct($id);
        $data['product_images'] = $this->mproduct->getProductImg($id);

        if (! empty($data['product'])) {
            $data['related_product'] = $this->mproduct->getRelateProduct($id, $data['product']->category_id);
        }

        $this->load->shop_template('shop/product_detail', $data);
    }
}

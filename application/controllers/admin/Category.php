<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Haidar Mar'ie
 * email : haidarvm@gmail.com
 */
class Category extends MY_Controller {

    private $validation_rules = array(
        array(
            'field' => 'name',
            'label' => 'Tên nhóm sản phẩm',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Mô tả',
            'rules' => 'required'
        )
    );

    function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Admin Create Category";
        $data['action'] = 'insert';
        $post = $this->input->post();
        if ($post) {
            $insert_data = [
                'category_name' => $post['name'],
                'category_description' => $post['description'],
            ];
            $insertCategoryId = $this->mcategory->insertCategory($insert_data);
            redirect(site_url() . 'admin/dashboard/category');
        }
        $this->load->admin_template('admin/category_insert', $data);
    }
    
    /**
     * For Edit / Update Product
     *
     * @param int $id
     */
    public function update($id = NULL) {
        $data['title'] = "Admin Edit Category";
        $data['action'] = 'update';
        $post = $this->input->post();
        if ($post) {
            $data = [
                'category_name' => $post['name'],
                'category_description' => $post['description']
            ];
            $this->mcategory->updateCategory($data, $id);
            redirect(site_url() . 'admin/dashboard/category');
        } else {
            $data['category'] = $this->mcategory->getCategory($id);
            $this->load->admin_template('admin/category_insert', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->mcategory->delete_category($id);

        redirect('admin/dashboard/category');
    }
}
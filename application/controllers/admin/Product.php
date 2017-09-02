<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends MY_Controller {
    private $validation_rules = array(
        array(
            'field' => 'name',
            'label' => 'Tên sản phẩm',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Giá',
            'rules' => 'required|is_numeric',
        ),
        array(
            'field' => 'description',
            'label' => 'Mô tả',
            'rules' => 'required'
        )
    );

    const MAIN = '0';
    const EXTRA = '1';
    const EXTENSION = array("jpeg","jpg","png");
    const PRODUCT_COOKIE = 'product_id';
    const COOKIE_TIME = 86400;

    public function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);
        $this->load->helper('cookie');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Admin Create Product";
        $data['action'] = 'insert';
        $data['categories'] = $this->mcategory->getAllCategories();
        $post_data = $this->input->post();
        if (empty($post_data) || $this->form_validation->run() === false) {
            $this->load->admin_template('admin/product', $data);
            return;
        }

        $tmp_product_id = $this->insert_product($post_data);

        if (empty($_FILES['img_0']['name'])) {
            $data['error_img_1'] = 'Bạn cần nhập ít nhất 1 ảnh cho sản phẩm!';
            $this->load->admin_template('admin/product', $data);
            return;
        }

        $insert_img_main = $this->get_image('img_0', $tmp_product_id, self::MAIN);

        if (is_string($insert_img_main) && ! in_array($insert_img_main, self::EXTENSION, true)) {
            $data['error_img_1'] = $insert_img_main;
            $this->load->admin_template('admin/product', $data);
            return;
        }

        $this->insert_product_img($tmp_product_id, self::MAIN, $insert_img_main);

        if (! empty($_FILES['img_1']['name'])) {
            $insert_img_extra = $this->get_image('img_1', $tmp_product_id, self::EXTRA);
            if (is_string($insert_img_extra) && ! in_array($insert_img_extra, self::EXTENSION, true)) {
                $data['error_img_2'] = $insert_img_extra;
                $this->load->admin_template('admin/product', $data);
                return;
            }
            $this->insert_product_img($tmp_product_id, self::EXTRA, $insert_img_extra);
        }

        $this->mproduct->editProduct(['status' => 1], $tmp_product_id);
        delete_cookie(self::PRODUCT_COOKIE);
        redirect('admin/dashboard');
    }

    private function get_image($img_name, $tmp_product_id, $index) {
        if (isset($_FILES[$img_name]) && ! empty($_FILES[$img_name]['name'])) {
            $file_size =$_FILES[$img_name]['size'];
            $file_tmp =$_FILES[$img_name]['tmp_name'];
            $file_type=$_FILES[$img_name]['type'];
            $ext = explode('.',$_FILES[$img_name]['name']);
            $file_ext = strtolower(end($ext));
            $file_name = 'assets/img/sanpham' . (string) $tmp_product_id . '_' . $index . '.' . $file_ext;

            if (! in_array($file_ext, self::EXTENSION, true)){
                $error_message = "Nhập định dạng ảnh không đúng, mời chọn file ảnh JPEG hoặc PNG.";
                return $error_message;
            }

            if($file_size > 2097152){
                $error_message = 'Dung lượng ảnh lớn hơn 2 MB';
                return $error_message;
            }

            if (file_exists($file_name)) {
                unlink($file_name);
            }

            move_uploaded_file($file_tmp, $file_name);
            return $file_ext;
        }

        return false;
    }

    private function insert_product_img($tmp_product_id, $index, $file_ext)
    {
        $insert_data['product_id'] = $tmp_product_id;
        $insert_data['img_name'] = 'sanpham' . (string) $tmp_product_id . '_' . $index . '.' . $file_ext;
        $insert_data['path'] = 'assets/img/' . $insert_data['img_name'];
        $insert_data['create_date'] = date_create()->format('Y-m-d h:i:s');

        return $this->mproduct->insertProductImg($insert_data);
    }

    /**
     * For Edit / Update Product
     *
     * @param int $id            
     */
    public function update($id = NULL) {
        $data['title'] = "Admin Edit Product";
        $data['action'] = 'update';
        if (empty(get_cookie(self::PRODUCT_COOKIE))) {
            set_cookie(self::PRODUCT_COOKIE, $id, self::COOKIE_TIME);
        }
        $data['product'] = $this->mproduct->getProduct($id);
        $data['getAllProductImg'] = $this->mproduct->getProductImg($id);
        $data['categories'] = $this->mcategory->getAllCategories();
        $post = $this->input->post();
        if ($post) {
            if ($this->form_validation->run() === false) {
                $this->load->admin_template('admin/product_update', $data);
                return;
            }
            $update_data = [
                'category_id' => $post['category_id'],
                'name' => $post['name'],
                'price' => $post['price'],
                'description' => $post['description'],
                'create_date' => date_create()->format('Y-m-d H:i:s')
            ];

            $this->mproduct->editProduct($update_data, $id);

            if (! empty($_FILES['img_0']['name'])) {
                $insert_img_main = $this->get_image('img_0', $id, self::MAIN);
                if (is_string($insert_img_main) && ! in_array($insert_img_main, self::EXTENSION, true)) {
                    $data['error_img_1'] = $insert_img_main;
                    $this->load->admin_template('admin/product_update', $data);
                }
            }

            if (! empty($_FILES['img_1']['name'])) {
                $insert_img_extra = $this->get_image('img_1', $id, self::EXTRA);
                if (is_string($insert_img_extra) && ! in_array($insert_img_extra, self::EXTENSION, true)) {
                    $data['error_img_2'] = $insert_img_extra;
                    $this->load->admin_template('admin/product_update', $data);
                }
            }
            delete_cookie(self::PRODUCT_COOKIE);
            redirect('admin/dashboard');
        } else {
            $this->load->admin_template('admin/product_update', $data);
        }
    }

    private function insert_product($data)
    {
        $product_id = get_cookie(self::PRODUCT_COOKIE);
        $insert_data = [
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'status' => 2,
            'create_date' => date_create()->format('Y-m-d H:i:s')
        ];
        if (empty($product_id)) {
            $product_id = $this->mproduct->insertQuickProduct($insert_data);
            set_cookie(self::PRODUCT_COOKIE, $product_id, self::COOKIE_TIME);
            return $product_id;
        }

        $this->mproduct->editProduct($insert_data, $product_id);
        return $product_id;
    }

    public function delete($id)
    {
        $this->mproduct->delete_product($id);
        redirect('admin/dashboard');
    }

}

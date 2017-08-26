<?php

class MProduct extends CI_Model
{
    public function getAllProductCat($cat = null, $limit = null, $offset = false) {
        $limit = $limit ? $limit : $limit = 16;
        $offset = $offset ? $offset : $offset = 0;

        $this->db->join('product_image', 'product_image.product_id = product.product_id','left');
        $this->db->join('category', 'category.category_id = product.category_id','inner');
        $this->db->group_by('product.product_id');
        $where = ! empty($cat) ? array('category.category_id' => $cat) : array();
        $query = $this->db->get_where('product', $where, $limit, $offset);
        return checkRes($query);
    }

    public function countAllProductCat($cat = null) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id');
        $this->db->join('category', 'category.category_id = product.category_id');
        $this->db->group_by('product.product_id');
        $where = ! empty($cat) ? array('category.category_id' => $cat) : array();
        $query = $this->db->get_where('product', $where);

        return $query->num_rows();
    }

    public function getProduct($id) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id','inner');
        $query = $this->db->get_where('product', array('product.product_id' => $id));
        return checkRow($query);
    }

    public function getProductImg($id) {
        $query = $this->db->get_where('product_image', array('product_id' => $id));

        return checkRes($query);
    }

    function insertProductImg($data) {
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }
    
    // Insert Quick Only
    function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }
    
    // Insert Quick Image Only
    function insertQuickProductImg($data) {
        $query = $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }

    function insertProductPrice($data) {
        $data_price['price'] = $data['price'];
        $data_price['unit_id'] = $data['unit_id'];
        $data_price['product_id'] = $data['product_id'];
        $data_price['status'] = 1;
        $data_price['description'] = "Product Pertama";
        $data_price['price'] = numberOnly($data['price']);
        $query = $this->db->insert('product_price', $data_price);
        return $this->db->insert_id();
    }

    function editProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
        unset($data['price']);
        unset($data['unit_id']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function updateProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
        $data['price'] = numberOnly($data['price']);
        $data['price_en'] = numberOnly($data['price_en']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function editProductImg($data, $id) {
        unset($data['image_id']);
        $query = $this->db->update('product_image', $data, array('image_id' => $id));
        fire($this->db->last_query());
        return $query;
    }

    /**
     * Resize Uploaded Image to original, small and thumb
     *
     * @param files $ori            
     * @param files $new            
     */
    function resize_all($config, $new_name, $width, $height, $quality, $type) {
        $config['new_image'] = FCPATH . 'assets/product/' . $type . '/' . $new_name;
        // echo $config['new_image'] . "<br/>";
        $config['width'] = $width;
        $config['height'] = $height;
        $config['quality'] = $quality;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        if (! $this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
        }
    }


    public function getRelateProduct($id, $category_id)
    {
        $result = $this->getAllProductCat($category_id);
        if (! empty($result)) {
            foreach ($result as $key => $value) {
                if ($value->product_id == $id) {
                    unset($result[$key]);
                }
            }
        }

        return array_slice($result, 0, 3);
    }
}

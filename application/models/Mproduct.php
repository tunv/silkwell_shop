<?php

class MProduct extends CI_Model
{
    public function getAllProductCat($cat = null, $limit = null, $offset = false) {
        $limit = $limit ? $limit : $limit = 16;
        $offset = $offset ? $offset : $offset = 0;

        $this->db->join('product_image', 'product_image.product_id = product.product_id','left');
        $this->db->join('category', 'category.category_id = product.category_id','inner');
        $this->db->group_by('product.product_id');
        $where = array('product.status' => 1);

        if (! empty($cat)) {
            $where['category.category_id'] = $cat;
        }

        $query = $this->db->get_where('product', $where, $limit, $offset);
        return checkRes($query);
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

    function editProduct($data, $id) {
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    public function delete_product($id)
    {
        $this->db->delete('product', ['product_id' => $id]);
        $images = $this->getProductImg($id);
        $this->db->delete('product_image', ['product_id' => $id]);
        foreach ($images as $value) {
            unlink($value->path);
        }
    }

    // Insert Quick Only
    public function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
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

    public function getFooterProduct()
    {
        $result['category_1'] = $this->getAllProductCat(1, 1);
        $result['category_2'] = $this->getAllProductCat(2, 1);
        $result['category_3'] = $this->getAllProductCat(3, 1);
        return $result;
    }
}

<?php

class MCategory extends CI_Model {
    function getAllCategories() {
        $query = $this->db->get('category');
        return checkRes($query);
    }

    function getCategory($id) {
        $query = $this->db->get_where('category', array('category_id' => $id));
        return checkRow($query);
    }

    function insertCategory($data) {
        unset($data['category_id']);
        $query = $this->db->insert('category', $data);
        return $this->db->insert_id();
    }
    
    function updateCategory($data, $id) {
        unset($data['category_id']);
        $query = $this->db->update('category', $data, array('category_id' => $id));
        return $query;
    }

    public function delete_category($id)
    {
        if (empty($id)) {
            return;
        }

        $this->db->delete('category', ['category_id' => $id]);
    }
}

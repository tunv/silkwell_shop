<?php
class MNews extends CI_Model {
    function getAllNews() {
        $this->db->order_by('da_update', 'desc');
        $query = $this->db->get('news');
        return checkRes($query);
    }

    public function getNew($id) {
        $query = $this->db->get_where('news', array('id' => $id));
        return checkRow($query);
    }

    function insertNew($data) {
        unset($data['id']);
        $query = $this->db->insert('news', $data);
        return $this->db->insert_id();
    }
    
    function updateNew($data, $id) {
        unset($data['id']);
        $query = $this->db->update('news', $data, array('id' => $id));
        return $query;
    }

    public function deleteNew($id)
    {
        if (empty($id)) {
            return;
        }

        $this->db->delete('news', ['id' => $id]);
    }
}

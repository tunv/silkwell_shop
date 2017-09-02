<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MUser extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($username, $password) {
        $query = $this->db->get_where('user', array(
            'username' => $username,
            'password' => $password
        ));

        return checkRes($query);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('mcategory');
        $this->load->model('muser');
        $this->mproduct = new MProduct();
        $this->muser = new MUser();
        $this->mcategory = new MCategory();
    }

}

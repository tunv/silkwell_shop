<?php
function checkRes($query) {
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

/**
 * Check if Result Query has one row
 *
 * @param unknown $query            
 * @return boolean
 */
function checkRow($query) {
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return false;
    }
}

if ( ! function_exists('my_model')) {
    function my_model($name)
    {
        $CI =& get_instance();
        $CI->load->model($name);
        $model = new $name;
        return $model;
    }
}

function get_sale_product() {
    return my_model('mproduct')->getFooterProduct();
}

/**
 * Count Row
 *
 * @param unknown $query            
 * @return boolean
 */
function countRow($query) {
    if ($query->num_rows() > 0) {
        return $query->num_rows();
    } else {
        return false;
    }
}


/**
 * For Back to previous URL
 */
function previous_url() {
    if ($_SESSION['last_url']) {
        return header('Location: ' . $_SESSION['last_url']);
    } elseif ($_SESSION['last_url'] == 'logout') {
        echo 'bad';
    } elseif ($_SESSION['cart_contents']) {
        return redirect('cart/list');
    } elseif (! isset($_SESSION['cart_contents'])) {
        return redirect('product');
    } else {
        return redirect('product/tees');
    }
}

function fire($log) {
    $ci = & get_instance();
    $ci->load->library('firephp');
    return $ci->firephp->log($log, __METHOD__);
}

function uploader($log) {
    $ci = & get_instance();
    $ci->load->library('uploadhandler');
    return $ci->uploadhandler->log($log, __METHOD__);
}

/**
 * Image Url
 *
 * @return string
 */
function img_url() {
    return base_url() . 'assets/img/';
}

/**
 * Product Small Image Url
 *
 * @return string
 */
function prod_small_url() {
    return base_url() . 'assets/product/small/';
}

function basic_path() {
    $fr_loc = explode('/', $_SERVER['SCRIPT_NAME']);
    $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $fr_loc[1] . '/';
    return $base_path;
}

/**
 *
 * @return page url
 */
function page_url() {
    return site_url() . 'page/';
}

/**
 * Delete Unused Character
 *
 * @param string $text          
 * @return mixed
 */
function delUn($text) {
    $remove = array( 'copy', 'close' );
    $string = str_replace($remove, '', $text);
    return $string;
}

/**
 * Replace char
 *
 * @param unknown $text         
 * @return mixed
 */
function repChar($text) {
    $remove = array( '&' );
    $string = str_replace($remove, '-', $text);
    return $string;
}

/**
 * Delete Extension
 *
 * @param unknown $filename         
 * @return mixed
 */
function delExt($filename) {
    return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
}

function clearName($filename) {
    return repChar(delUn(delExt($filename)));
}

/**
 * Minus Percantage Ex.
 * 90 - 10% = 80
 *
 * @param number $before            
 * @param number $min           
 * @return number
 */
function min_percent($before, $min) {
    return $before * ((100 - $min) / 100);
}

/**
 * Delete files
 *
 * @param path $path            
 */
function deleteFiles($path) {
    $files = glob($path . '*'); // get all file names
    foreach ($files as $file ) { // iterate files
        if (is_file($file))
            unlink($file); // delete file
                               // echo $file.'file deleted';
    }
}

if (!function_exists('short_name')) {
    function short_name(
        $name,
        $byte_num,
        $code = "UTF-8",
        $is_byte_check = false
    )
    {
        $str = $name;
        if (strlen($str) > $byte_num) {
            if ($is_byte_check === true) {
                $str = mb_strcut(strip_tags($str), 0, $byte_num, $code);
            } else {
                $str = mb_substr(strip_tags($str), 0, $byte_num, $code);
            }
            $str .= "...";
        }
        return $str;
    }
}

function debug($params) {
    echo '<pre>';
    print_r($params);
    echo '</pre>';
}

function dump($params) {
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
}

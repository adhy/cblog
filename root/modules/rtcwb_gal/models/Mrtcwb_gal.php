<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_gal extends CI_Model {
    var $table = 'cb_tags';
    var $column = array('id','nm_t','sl_c',
                        'c_date','u_date','status');
    var $order = array('nm_t' => 'asc');


}
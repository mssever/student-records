<?php

/**
 * classname:    Class_model
 */

class Class_model extends CI_Model {
  function __construct () {
    parent::__construct();
  }
  
  // $id_arr is an array of class IDs to return. If NULL, all classes
  // will be returned.
  function list_classes($id_arr = NULL) {
    if($id_arr) {
      foreach ($id_arr as $key => $value) {
        $this->db->or_where('id', $value);
      }
    }
    $this->db->order_by('term_begins', 'asc')->order_by('type', 'asc');
    $this->db->order_by('level', 'asc')->order_by('time', 'asc');
    return $this->db->get('classes')->result();
}


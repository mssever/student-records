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
  
  function add_class($form_data) {
    //discard fields that have no DB equivalent
    /*$fields = $this->db->list_fields('classes');
    foreach ($form_data as $key => $value) {
      if(!array_key_exists($key, $fields)) {
        unset($form_data[$key]);
      }
    }*/
    
    //insert the data
    $sql = 'INSERT INTO classes (term_begins, type, level, time) VALUES (?, ?, ?, ?)';
    $data = array($form_data['term_begins'], $form_data['type'], $form_data['level'], $form_data['time']);
    $this->db->query($sql, $data);
    //$this->db->insert('classes', $form_data);
    $id = $this->db->insert_id();
    if($this->db->affected_rows() < 1) {
      echo "<pre>ERROR\n".htmlspecialchars(print_r($this->db->last_query(),TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
      die();
    }
    return $id;
  }
}


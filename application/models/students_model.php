<?php

/**
 * classname:    Students_model
 */

class Students_model extends CI_Model {
  function __construct () {
    parent::__construct();
  }
  
  function list_students($id=NULL) {
    $this->db->select("id, first_name, last_name, CONCAT(first_name, ' ', last_name) AS full_name, nickname", FALSE);
    if ($id) {
      if (is_array($id)) {
        foreach ($id as $key => $value) {
          $this->db->or_where('id', $value);
        }
      }
      else {
        $$this->db->where('id', $value);
      }
    }
    $this->db->order_by('first_name', 'asc')->order_by('last_name', 'asc')->order_by('nickname', 'asc');
    return $this->db->get('students')->result();
  }
  
  function add_student($data) {
    $sql = "INSERT INTO students (first_name, last_name, nickname) VALUES (?, ?, ?)";
    $this->db->query($sql,array($data['first_name'],$data['last_name'],$data['nickname']));
    $id = $this->db->insert_id();
    if($this->db->affected_rows() < 1) {
      echo "<pre>ERROR\n".htmlspecialchars(print_r($this->db->last_query(),TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
      die();
    }
    return $id;
  }
}


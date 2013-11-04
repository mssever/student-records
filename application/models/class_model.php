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
    $this->db->select("id, level, type, TIME_FORMAT(time, '%H:%i') AS time, term_begins", FALSE);
    if($id_arr) {
      if(!is_array($id_arr)) $id_arr = array($id_arr);
      foreach ($id_arr as $key => $value) {
        $this->db->or_where('id', $value);
      }
    }
    $this->db->order_by('term_begins', 'asc')->order_by('type', 'asc');
    $this->db->order_by('level', 'asc')->order_by('time', 'asc');
    
    return $this->db->get("classes")->result();
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
  
  function class_description($class_obj) {
    return $class_obj->time.' Level '.$class_obj->level.' '.$class_obj->type.' class beginning on '.$class_obj->term_begins;
  }
  
  function class_description_by_id($class_id) {
    return $this->class_description($this->list_classes($class_id)[0]);
  }
  
  function add_student_to_class($class_id, $student_id) {
    $sql = 'INSERT INTO class_roster (class_id, student_id) VALUES (?, ?)';
    $this->db->query($sql, array($class_id, $student_id));
  }
  
  function remove_student_from_class($class_id, $student_id) {
    $sql = 'DELETE FROM class_roster WHERE class_id = ? AND student_id = ?';
    $this->db->query($sql, array($class_id, $student_id));
  }
  
  function get_attendance_dates($class_id) {
    $sql = "SELECT DISTINCT `date` FROM `attendance` WHERE `class_id` = ? ORDER BY `date`";
    return $this->db->query($sql, array($class_id))->result();
  }
}


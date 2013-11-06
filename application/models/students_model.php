<?php

/**
 * classname:    Students_model
 */

class Students_model extends CI_Model {
  function __construct () {
    parent::__construct();
  }
  
  function list_students($id=NULL) {
    $this->db->select("id, first_name, last_name, CONCAT(last_name, ', ', first_name) AS full_name, nickname", FALSE);
    if ($id) {
      if (is_array($id)) {
        foreach ($id as $key => $value) {
          $this->db->or_where('id', $value);
        }
      }
      else {
        $this->db->where('id', $id);
      }
    }
    $this->db->order_by('nickname', 'asc')->order_by('first_name', 'asc')->order_by('last_name', 'asc');
    return $this->db->get('students')->result();
  }
  
  function add_student($data) {
    if (!$data['nickname']) {
      $data['nickname'] = $data['first_name'];
    }
    $sql = "INSERT INTO students (first_name, last_name, nickname) VALUES (?, ?, ?)";
    $this->db->query($sql,array($data['first_name'],$data['last_name'],$data['nickname']));
    $id = $this->db->insert_id();
    if($this->db->affected_rows() < 1) {
      echo "<pre>ERROR\n".htmlspecialchars(print_r($this->db->last_query(),TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
      die();
    }
    return $id;
  }
  function edit_student($id, $data) {
    if (!$data['nickname']) {
      $data['nickname'] = $data['first_name'];
    }
    $sql = $this->db->update_string('students', $data, "id = ?");
    $this->db->query($sql, array($id));
  }
  
  function list_students_by_class($class_id) {
    $sql = <<<EOT
SELECT `students`.`id` AS id, CONCAT(`students`.`last_name` , ', ', `students`.`first_name`) AS full_name, `students`.`first_name`, `students`.`nickname` 
FROM `class_roster`, `students` 
WHERE `class_roster`.`class_id` = ?
AND `students`.`id` = `class_roster`.`student_id`
ORDER BY nickname, full_name
EOT;
    return $this->db->query($sql,array($class_id))->result();
  }
  
  function list_students_not_in_class($class_id) {
    $excluded = $this->list_students_by_class($class_id);
    $all_students = $this->list_students();
    $result = array();
    foreach ($all_students as $key => $student) {
      $found = FALSE;
      foreach ($excluded as $key2 => $skip_student) {
        if ($skip_student->id == $student->id) {
          $found = TRUE;
          break;
        }
      }
      if (!$found) {
        $result[] = $student;
      }
    }
    return $result;
  }
  
  function list_student_classes($student_id) {
    $result = array();
    $sql = "SELECT DISTINCT class_id AS id FROM class_roster WHERE student_id = ? ORDER BY class_id DESC";
    $class_ids = $this->db->query($sql, array($student_id))->result();
    foreach ($class_ids as $key => $class_id) {
      $result[] = $class_id->id;
    }
    return $result;
  }
  
  function get_attendance($student_id, $class_id) {
    $this->db->select('date, attendance, id');
    $this->db->where('class_id', $class_id)->where('student_id', $student_id);
    $this->db->order_by('date','asc');
    return $this->db->get('attendance')->result();
  }
  
  function add_class_attendance($class_id, $date, $data) {
    $sql="INSERT INTO attendance (class_id, student_id, date, attendance) VALUES (?, ?, ?, ?)";
    foreach ($data as $key => $student) {
      //echo "<pre>".htmlspecialchars(print_r(array('$sql'=>$sql,'$class_id'=>$class_id,'$student["student_id"]'=>$student['student_id'],'$date'=>$date, '$student["attendance"]'=>$student['attendance'],'$data'=>$data),TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
      $this->db->query($sql, array($class_id, $student['student_id'], $date, $student['attendance']));
    }
  }
  
  function update_class_attendance($attendance_id, $attendance) {
    $sql="UPDATE attendance SET attendance.attendance = ? WHERE id = ?";
    $this->db->query($sql,array($attendance, $attendance_id));
  }
  
  function delete_class_attendance($attendance_id) {
    $sql = "DELETE FROM attendance WHERE id = ?";
    $this->db->query($sql,array($attendance_id));
  }
}


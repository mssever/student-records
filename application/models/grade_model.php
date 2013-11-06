<?php

/**
 * classname:    Grade_model
 */

class Grade_model extends CI_Model {
  function __construct () {
    parent::__construct();
  }
  
  function get_grades_by_class($class_id) {
    $sql = <<<EOT
SELECT `grades`.`student_id`,
  CONCAT(students.last_name, ', ', students.first_name) AS full_name,
  students.nickname,
  grades.date,
  grades.score,
  grades.score_possible,
  grades.final_test,
  grades.description
FROM grades, students
WHERE class_id = ? AND grades.student_id = students.id
ORDER BY grades.date, grades.description, grades.id
EOT;
    return $this->db->query($sql, array($class_id))->result();
  }
  
  function get_grades_by_student($student_id) {
    $sql = <<<EOT
SELECT `grades`.`class_id`,
  classes.level AS class_level,
  classes.type AS class_type,
  classes.time AS class_time,
  classes.term_begins,
  grades.date,
  grades.score,
  grades.score_possible,
  grades.final_test,
  grades.description
FROM grades, classes
WHERE student_id = ? AND grades.class_id = classes.id
ORDER BY grades.class_id, grades.date, grades.description, grades.id
EOT;
    return $this->db->query($sql, array($student_id))->result();
  }
  
  function get_grades_by_class_and_student($class_id, $student_id) {
    $sql = <<<EOT
SELECT grades.class_id,
  grades.student_id,
  grades.date,
  grades.score,
  grades.score_possible,
  grades.final_test,
  grades.description
FROM grades, classes, students
WHERE
  grades.student_id = ?
  AND grades.class_id = ?
  AND grades.class_id = classes.id
  AND grades.student_id = students.id
ORDER BY grades.date, grades.description, grades.id
EOT;
    return $this->db->query($sql, array($student_id, $class_id))->result();
  }
}

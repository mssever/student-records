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
  CAST(grades.score AS char) * 1 AS score,
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
  CAST(grades.score AS char) * 1 AS score,
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
  CAST(grades.score AS char) * 1 AS score,
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
    return $result = $this->db->query($sql, array($student_id, $class_id))->result();
  }
  
  function add_single_grade($data) {
    // $data is an associative array with keys matching the columns in the database
    $sql = <<<EOT
INSERT INTO grades (
  class_id,
  student_id,
  description,
  date,
  score,
  score_possible,
  final_test
)
VALUES (?, ?, ?, ?, ?, ?, ?)
EOT;
    $score = $this->validate_score($data['score']);
    $this->db->query($sql, array($data['class_id'],$data['student_id'],$data['description'],$data['date'],$score,$data['score_possible'],$data['final_test']));
    return $this->db->insert_id();
  }
  
  function add_multiple_grades($class_id, $description, $date, $poss, $final, $scores_arr) {
    $sql = <<<EOT
INSERT INTO grades (
  class_id,
  student_id,
  description,
  date,
  score,
  score_possible,
  final_test
)
VALUES 
EOT;
    $arr_str = array();
    $arr_subs = array();
    foreach ($scores_arr as $student_id => $score) {
      $score = $this->validate_score($score);
      $arr_str[] = "(?, ?, ?, ?, ?, ?, ?)";
      $arr_subs = array_merge($arr_subs, array($class_id, $student_id, $description, $date, $score, $poss, $final));
    }
    $sql .= implode(', ', $arr_str);
    $this->db->query($sql, $arr_subs);
  }
  
  function update_single_grade($grade_id, $description, $date, $score, $poss, $final) {
    $sql = <<<EOT
UPDATE grades
SET
  description = ?,
  date = ?,
  score = ?,
  score_possible = ?,
  final_test = ?
WHERE id = ?
EOT;
    $this->db->query($sql, array($description, $date, $this->validate_score($score), $poss, $final));
  }
  
  function validate_score($score) {
    $score = trim($score);
    if (!is_numeric($score)) {
      $score = 0;
    }
    return $score;
  }
}

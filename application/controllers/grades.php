<?php

/**
 * classname:    Grades
 */

class Grades extends CI_Controller {
  function __construct () {
    parent::__construct();
  }
  
  function add_single() {
    $this->load->model('Grade_model');
    $form = $this->input->post(NULL,TRUE);
    //echo "<pre>".htmlspecialchars(print_r($form,TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
    $this->Grade_model->add_single_grade($form);
    redirect('students/view/'.$form['student_id']);
  }
  
  function view_class($class_id) {
    $this->load->model('Grade_model');
    $this->load->model('Class_model');
    $this->load->model('Students_model');
    $this->load->helper('form');
    
    $data['title'] = 'Class Grades';
    $data['class_id'] = $class_id;
    $data['class_name'] = $this->Class_model->class_description_by_id($class_id);
    $students = $this->Students_model->list_students_by_class($class_id);
    $data['students'] = array();
    for ($i = 0; $i < count($students); $i++) {
      $data['students'][$i]['student'] = $students[$i];
      $grades = $this->Grade_model->get_grades_by_class_and_student($class_id, $students[$i]->id);
      $data['students'][$i]['grades'] = $grades;
      $g = $this->Grade_model->grade_breakdown($grades);
      $reg_grades = $g['regular_scores'];
      $reg_possible = $g['regular_scores_total'];
      $final_grades = $g['final_scores'];
      $final_possible = $g['final_scores_total'];
      $data['students'][$i]['score_regular'] = $this->Grade_model->calculate_percentage($reg_grades, $reg_possible);
      $data['students'][$i]['score_final'] = $this->Grade_model->calculate_percentage($final_grades, $final_possible);
      $data['students'][$i]['score_grand_total'] = $this->Grade_model->calculate_final_average(
        array_sum($reg_grades),
        array_sum($reg_possible),
        array_sum($final_grades),
        array_sum($final_possible)
      );
    }
    
    $this->load->view('head', $data);
    $this->load->view('grades/view_classes', $data);
    $this->load->view('foot');
  }
  
  function add_by_class($class_id) {
    $this->load->helper('form');
    $this->load->model('Class_model');
    $this->load->model('Students_model');
    
    $data['title'] = "Add New Grades";
    $data['class_name'] = $this->Class_model->class_description_by_id($class_id);
    $data['class_id'] = $class_id;
    $data['students'] = $this->Students_model->list_students_by_class($class_id);
    //echo "<pre>".htmlspecialchars(print_r($data,TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
    
    $this->load->view('head', $data);
    $this->load->view('grades/add_by_class', $data);
    $this->load->view('foot');
  }
  
  function add_by_class_processor() {
    $form = $this->input->post(NULL,TRUE);
    $this->load->model('Grade_model');
    
    $this->Grade_model->add_multiple_grades($form['class_id'],$form['description'],$form['date'],$form['score_possible'], $form['final_test'], $form['score']);
    //echo "<pre>".htmlspecialchars(print_r($form,TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
    redirect("grades/view_class/".$form['class_id']);
  }
}

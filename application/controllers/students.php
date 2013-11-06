<?php

/**
 * classname:    Students
 */

class Students extends CI_Controller {
  function __construct () {
    parent::__construct();
  }
  
  function view($which=NULL) {
    $this->load->model('Students_model');
    $this->load->helper('form');
    
    if ($which === NULL) $this->_view_all();
    else $this->_view_by_id($which);
  }
  
  //lists students in a particular class
  function esl_class($class_id) { // URIs call as students/class
    $this->load->model('Students_model');
    $this->load->model('Class_model');
    $this->load->helper('form');
    
    $data['title'] = 'Students in Class';
    $data['class_id'] = $class_id;
    $data['students'] = $this->Students_model->list_students_by_class($class_id);
    $not_in_class = $this->Students_model->list_students_not_in_class($class_id);
    $data['students_not_in_class'][0] = '';
    foreach ($not_in_class as $key => $student) {
      $data['students_not_in_class'][$student->id] = $student->nickname.' ('.$student->full_name.')';
    }
    $data['class'] = $this->Class_model->class_description($this->Class_model->list_classes($class_id)[0]);
    
    $this->load->view('head', $data);
    $this->load->view('students/class', $data);
    $this->load->view('foot');
  }
  
  function add_to_class($class_id) {
    $this->load->model('Class_model');
    $form = $this->input->post(NULL,TRUE);
    if ($form['student_id'] != 0) {
      $this->Class_model->add_student_to_class($class_id, $form['student_id']);
    }
    redirect('students/class/'.$class_id);
  }
  
  function add_student_with_class() {
    $this->load->model('Students_model');
    $this->load->model('Class_model');
    $form = $this->input->post(NULL,TRUE);
    $class_id = $form['class_id'];
    $student_id = $this->Students_model->add_student($form);
    $this->Class_model->add_student_to_class($class_id, $student_id);
    redirect("students/class/$class_id");
  }
  
  function remove_from_class($class_id, $student_id) {
    $this->load->model('Class_model');
    $this->Class_model->remove_student_from_class($class_id, $student_id);
    redirect("students/class/$class_id");
  }
  
  function edit() {
    $this->load->model('Students_model');
    $form = $this->input->post(NULL,TRUE);
    $id = $form['id'];
    $data['first_name'] = $form['first_name'];
    $data['last_name'] = $form['last_name'];
    $data['nickname'] = $form['nickname'];
    $this->Students_model->edit_student($id, $data);
    redirect("students/view/$id");
  }
  
  function _view_all() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->_add_student_validation_rules());
    
    $data['title'] = 'All students';
    $data['add_success'] = '';
    
    if ($this->form_validation->run() !== FALSE) {
      $data['add_id'] = $this->Students_model->add_student($this->input->post(NULL,TRUE));
      $data['add_success'] = $this->input->post('first_name')." added with ID ".$data['add_id'].'.';
    }
    
    $data['students'] = $this->Students_model->list_students();
    
    $this->load->view('head', $data);
    $this->load->view('students/view_all', $data);
    $this->load->view('foot');
  }
  
  function _view_by_id($id) {
    $this->load->model('Class_model');
    $this->load->model('Grade_model');
    
    $data['title'] = 'View student';
    $data['id'] = $id;
    $data['student'] = $this->Students_model->list_students($id)[0];
    $data['classes'] = $this->Students_model->list_student_classes($id);
    $data['classes_details'] = array();
    $data['class_attendance'] = array();
    $data['class_grades'] = array();
    foreach ($data['classes'] as $key => $class_id) {
      $data['classes_details'][$class_id] = $this->Class_model->class_description_by_id($class_id);
      $data['class_attendance'][$class_id] = $this->Students_model->get_attendance($id, $class_id);
      $data['class_grades'][$class_id] = $this->Grade_model->get_grades_by_class_and_student($class_id, $id);
    }
    $this->load->view('head', $data);
    $this->load->view('students/view_individual', $data);
    $this->load->view('foot');
  }
  
  function _add_student_validation_rules() {
    return array(
      array(
        'field' => 'first_name',
        'label' => 'First name',
        'rules' => 'trim|xss_filter|required'),
      array(
        'field' => 'last_name',
        'label' => 'Last name',
        'rules' => 'trim|xss_filter|required'),
      array(
        'field' => 'nickname',
        'label' => 'Nickname',
        'rules' => 'trim|xss_filter')
      );
  }
}


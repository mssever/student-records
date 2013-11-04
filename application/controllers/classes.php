<?php

/**
 * classname:    Classes
 */

class Classes extends CI_Controller {
  function __construct () {
    parent::__construct();
  }
  
  function view($which=NULL) {
    $this->load->model('Class_model');
    
    if ($which === NULL) $this->_view_all();
    else $this->_view_by_id($which);
  }
  
  function add() {
    $this->load->helper('form');
    $this->load->model('Class_model');
    $this->load->library('form_validation');
    
    $data['title'] = 'Add a Class';
    
    $validation_rules = array(
      array(
        'field' => 'term_begins',
        'label' => 'First day of term',
        'rules' => 'required'),
      array(
        'field' => 'type',
        'label' => 'Class type',
        'rules' => 'required|min_length[1]'),
      array(
        'field' => 'level',
        'label' => 'Level',
        'rules' => 'trim|required|integer'),
      array(
        'field' => 'time',
        'label' => 'Starting time',
        'rules' => 'required'),
      );
    $this->form_validation->set_rules($validation_rules);
    
    $this->load->view('head', $data);
    if($this->form_validation->run() === FALSE) {
      //form hasn't been submitted
      $this->load->view('classes/create_form');
    }
    else {
      //form has passed validation
      $data['id'] = $this->Class_model->add_class($this->input->post(NULL,TRUE));
      $this->load->view('classes/create_success', $data);
    }
    $this->load->view('foot');
  }
  
  function attendance($class_id) {
    $this->load->model('Class_model');
    $this->load->model('Students_model');
    $this->load->helper('form');
    
    $students = $this->Students_model->list_students_by_class($class_id);
    $i = 0;
    $data['students'] = array();
    foreach ($students as $key => $student) {
      $data['students'][$i]['id'] = $student->id;
      $data['students'][$i]['full_name'] = $student->full_name;
      $data['students'][$i]['first_name'] = $student->first_name;
      $data['students'][$i]['nickname'] = $student->nickname;
      $data['students'][$i]['attendance'] = $this->Students_model->get_attendance($student->id, $class_id);
      $i++;
    }
    $data['title'] = 'Attendance';
    $data['class_description'] = $this->Class_model->class_description_by_id($class_id);
    $data['class_id'] = $class_id;
    $data['attendance_options'] = array('Present'=>'P','Absent'=>'A','Tardy'=>'T');
    
    $this->load->view('head', $data);
    $this->load->view('classes/attendance', $data);
    $this->load->view('foot');
  }
  
  function update_attendance($class_id) {
    $this->load->model('Students_model');
    
    $form = $this->input->post(NULL,TRUE);
    foreach ($form['student'] as $student_id => $attendance) {
      $attendance_data[] = array('student_id'=>$student_id,'attendance'=>$attendance);
    }
    $this->Students_model->add_class_attendance($class_id, $form['date'], $attendance_data);
    redirect('classes/attendance/'.$class_id);
  }
  
  function _view_all() {
    $data['classes'] = $this->Class_model->list_classes();
    foreach ($data['classes'] as $key => $cls) {
      $data['classes_text'][] = array('id'=>$cls->id, 'desc'=>$this->Class_model->class_description($cls));
    }
    $data['title'] = 'All Classes';
    $this->load->view('head', $data);
    $this->load->view('classes/view_all', $data);
    $this->load->view('foot');
  }
  
  function _view_by_id($id) {
    $class = $this->Class_model->list_classes(array($id))[0];
    $data['title'] = 'Level '.$class->level.' '.$class->type;
    $data['class'] = $class;
    $data['id'] = $id;
    $this->load->view('head', $data);
    $this->load->view('classes/view_individual', $data);
    $this->load->view('foot');
  }
}


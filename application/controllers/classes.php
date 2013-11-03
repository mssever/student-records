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
  
  function _view_all() {
    $data['classes'] = $this->Class_model->list_classes();
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


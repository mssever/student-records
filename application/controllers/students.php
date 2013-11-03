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
    
    if ($which === NULL) $this->_view_all();
    else $this->_view_by_id($which);
  }
  
  function _view_all() {
    $this->load->helper('form');
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


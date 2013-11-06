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
    echo "<pre>".htmlspecialchars(print_r($form,TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";
  }
}


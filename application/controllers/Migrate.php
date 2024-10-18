<?php

// TODO: Shouldn't we move this somewhere?
class Migrate extends CI_Controller
{
  public function index()
  {
    $this->load->library('migration');

    // if ($this->migration->current() === FALSE) {
    //   show_error($this->migration->error_string());
    // } else 
    if (!$this->migration->latest()) {
      show_error($this->migration->error_string());
    }
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
      
    }
}

 ?>

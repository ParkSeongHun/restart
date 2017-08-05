<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
  function reg(){
        $this->load->database();
        $this->load->model('User_model');
        $user_id = $this->input->post('user_id');
        $pw = $this->input->post('pw');
        $hashedPW = password_hash($pw, PASSWORD_DEFAULT);
        $data = array(
          'user_id' => $user_id ,
          'user_pw' => $hashedPW
        );
        $result= $this -> User_model-> add($data);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result_body' => $result)));
      }
      function login(){
        $this->load->database();
        $this->load->model('User_model');
        $user_id = $this->input->post('user_id');
        $pw = $this->input->post('pw');
        $hashedpw = $this->User_model->login($user_id)->user_pw;
        $isCheck = password_verify($pw,$hashedpw);
        if ($isCheck) {
          $result = 200;
        } else {
          $result = 500;
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result_code' => $result)));
      }
    }
    ?>

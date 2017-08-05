<?php
class User_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    # .. 모든 회원 조회
    public function gets(){
      return $this->db->query("SELECT * FROM users")->result();
    }
    public function login($user_id){
      return $this->db->select('user_pw')->get_where('users', array('user_id'=>$user_id))->row();;
      // $this->db->where('username', $data['username']);
      //   $this->db->where('password', hashedPW($data['password']));
      //   return $this->db->get('users')->row();
    }
    public function add($data){
      return $this->db->insert('users',$data);
    }
}

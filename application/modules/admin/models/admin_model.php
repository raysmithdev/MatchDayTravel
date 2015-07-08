<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
	private $_table_users;	
	private $_table_donate;	
	private $_table_applied_donation;
	
	function __construct()
    {
        parent::__construct();
		
		//Load Table Names from Config
		$this->_table_users 			=  $this->config->item('table_users');
		$this->_table_donate 			=  $this->config->item('table_donate');
		$this->_table_applied_donation 	=  $this->config->item('table_applied_donation');
    }

	function insert_user_detail($data)
	{
		$this->db->insert($this->_table_users,$data);
		return true;
	}

    function login_user($user_email,$password)
    {
        //Login Query
        $this->db->where('user_email',$user_email);
        $this->db->where('password',md5($password));
        $this->db->where('usertype_id','1');
        $this->db->where('isActive','1');
        $query = $this->db->get($this->_table_users);

        //Check if Result is Greater Than Zero

        if($query->num_rows() > 0)
        {
            $this->session->set_userdata('user_id',$query->row()->user_id);
            return $query->row();
        }
    }

    function user_detail($user_email)
    {
        $this->db->where('user_email',$user_email);
        $query = $this->db->get($this->_table_users);

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
    }

    public function getusers(){
         $sql = "SELECT * from user where usertype_id = 0";
       $query =   $this->db->query($sql);

        if($query->num_rows() > 0){
           return $query->result();
        }
    }

    public function user_active_update($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update($this->_table_users,$data);
    }


}

?>
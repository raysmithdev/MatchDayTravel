<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
   {
		parent::__construct();
       $this->load->model('admin_model','admin_model');
   }

    public function index()
   {
	   $this->load->view('index');
       $this->load->model('admin_model','admin_model');

   }

    public function adminlogin()
    {
        //Get values from login form
        $user_email =  $this->input->post('user_email');
        $password   =  $this->input->post('password');

        $check_login = $this->admin_model->login_user($user_email,$password);

        if(!empty($check_login))
        {
            $this->session->set_userdata('log','1');
            redirect(base_url().'admin/home');
            exit();
        }
        else
        {
            $this->session->set_flashdata('login','Invalid Email and Password');
            redirect(base_url().'admin/index');
            exit();
        }
    }

    public function home(){
        $this->load->view('home');
    }

    public function logout()
    {
        $this->session->all_userdata();
        $array_items = array('user_id' => '','log'  => '');
        $this->session->unset_userdata($array_items);
        redirect(base_url().'admin/index');
        exit();
    }
    public function allUsers(){
        $data['users'] = $this->admin_model->getusers();
        $this->load->view('user',$data);
    }

    public function active_update($id,$status){

        if($status == '1'){
            $status = '0';
        }
        else if($status == '0'){
            $status = '1';
        }

        $data = array(
            'isActive' => $status
        );

        $data['users'] = $this->admin_model->user_active_update($id,$data);
        redirect(base_url().'admin/allUsers');
    }


}
?>
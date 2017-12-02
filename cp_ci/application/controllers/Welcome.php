<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include ('User_controller.php');
class Welcome extends CI_Controller {

	public function index()
	{
        $check_session=new User_controller();
        if($check_session->check_session()==true)
        {
		   $this->load->view('admin_profile.php');// fto open admin profile
		}
		else
		{
			$data=array('password_error'=>'','username_error'=>'');
       	    $this->load->view("signin",$data);
		}
	}


}

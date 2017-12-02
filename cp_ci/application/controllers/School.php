<?php

class School extends CI_Controller{


	public function login()
	{
        $this->load->library('session');
        //echo $this->session->userdata('user_type');
		if (!$this->session->userdata('user_name'))
			{
			    if($this->session->flashdata('error'))//to get error from controller
                {
                    $this->load->view("signin",$this->session->flashdata('error'));
                }
                else{
                    $data=array('password_error'=>'','username_error'=>'');
                    $this->load->view("signin",$data);
                }

			}
			else
			{
		        redirect("User_controller/dashbord");
			}
		
		
	}

	public function sign_up()
	{
		$this->load->view('signup');
	}

	public function check()
	{
		// $data = array('user_name' =>"birkam" );
		// $this->load->view('after_sign_up',$data);
//		$this->load->model('Student');
//		$this->Student->check();
		//redirect("Controller_student/check_validation_reg_id");


        $this->load->view('teacher_view/teacher_profile');
	}


	public function load_teacher_sign_up()
	{
		$this->load->view('common_view/teacher_signup_div');
	}

	public function load_student_sign_up()
	{
		$this->load->view('common_view/student_signup_div');
	}

	public function load_parent_sign_up()
	{
		$this->load->view('common_view/parent_signup_div');
	}





    public function load_notice_add_form()
    {
        $this->load->view('admin_view/notice_add_form');
    }

	public function load_homework_add_form()
    {
        $this->load->view('teacher_view/homework_add_form');
    }



    public function load_add_event_form()
    {
        $this->load->view('admin_view/event_form');
    }

    public function load_open_student_add_form()
    {
        $this->load->view('admin_view/student_add_form');
    }
    public function load_add_massage_send_div()
    {
        $this->load->view('common_view/send_massage_view');
    }

    public function load_homework_view_form_teacher()
    {
        $this->load->view('teacher_view/homework_view_form');
    }

    public function load_homework_view_form_student()
    {
        $this->load->view('student_view/homework_view_form');
    }

    public function load_class_manage_form()
    {
        $this->load->view('teacher_view/class_manage_form');
    }

    public function load_report_generate_form()
    {
        $this->load->view('common_view/report_form_div');
    }

    public function load_attendance_view_div()
    {
        $this->load->view('common_view/attendance_view_div');
    }

    public function load_attendance_student_select_div()
    {
        $this->load->view('common_view/attendance_student_select_div');
    }

    public function load_report_view_form()
    {
        $this->load->view('parent_view/Report_view_form_for_teacher');
    }

    public  function load_student_list_div()
    {
        $this->load->view('admin_view/student_list');
    }

    public function load_student_reg_update_div()
    {
        $this->load->view('admin_view/student_reg_update_form');
    }



    public function load_help()
    {
        $this->load->view('help');
    }












	
}
?>
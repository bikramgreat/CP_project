<?php 
/**
* 
*/
include('Controller_interface_user.php');
class Controller_student extends CI_Controller implements Controller_interface_user
{
	
	

	private $user;
	//@override
	public function view_profile()
	{

	}
	//@override
	public function sign_in()
	{

	}
	//@override
	public function view_student_report()
	{

	}
	//@override
	public function add_notification()
	{

	}



	public function cs_sign_up()
	{
		if (isset($_COOKIE['sign_up_cookie'])) //chack cookei is setted or not
          {
          	
            if ($_COOKIE['sign_up_cookie']>5)//form one browser one 5 account can be created 
            {
              //$error_user="*error log in please wait for some minute*";
              //$error_cookie=$_COOKIE['count_cookie'];
            	$this->load->view('after_cookie_limit');
            }
            else
            {
                $count_cookie=$_COOKIE['sign_up_cookie']+1;

                setcookie('sign_up_cookie',$count_cookie);//cookies save
                
                $student_reg_id=$this->input->post('student_reg_id');
			    $student_user_name=$this->input->post('student_user_name');
			    $student_password=$this->input->post('student_password');
			    $student_con_password=$this->input->post('student_con_password');
			    $student_class_no=$this->input->post('student_class_no');
			    if($this->upload_profile($student_user_name)==true) //if upload is successful then
			    {
		            $this->load->model('Student');
		            $student=new Student();
		            $student->setId($student_reg_id);
		            $student->setUser_name($student_user_name);
		            $student->set_password($student_password);
		            $student->setStudent_class_no($student_class_no);
		            $student->setProfile_image_path('/profile_picture/'.$student_user_name.".jpg");
		            $sign_up_check=$student->sign_up();
		            if ($sign_up_check==true) {
		            	$data=array('user_name'=>$student_user_name);
		            	$this->load->view('after_sign_up',$data);
		            	//echo 'fasd';
		            }
		            else
		            {
		            	//echo "dfsa".$sign_up_check;
                        echo "not data inserted";
		            }

			    }

            }
          }
          else
          {
          	setcookie('sign_up_cookie',1,time()+900);
          	    $student_reg_id=$this->input->post('student_reg_id');
			    $student_user_name=$this->input->post('student_user_name');
			    $student_password=$this->input->post('student_password');
			    $student_con_password=$this->input->post('student_con_password');
			    $student_class_no=$this->input->post('student_class_no');
			    if($this->upload_profile($student_user_name)==true) //if upload is successful then
			    {
		            $this->load->model('Student');
		            $student=new Student();
		            $student->setId($student_reg_id);
		            $student->setUser_name($student_user_name);
		            $student->set_password($student_password);
		            $student->setStudent_class_no($student_class_no);
		            $student->setProfile_image_path('/profile_picture/'.$student_user_name.".jpg");
		            $sign_up_check=$student->sign_up();
		            if ($sign_up_check==true) {
		            	$data=array('user_name'=>$student_user_name);
		            	$this->load->view('after_sign_up',$data);
		            	//echo 'fasd';
		            }
		            else
		            {
		            	//echo "dfsa".$sign_up_check;
                        echo "not data inserted";
		            }

			    }
          }


	}

	public function upload_profile($student_user_name)
	{
		if (isset($_FILES['student_profile_pic']['name'])) 
	    {
	    	
			
             //echo 'sfas';
             //ini_set('upload_max_filesize','20M');
             $config['upload_path']     = './assets_file/profile_image/';
             $config['allowed_types']   = 'gif|jpg|png|jpeg';
             $config['file_name']       =  $student_user_name.".jpg";
             $config['max_size']     = '10000';
			 // $config['max_width'] = '600';
			 // $config['max_height'] = '600';
             $this->load->library('upload',$config);
            // $this->upload->do_upload('student_profile_pic');

		        if ( ! $this->upload->do_upload('student_profile_pic'))
                {
                	    echo $this->upload->display_errors();
                        //echo 'not uploaded';
                        return false;
                }
                else
                {
                	$data=$this->upload->data();
                	$file_name=$data['file_name'];
                        //echo "uploadd";
                	$config['image_library']='gd2'; //loading config name to edit uploaded image file
                	$config['source_image']='./assets_file/profile_image/'.$file_name;//getting file from folder to edit
                    $config['create_thumb']= false;
                    $config['maintain_ratio']=false;
                    $config['quality']='60%';
                    $config['width']=200;
                    $config['height']=200;
                    $config['new_image']='./profile_picture/'.$file_name;//folder to store new image 
                    $this->load->library('image_lib',$config);
                    //$this->image_lib->resize();
                    if ( ! $this->image_lib->resize())
					{
					        echo $this->image_lib->display_errors();
					        return false;
					}
					else
					{
						    //echo 'fine';
						    return true;
					}


                }
		}
	}

	public function cs_view_homework_detail($value='')
	{
		# code...
	}


	public function cs_leave_request($value='')
	{
		# code...
	}

	public function cs_view_attendance($value='')
	{
		# code...
	}

	public function cs_view_homework($value='')
	{
		# code...
	}

	public function check_validation_reg_id()
	{
		$reg_id=$this->input->get('registration_id');
		//echo "dfas";
		if ($reg_id=="") {
		 	echo "Please enter Student registration id provided by School";
		 }
		 else
		 {
             if ($reg_id=="`")
             {
                 echo "invalid id";
             }
             else {
                 $this->load->Model('Student');
                 //echo 'hfaskdj';
                 $this->Student->setId($reg_id);
                 $availability = $this->Student->check_registration_availability();
                 if ($availability == true) {
                     echo "";
                 } else {
                     echo "The entered ID is not registered in Our System, Please get Registration ID from School";
                 }
             }

		}
	}

	public function check_already_account_have()
	{
		$reg_id=$this->input->get('registration_id');
		//echo $reg_id."dfas";
		if ($reg_id=="") {
			echo "Please enter student registration id provided by School";
		}
		else
		{
            if ($reg_id=="`")
            {
                echo "invalid id";
            }
            else {
                $this->load->Model('Student');
                $this->Student->setId($reg_id);
                $alreasy_account_availability = $this->Student->check_account_availability();
                if ($alreasy_account_availability == true) {
                    echo "";
                } else {
                    echo "The Account is already created for this Registration ID";
                }
            }

		}
	}
}
 ?>
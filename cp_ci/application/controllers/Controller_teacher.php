<?php 

include('Controller_interface_user.php');
class Controller_teacher extends CI_Controller implements Controller_interface_user
{
	
	
    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }
   
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
        //echo "hsdfkaj";
		 $title=$this->input->get('notice_title');
		$notice_detail=$this->input->get('notice_detail');
		$notice_date=$this->input->get('notice_date');
		$user_type=$this->input->get('notice_for_user_type');
		//echo $title.$notice_detail.$notice_date.$user_type;
		if ($title==""||$user_type==""||$notice_detail=="") {
			if ($title=="") {
				echo "please enter title of Notice";
			}
			else if ($user_type=="") {
				echo "Please Select to how you want to sand notice";
			}
			else
			{
                echo "Please Write something detail about notice";
			}
		}
		else
		{	
			//echo "ksjdalkf";
		        $this->load->model('Teacher');
		        $teacher=new Teacher();


		         $this->load->library('session');
		        //echo $this->session->userdata('user_type');
		          $teacher->set_user_name($this->session->userdata('user_name'));
		          $teacher->set_user_type($this->session->userdata('user_type'));
		         echo $teacher->add_notification($title,$notice_detail,$notice_date,$user_type);
         }

	}

	

	public function ct_sign_up()
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
                $teacher_reg_id=$this->input->post('teacher_reg_id');
			    $teacher_user_name=$this->input->post('teacher_user_name');
			    $teacher_password=$this->input->post('teacher_password');
			    $teacher_con_password=$this->input->post('teacher_con_password');
			    if($this->upload_profile($teacher_user_name)==true) //if upload is successful then
			    {
		            $this->load->model('Teacher');
		            $teacher=new Teacher();
		            $teacher->set_id($teacher_reg_id);
		            $teacher->set_user_name($teacher_user_name);
		            $teacher->set_password($teacher_password);
		            $teacher->setProfile_image_path('profile_picture/'.$teacher_user_name.".jpg");
		            $sign_up_check=$teacher->sign_up();
		            if ($sign_up_check==true) {
		            	$data=array('user_name'=>$teacher_user_name);
		            	$this->load->view('after_sign_up',$data);
		            }
		            else
		            {
                        echo "not data inserted";
		            }

			    }

            }
          }
          else
          {
          	setcookie('sign_up_cookie',1,time()+900);
          	$teacher_reg_id=$this->input->post('teacher_reg_id');
		    $teacher_user_name=$this->input->post('teacher_user_name');
		    $teacher_password=$this->input->post('teacher_password');
		    $teacher_con_password=$this->input->post('teacher_con_password');
		    if($this->upload_profile($teacher_user_name)==true) //if upload is successful then
		    {
	            $this->load->model('Teacher');
	            $teacher=new Teacher();
	            $teacher->set_id($teacher_reg_id);
	            $teacher->set_user_name($teacher_user_name);
	            $teacher->set_password($teacher_password);
	            $teacher->setProfile_image_path('profile_picture/'.$teacher_user_name.".jpg");
	            $sign_up_check=$teacher->sign_up();
	            if ($sign_up_check==true) {
	            	$data=array('user_name'=>$teacher_user_name);
		            $this->load->view('after_sign_up',$data);
	            }
	            else
	            {
                    echo "not data inserted";
	            }

		    }
          }








	    // $teacher_reg_id=$this->input->post('teacher_reg_id');
	    // $teacher_user_name=$this->input->post('teacher_user_name');
	    // $teacher_password=$this->input->post('teacher_password');
	    // $teacher_con_password=$this->input->post('teacher_con_password');
	    // if($this->upload_profile($teacher_user_name)==true) //if upload is successful then
	    // {
     //        $this->load->model('Teacher');
     //        $teacher=new Teacher();
     //        $teacher->set_id($teacher_reg_id);
     //        $teacher->set_user_name($teacher_user_name);
     //        $teacher->set_password($teacher_password);
     //        $teacher->setProfile_image_path('/profile_picture/'.$teacher_user_name.".jpg");
     //        $sign_up_check=$teacher->sign_up();
     //        if ($sign_up_check==true) {
            	
     //        }
     //        else
     //        {

     //        }

	    // }


	}



	public function upload_profile($teacher_user_name)
	{
		if (isset($_FILES['teacher_profile_pic']['name'])) 
	    {
	    	
			
             //echo 'sfas';
             //ini_set('upload_max_filesize','20M');
             $config['upload_path']     = './assets_file/profile_image/';
             $config['allowed_types']   = 'gif|jpg|png';
             $config['file_name']       =  $teacher_user_name.".jpg";
             $config['max_size']     = '10000';
			 // $config['max_width'] = '600';
			 // $config['max_height'] = '600';
             $this->load->library('upload',$config);
            // $this->upload->do_upload('teacher_profile_pic');

		        if ( ! $this->upload->do_upload('teacher_profile_pic'))
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




	public function ct_view_homework_detail()
	{
		# code...
	}

	public function ct_view_class_attendance()
	{
		# code...
	}




	public function check_validation_reg_id()
	{
		$reg_id=$this->input->get('registration_id');
		//echo $reg_id."dfas";
		if ($reg_id=="") {
			echo "Please enter Teacher registration id provided by School";
		}
		else
		{
		    if ($reg_id=="`")
            {
                echo "invalid id";
            }
            else
            {
                $this->load->Model('Teacher');
                $this->Teacher->set_id($reg_id);
                $availability=$this->Teacher->check_registration_availability();
                if ($availability==true) {
                    echo "";
                }
                else
                {
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
			echo "Please enter Teacher registration id provided by School";
		}
		else
		{
            if ($reg_id=="`")
            {
                echo "invalid id";
            }
            else {
                $this->load->Model('Teacher');
                $this->Teacher->set_id($reg_id);
                $alreasy_account_availability = $this->Teacher->check_account_availability();
                if ($alreasy_account_availability == true) {
                    echo "";
                } else {
                    echo "The Account is already created for this Registration ID";
                }
            }

		}
	}

	public function get_teacher_subject_class()
    {
        $class_no=$this->input->get('class_no');
        //echo $class_no;
        $this->load->library('session');
        $user_name=$this->session->userdata('user_name');

        $this->load->model('Teacher');
        $teacher=new Teacher();
        $teacher_subject_result=$teacher->get_subjects_teaches($class_no,$user_name);
       // echo sizeof($teacher_subject_result);
        if (sizeof($teacher_subject_result)==0)
        {
            echo "";
        }
        else{
            echo "<option></option>";
            foreach($teacher_subject_result as $key => $subject_teacher_data)
            {

                echo "<option>$subject_teacher_data->Subject_name</option>";
            }
        }

    }

    public function add_homework()
    {
        $class_no=$this->input->get('class_no');
        $subject=$this->input->get('subject');
        $homework_detail=$this->input->get('homework_detail');
        $homework_date=$this->input->get('homework_date');
        $saved_date=$this->input->get('today_date');
       // echo $class_no;
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $home_work_save_check=$teacher->save_homework($class_no,$subject,$homework_detail,$homework_date,$saved_date);
        if ($home_work_save_check==true)
        {
            echo "homework is saveed successfully";
        }
        else{
            echo "homework is not saved (may homework is already saved)";
        }


    }


    public function delete_homework()
    {


        $homework_id=$this->input->get('homework_id');
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $check_delete=$teacher->delete_homework($homework_id);
        if($check_delete==true)
        {
            echo "true";
        }
        else{
            echo "false";
        }
    }

    public function get_student_homework_check_list()
    {
        $Homework_id=$this->input->get('Homework_id');
        $Class_no=$this->input->get('Class_no');
        $Subject_name=$this->input->get('Subject_name');
        $homework_detail=$this->input->get('Homework_detail');
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $list_of_student=$teacher->get_student_list($Class_no);
        echo " <div class='col-sm-12'>
                    <div class='col-sm-4'></div>
                    <div class=' col-sm-4' id='student_homework_detail' style='text-align: center; background-color: #5b8bec'
                        <p><b>Subject:$Subject_name</b></p>
                          <p><b>Class:$Class_no</b></p>
                          <p><b>Detail:</b></p>
                          <p>$homework_detail</p>
                    </div>
                    <div class='col-sm-4'></div>
                </div>";
        foreach ($list_of_student as $student_list_data)
        {
            $profile_picture= base_url().$student_list_data->Profile_image_path;
            echo " <div class='col-sm-12' style='background-color: #8ba8af'>
                    <div class='col-sm-4'></div>
                    <div class='student_homework_detail col-sm-4' id='student_homework_detail'>
                                            <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
                                 
                                               <div class='found_user_image_div' style='width='30%'; height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
                                                 <img src='$profile_picture' style='height: 40px; width: 40px; border-radius: 50%;'>$student_list_data->Student_first_name $student_list_data->Student_last_name (Class: $Class_no)
                                                 
                                               </div>
                                               <div hidden='' id='student_account_id_div'>$student_list_data->Student_account_id</div>
                                                
                                               
                                              
                                               Homework Done:
                                                   <select class='' id='Homework_done' oninput='disable_remark_selection()'>
                                                   <option></option>
                                                    <option >done</option>
                                                    <option >not done</option>
                                                   </select>
                                                   Remark:
                                                   <select id='Remark'>
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                   </select>
                                             </div>
                                             <p id='error_p' style='color: red'></p>
                    </div>
                    <div class='col-sm-4'></div>
                   </div>";
        }
        echo " <div class='col-sm-12'>
                    <div class='col-sm-4'></div>
                    
                    <div class='col-sm-4' id='student_homework_detail'>
                    <p id='homework_save_error' style='color: red; text-align: center'></p>
                      <button class='btn btn-primary active check_homework_button' id='check_homework_button' style='margin-top: 5px; width: 100%;' onclick='save_student_homework_detail($Homework_id)'>Save homework detail of Student</button>
                      
                    </div>
                                          
                    <div class='col-sm-4'></div>
                 </div>";
//
    }

    public function save_student_homework_detail()
    {
        //echo ('bikram');
        $student_id=$this->input->get('student_id');
        $homework_done=$this->input->get('homework_done');
        $homework_remark=$this->input->get('homework_remark');
        $homework_id=$this->input->get('homework_id');
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $homework_save_report=$teacher->save_student_homework_report($student_id,$homework_done,$homework_remark,$homework_id);
        if ($homework_save_report==false)
        {
            echo "false";
        }
        else{
            echo "true";
        }




    }


    public function get_class_teacher_assigned_class()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $class_list=$teacher->get_class_list_class_teacher($user_name);
        echo "<option></option>";
        foreach ($class_list as $class_no)
        {
            echo "<option>$class_no->Class_no</option>";
        }

    }


    public function add_refrash_roll_no()
    {
        $class_no=$this->input->get('class_no');
       // echo $class_no;
        $this->load->model('Teacher');
        $teacher=new Teacher();
        $student_roll_details=$teacher->add_refrash_roll_no($class_no);


        echo " <div class='col-sm-12'>
                    <div class='col-sm-4'></div>
                    <div class=' col-sm-4' id='student_homework_detail' style='text-align: center; background-color: #5b8bec'
                        <p><b>Class:$class_no</b></p>
                          
                          <p><b>All Student List:</b></p>
                          
                    </div>
                    <div class='col-sm-4'></div>
                </div>";
        foreach ($student_roll_details as $roll_no_student_data)
        {
            $profile_picture= base_url().$roll_no_student_data->Profile_image_path;
            echo " <div class='col-sm-12' style='background-color: #8ba8af'>
                    <div class='col-sm-4'></div>
                    <div class='student_homework_detail col-sm-4' id='student_homework_detail'>
                                            <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
                                 
                                               <div class='found_user_image_div' style='width='30%'; height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
                                                 <img src='$profile_picture' style='height: 40px; width: 40px; border-radius: 50%;'>$roll_no_student_data->Student_first_name $roll_no_student_data->Student_last_name (Class: $class_no)
                                                 
                                               </div>
                                               <div hidden='' id='student_account_id_div'>$roll_no_student_data->Student_account_id</div>
                                                
                                               
                                              
                                               
                                                   <p id='student_roll_no'>Roll No.:$roll_no_student_data->Roll_no</p>
                                               
                                             </div>
                                             <p id='error_p' style='color: red'></p>
                    </div>
                    <div class='col-sm-4'></div>
                   </div>";
        }


    }

    public function get_user_list_attendance()
    {
        $class_no=$this->input->get('class_no');
        // echo $class_no;
        $this->load->model('Teacher');
        $teacher=new Teacher();

        $list_of_student=$teacher->get_student_list($class_no);
        echo " <div class='col-sm-12'>
                    <div class='col-sm-4'></div>
                    <div class=' col-sm-4' id='student_attendance_detail' style='text-align: center; background-color: #5b8bec'
                        
                          <p><b>Class:$class_no</b></p>
                          
                          <p>Take attendance</p>
                    </div>
                    <div class='col-sm-4'></div>
                </div>";
        foreach ($list_of_student as $student_list_data)
        {
            $profile_picture= base_url().$student_list_data->Profile_image_path;
            echo " <div class='col-sm-12' style='background-color: #8ba8af'>
                    <div class='col-sm-4'></div>
                    <div class='student_attendance_detail col-sm-4' id='student_attendance_detail'>
                                            <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
                                 
                                               <div class='found_user_image_div' style='width='30%'; height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
                                                 <img src='$profile_picture' style='height: 40px; width: 40px; border-radius: 50%;'>$student_list_data->Student_first_name $student_list_data->Student_last_name (Class: $class_no)
                                                 
                                               </div>
                                               <div hidden='' id='student_reg_id_div'>$student_list_data->Student_registration_id</div>
                                                
                                               
                                              <form>Attendance:
                                                       <input type='radio' name='attendance' value='p'>P</input>
                                                       <input type='radio' name='attendance' value='A'>A</input>
                                               </form>
                                               
                                             </div>
                                             <p id='error_p' style='color: red'></p>
                    </div>
                    <div class='col-sm-4'></div>
                   </div>";
        }
        echo " <div class='col-sm-12'>
                    <div class='col-sm-4'></div>
                    
                    <div class='col-sm-4' id='student_attendance_detail'>
                    <p id='attendance_save_error' style='color: red; text-align: center'></p>
                      <button class='btn btn-primary active check_attendance_button' id='add_attendance_button' style='margin-top: 5px; width: 100%;' onclick='add_attendance_of_students($class_no);'>Save Attendance</button>
                      
                    </div>
                                          
                    <div class='col-sm-4'></div>
                 </div>";
    }


    public function save_attendance_detail()
    {
        $student_reg_id=$this->input->get('student_reg_id');
        $class_no=$this->input->get('class_no');
        $attendance_check=$this->input->get('attendance_check');
        $this->load->model('Teacher');
        $teacher=new Teacher();
         $save_check=$teacher->add_student_attendance($student_reg_id,$class_no,$attendance_check);
         if ($save_check==false)
         {
             echo "false";
         }
         else
         {
             echo "true";
         }


    }
}
 ?>
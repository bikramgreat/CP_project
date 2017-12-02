<?php 

/**
* 
*/
include('Controller_interface_user.php');
include ('School.php');
//$this->load->iface("Controller_interface_user");

class Controller_admin extends CI_Controller implements Controller_interface_user
{
	
	

	//$user="";
	//@override
	public function view_profile()
	{

	}
	//@override
	public function sign_in()
	{
       // $this->load->model("Admin");
       // // $this->Admin->set_user_name($user_name);
       // // $this->Admin->set_password($user_password);
       // // $this->Admin->set_user_type($user_type);
       // $login_result=$this->Admin->sign_in($user_name,$user_password,$user_type);//gets values "username_false", "password_true", "password_false"
       // if($login_result=="username_false")//wrong username
       // {
       // 	$data=array('username_error'=>'You have entered wrong username','password_error'=>'');
       // 	$this->load->view("signin",$data);
       // }
       // else
       // {
       // 	if ($login_result=="password_false") //if wrong password
       // 	{
       // 		$data=array('username_error'=>'','password_error'=>'You have entered wrong password');
       // 	    $this->load->view("signin",$data);
       // 	}
       // 	else
       // 	{
       // 		$session_data=array('user_name'=>$user_name,'user_type'=>$user_type);
       // 		$this->load->library('session');// if sessiion is loadded in autoload array then we dont need to write this line
       // 		$this->session->set_userdata($session_data);
       // 		// $user_data=$this->Admin->view_profile();//gets user data from model/admin  view_profile()
       // 		// $data = array('name' => $user_data[''], );
       //     //$this->load->view('view_user/view_admin/admin_profile',$session_data);
       //      return redirect("Controller_admin/dashbord");
       // 	}

       // }


	}


	//public function dashbord()
	// {
	// 	$this->load->library('session');
	// 	if ($this->session->has_userdata('user_name'))
	// 		{
				
	// 		     $this->load->view('admin_profile',$this->session->userdata());//direct sends the value of session
	// 		}
	// 		else
	// 		{
		       
	// 	        $school=new School();
	// 	        $school->login();
	// 		}
		
	// }
	//@override
	public function view_student_report()
	{

	}
	//@override
	public function add_notification()
	{

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
		        $this->load->model('Admin');
		        $admin=new Admin();


		        $this->load->library('session');
		        //echo $this->session->userdata('user_type');
		         $admin->set_user_name($this->session->userdata('user_name'));
		         $admin->set_user_type($this->session->userdata('user_type'));

		        $admin->add_notification($title,$notice_detail,$notice_date,$user_type);
        }

	}

	// 



	public function ca_sign_up($value='')
	{
		# code...
	}

	public function ca_add_event_detail()
	{
		 $event_title=$this->input->get('event_title');
		 $event_date=$this->input->get('event_date');
		 $event_detail=$this->input->get('event_detail');
		 //echo $event_title."   ".$event_date."  ".$event_detail;
		 

		// $this->form_validation->set_rules('event_date','event date','is_unique[tbl_event.event_date]');
		
			 $this->load->model('Admin');
			 $event_inserted=$this->Admin->add_event_detail($event_title,$event_date,$event_detail);
			 if ($event_inserted==true) {
			 	echo "inserted successfully";
			 }
			 else
			 {
			 	echo "already inserted";

			 }
		

	}

	public function ca_registering_student()
	{
		$first_name=$this->input->get('student_first_name');
		$last_name=$this->input->get('student_last_name');
		$age=$this->input->get('student_age');

		$date_of_birth=$this->input->get('student_date_of_birth');
		$address=$this->input->get('student_address');
		$this->ca_registering_student_controller($first_name,$last_name,$age,$date_of_birth,$address);

	}

	public function ca_registering_student_controller($first_name,$last_name,$age,$date_of_birth,$address)
    {
        settype($age, "integer");
        if ($first_name==""||$last_name==""||$address=="") {
            echo "you have left some field empty";
        }
        else
        {
            if (gettype($age)!="integer"||$age<1) {
                echo "please inter valid age of student";
            }
            else
            {
                if (is_float($first_name) || is_float($last_name) || is_float($address)) {
                    if (is_float($first_name)) {
                        echo "please enter valid first name";
                    }
                    else if (is_float($last_name)) {
                        echo "please enter valid last name";
                    }
                    if (is_float($address)) {
                        echo "please enter valid address";
                    }
                }
                else
                {


                    $this->load->model('Admin');
                    $registered=$this->Admin->register_student($first_name,$last_name,$age,$date_of_birth,$address);

                    settype($registered, "string");
                    echo $registered;
                    // if ($registered=="Already Registered") {
                    // 	 echo "Already Registered ";
                    // }
                    // else if($registered==false)
                    // {
                    //     echo "successfully Registered";
                    // }
                    // else
                    // {
                    //     echo "Registration Faild";
                    // }
                }



            }
        }
    }

    public function ca_update_registering_student()
    {
        $student_reg_id=$this->input->get('student_reg_id');

        $first_name=$this->input->get('student_first_name');
        $last_name=$this->input->get('student_last_name');
        $age=$this->input->get('student_age');

        $date_of_birth=$this->input->get('student_date_of_birth');
        $address=$this->input->get('student_address');
        $this->ca_update_registering_student_controller($student_reg_id,$first_name,$last_name,$age,$date_of_birth,$address);
    }

    public function ca_update_registering_student_controller($student_reg_id,$first_name,$last_name,$age,$date_of_birth,$address)
    {

        settype($age, "integer");
        if ($first_name==""||$last_name==""||$address=="") {
            echo "you have left some field empty";
        }
        else
        {
            if (gettype($age)!="integer"||$age<1) {
                echo "please inter valid age of student";
            }
            else
            {
                if (is_float($first_name) || is_float($last_name) || is_float($address)) {
                    if (is_float($first_name)) {
                        echo "please enter valid first name";
                    }
                    else if (is_float($last_name)) {
                        echo "please enter valid last name";
                    }
                    if (is_float($address)) {
                        echo "please enter valid address";
                    }
                }
                else
                {


                    $this->load->model('Admin');
                    $registered=$this->Admin->update_register_student($student_reg_id,$first_name,$last_name,$age,$date_of_birth,$address);

                    settype($registered, "string");
                    echo $registered;





                    // if ($registered=="Already Registered") {
                    // 	 echo "Already Registered ";
                    // }
                    // else if($registered==false)
                    // {
                    //     echo "successfully Registered";
                    // }
                    // else
                    // {
                    //     echo "Registration Faild";
                    // }
                }



            }
        }
    }

    public function get_reg_student_list()
    {
        $this->load->model("Admin");
        $admin=new Admin();
        $student_list=$admin->get_reg_student_list();
        //echo print_r($student_list);
        foreach ($student_list as $student_detail)
        {
            $Student_registration_id='"'.$student_detail->Student_registration_id.'"';
            $Student_first_name='"'.$student_detail->Student_first_name.'"';
            $Student_last_name='"'.$student_detail->Student_last_name.'"';
            $Student_date_of_birth='"'.$student_detail->Student_date_of_birth.'"';
            $Student_address='"'.$student_detail->Student_address.'"';
            $Student_age='"'.$student_detail->Student_age.'"';
            echo "<tr>
                    <td style='width: 15%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_registration_id</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_first_name $student_detail->Student_last_name</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_date_of_birth</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_address</td>
                    <td style='width: 10%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >
                        <button onclick='registered_student_update($Student_registration_id,$Student_first_name,$Student_last_name,$Student_date_of_birth,$Student_age,$Student_address)'>Edit</button>
                     </td>
                </tr>";
        }
    }


    public function get_reg_student_list_by_input()
    {
        $student_value=$this->input->get('value');
        //echo $student_value;
        $this->load->model("Admin");
        $admin=new Admin();
        $student_list=$admin->get_reg_student_list_by_input($student_value);
        //echo print_r($student_list);
        foreach ($student_list as $student_detail)
        {
            $Student_registration_id='"'.$student_detail->Student_registration_id.'"';
            $Student_first_name='"'.$student_detail->Student_first_name.'"';
            $Student_last_name='"'.$student_detail->Student_last_name.'"';
            $Student_date_of_birth='"'.$student_detail->Student_date_of_birth.'"';
            $Student_address='"'.$student_detail->Student_address.'"';
            $Student_age='"'.$student_detail->Student_age.'"';
            echo "<tr>
                    <td style='width: 15%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_registration_id</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_first_name $student_detail->Student_last_name</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_date_of_birth</td>
                    <td style='width: 25%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >$student_detail->Student_address</td>
                    <td style='width: 10%; border: solid 1px;  text-align:center; background-color:#8c8c8c' >
                       <button onclick='registered_student_update($Student_registration_id,$Student_first_name,$Student_last_name,$Student_date_of_birth,$Student_age,$Student_address)'>Edit</button>
                    </td>
                </tr>";
        }
    }

	
}

 ?>
<?php
/**
* 
*/
 include ('interfaces/Interface_all_user.php');
//get_instance()->load->iface('Interface_all_user');
 //include_once ('User.php');
 include ('Student.php');
 //include ('Event_year.php');
 include_once ('Notification.php');
 include_once ('Database.php');
class Admin extends User implements Interface_all_user
{
	
	

	 private $id;  //implement for all
	 private $name; //implement for all
	 private $user_name; //implement for all
	 private $password;
	 private $user_type;


//	@override
	public function view_profile()
	{
      // $this->load->driver('session');
      // $this->load->database();
      // $user_name=$this->session->userdata('user_name');
      // $query_select = $this->db->get_where('tbl_teacher_account', array('Teacher_username' => $user_name));
      
	}//implement for all

//	@override
	public function view_student_report()
	{

	} //implement for all



  // @override
   // public function sign_in()
   // {
   	 
   // }


	public function add_event_detail($event_title,$event_date,$event_detail) // to add event details
	{
		$event=new Event();
	    return $event->add_event($event_title,$event_date,$event_detail); //return true or false
	}

	public function register_student($first_name,$last_name,$age,$date_of_birth,$address) // to save registration detail of student
	{
		 $student=new Student();
         $student->setStudent_first_name($first_name);
		 $student->setStudent_last_name($last_name);
		 $student->setStudent_age($age);
		 $student->setStudent_date_of_birth($date_of_birth);
		 $student->setStudent_address($address);
		 return $student->register_student(); //returns true or false
	}


	public function update_register_student($student_reg_id,$first_name,$last_name,$age,$date_of_birth,$address)
    {

        $student=new Student();
        $student->setStudentRegistrationId($student_reg_id);
        $student->setStudent_first_name($first_name);
        $student->setStudent_last_name($last_name);
        $student->setStudent_age($age);
        $student->setStudent_date_of_birth($date_of_birth);
        $student->setStudent_address($address);
        return $student->update_register_student(); //returns true or false
    }
	public function add_notification($title,$notice_detail,$notice_date,$user_type) //to add notice detail
	{
		$notice=new notification(); //calling notification class
		$notice->setNotification_title($title);
		$notice->setNotification_detail($notice_detail);
		$notice->setNotification_created_date($notice_date);
		$notice->setNotification_to_usertype($user_type);

		$database=new Database();
        $provider_user_type=$this->user_type;
        $provider_user_name=$this->user_name;
		$notice->setNotification_provider($database->find_user_id($provider_user_type,$provider_user_name));
		$notice->sand_notification(); //calling send_notification funtion to save notice details
	}

	public function get_reg_student_list()
    {
        $this->load->database();
        $student_list_database=$this->db->query("Select * from tbl_registered_student ORDER BY Student_registration_id DESC");
        return $student_list_database->result();

    }

    public function get_reg_student_list_by_input($student_value)
    {
        $this->load->database();
        $student_list_database=$this->db->query("Select * from tbl_registered_student
                                                 where (INSTR(Student_first_name, '{$student_value}') > 0 
                                                 OR INSTR(Student_last_name, '{$student_value}') >0
                                                 OR INSTR(Student_registration_id, '{$student_value}') >0
                                                 OR INSTR(Student_date_of_birth, '{$student_value}') >0
                                                 OR INSTR(Student_address,'{$student_value}') >0)
                                                 ORDER BY Student_registration_id DESC");
        return $student_list_database->result();

    }

	public function register_teacher()
	{

	}



    public function view_student_detail($value='')
    {
        # code...
    }

	public function set_id($id)
	{
		$this->id=$id;


	}

	public function set_name($name)
	{
		$this->name=$name;
	}

	public function set_user_name($get_user_name)
	{
		$this->user_name=$get_user_name;
		
	}

	public function set_password($get_password)
	{
		 $this->password=$get_password;
	}

	public function set_user_type($user_type)
	{
		$this->user_type=$user_type;
	}	
}


?>
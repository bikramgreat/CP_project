<?php
/**
* 
*/
 include ('interfaces/Interface_all_user.php');
 include ('interfaces/Interface_Student_Parent_Teacher.php');
 include_once ('User.php');
 include_once ('Database.php');
 include_once ('Notification.php');
 include_once ('Homework.php');
 include_once ('Attendance.php');
class Teacher extends User implements Interface_all_user,Interface_Student_Parent_Teacher
{
	private $homework;

	private $id;  //implement for all
	 private $name; //implement for all
	 private $user_name; //implement for all
	 private $password;
	 private $user_type;
	 private $profile_image_path;


	 public function add_notification($title,$notice_detail,$notice_date,$user_type)
	{
		//echo "fsdjf";
		$notice=new notification();
		 $notice->setNotification_title($title);
		 $notice->setNotification_detail($notice_detail);
		 $notice->setNotification_created_date($notice_date);
		 $notice->setNotification_to_usertype($user_type);

		 $database=new Database();
        $provider_user_type=$this->user_type;
        $provider_user_name=$this->user_name;
		 $notice->setNotification_provider($database->find_user_id($provider_user_type,$provider_user_name));
		 //echo $provider_user_type;
		 return $notice->sand_notification();
	}
       // @override
	public function view_profile()
	{

	} //implement for all
        //@override
	public function view_student_report()
	{


	}//implement for all


	//@override
	public function sign_up(){
		         $this->load->database();
		         $query=$this->db->get('tbl_teacher_account');
    	         $result_object=$this->db->query("select Teacher_account_id from tbl_teacher_account order by Teacher_account_id desc limit 1;");
			     $results=$result_object->result();
			        //echo sizeof($results);
			        $teacehr_new_account_id;
			    	if (sizeof($results)==0) 
			    	{
			    		
			    		$this->id=100;
			    		
			    	}
			    	else
			    	{
			    		$last_id;
			    		foreach ($results as $key => $teacher_ids) {
			    		$last_id=$teacher_ids->Teacher_account_id;
			    		}
			    	
			    			
			                $this->teacehr_new_account_id=$last_id+1;
			    	}
			    	//echo $this->profile_image_path;
                   $database=new Database();
                   $data= array('Teacher_account_id' =>$this->teacehr_new_account_id,
                                'Teacher_registration_id'=>$this->id,
                                'Teacher_username'=>$this->user_name,
                                'Teacher_password'=>$this->password,
                                'Profile_image_path'=>$this->profile_image_path
                                );
                   $database->insert_data('tbl_teacher_account',$data);

                   $result_object_insert_check=$this->db->query("select Teacher_account_id from tbl_teacher_account where Teacher_account_id=$this->teacehr_new_account_id");
			       $results_insert_check=$result_object_insert_check->result();
			       if (sizeof($results_insert_check)==0) {
			       	 return false;
			       }
			       else
			       {
			       	return true;
			       }


	}  //comes from Interface_Student_parent_Teacher
	//@override
    public function save_homework($class_no,$subject,$homework_detail,$homework_date,$saved_date)
    {

       $this->homework=new Homework();
       $this->homework->setHomeworkClassNo($class_no);
       $this->homework->setHomeworkSubject($subject);
       $this->homework->setHomeworkDetail($homework_detail);
       $this->homework->setHomeworkLastDate($homework_date);
       $this->homework->setHomeworkCreatedDate($saved_date);
       return $this->homework->add_homework();
    }
	public function view_homework_detail(){

	} //comes from Interface_Student_parent_Teacher

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

	public function setProfile_image_path($image_path)
	{
		$this->profile_image_path=$image_path;
	}


	public function check_registration_availability()
	{
		   $database=new Database();
		   //select_data($selecting_fields,$table_name,$where_condition_data)
		   $got_data=$database->select_data("*",
		   	                      "tbl_registered_teacher",
		   	                       array('Teacher_registration_id' =>"$this->id")
		   	                      );
            if (sizeof($got_data)==0) {
            	return false;
            }
            else
            {
            	return true;
            }


	}

	public function check_account_availability()
	{
		$database=new Database();
		   //select_data($selecting_fields,$table_name,$where_condition_data)
		   $got_data=$database->select_data("*",
		   	                      "tbl_teacher_account",
		   	                       array('Teacher_registration_id' =>"$this->id")
		   	                      );
            if (sizeof($got_data)==0) {
            	return true; //not available true
            }
            else
            {
            	return false;
            }
	}
	public function get_subjects_teaches($class_no,$user_name)
    {
        $this->load->database();
        $query=$this->db->get('tbl_class_teacher');
        $result_object=$this->db->query("select tct.Subject_name, tct.Teacher_account_id from tbl_class_teacher tct, tbl_teacher_account tta WHERE tct.Teacher_account_id=tta.Teacher_account_id and tct.Class_no='$class_no' and tta.Teacher_username='$user_name'");
        return $result_object->result();
    }
    public function save_student_homework_report($student_id,$homework_done,$homework_remark,$homework_id)
    {
       $this->homework=new Homework();
       return $this->homework->save_student_homework_report($student_id,$homework_done,$homework_remark,$homework_id);
    }
    public function get_class_list_class_teacher($user_name)
    {
        $database=new Database();
        $user_id=$database->find_user_id('Teacher',$user_name);
        $this->load->database();
        $result_object=$this->db->query("select Class_no from tbl_class WHERE Class_teacher=$user_id");
        return $result_object->result();
    }
    public function add_refrash_roll_no($class_no) // this funtion refrash all the class detail and updates the new record (this is for responce change of student number in class)
    {
        $this->load->database();
        $result_object_student=$this->db->query("select * from tbl_student_account tsa,tbl_registered_student trs WHERE tsa.Student_registration_id=trs.Student_registration_id
                                         AND tsa.Class_no=$class_no
                                         ORDER BY trs.Student_first_name ASC;");
         $count=0;
         foreach ($result_object_student->result() as $user_data)//comes data in asc order
         {
             $count=$count+1;
             $result_object_student_roll_no=$this->db->query("select * from tbl_student_roll_no WHERE Student_registration_id=$user_data->Student_registration_id
                                         AND Class_no=$class_no;");
             if (sizeof($result_object_student_roll_no->result())!=0) {
                 foreach ($result_object_student_roll_no->result() as $student_roll_no_data) {
                     if ($student_roll_no_data->Roll_no == $count) {
                         $this->db->query("DELETE FROM tbl_student_roll_no WHERE Class_no=$class_no AND Student_registration_id=$user_data->Student_registration_id");
                         $this->db->query("INSERT INTO tbl_student_roll_no VALUES ($count,$user_data->Class_no,$user_data->Student_registration_id)");
                     } else {
                         $this->db->query("UPDATE tbl_attendance SET Student_roll_no=$count WHERE Class_no=$class_no AND Student_registration_id=$user_data->Student_registration_id");
                         $this->db->query("DELETE FROM tbl_student_roll_no WHERE Class_no=$class_no AND Student_registration_id=$user_data->Student_registration_id");
                         $this->db->query("INSERT INTO tbl_student_roll_no VALUES ($count,$user_data->Class_no,$user_data->Student_registration_id)");
                     }
                 }
             } else{
                 $this->db->query("DELETE FROM tbl_student_roll_no WHERE Class_no=$class_no AND Student_registration_id=$user_data->Student_registration_id");
                 $this->db->query("INSERT INTO tbl_student_roll_no VALUES ($count,$user_data->Class_no,$user_data->Student_registration_id)");
             }
         }
        $this->db->get('tbl_student_account');
        $result_object=$this->db->query("select * from tbl_student_roll_no tsrn, tbl_student_account tsa,tbl_registered_student trs WHERE tsa.Student_registration_id=trs.Student_registration_id
                                         AND tsrn.Student_registration_id=trs.Student_registration_id AND tsrn.Class_no=$class_no
                                         ORDER BY tsrn.Roll_no ASC");
         Return $result_object->result();
    }

    public function add_student_attendance($student_reg_id,$class_no,$attendance_check)
    {
         $attendance=new Attendance();
         $attendance->setStudentRegId($student_reg_id);
         $attendance->setAttendancePA($attendance_check);
         $attendance->setClassNo($class_no);
         $dates = time () ;
          $day = date('d', $dates) ;
          $month =date('m', $dates) ;
          $year = date('Y', $dates) ;
         $attendance->setYear($year);
         $attendance->setMonth($month);
         $attendance->setDay($day);
         return $attendance->add_attendance();
    }


    public function delete_homework($homework_id)
    {
        $homework=new Homework();
        return $homework->delete_homework($homework_id);
    }
}
?>
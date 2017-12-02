<?php

 include_once ('interfaces/Interface_all_user.php');
 include_once ('interfaces/Interface_Student_Parent.php');
 include_once ('interfaces/Interface_Student_Parent_Teacher.php');
 //include_once ('Database.php');
 include ('User.php');
 class Student extends User implements Interface_all_user,Interface_Student_Parent,Interface_Student_Parent_Teacher
 {
 	private $homework;//from Homework class
 	private $id;
    private $student_registration_id;
	private $user_name; //implement for all
    private $password;
	private $student_first_name;
	private $student_last_name;
	private $student_date_of_birth;
	private $student_age;
	private $student_address;
    private $profile_image_path;
    private $student_class_no;
	//@override
	public function view_profile()
	{

	}
	//@override
	public function view_student_report()
	{

	}

    //@override
	public function request_leave()
	{

	}
	//@override
	public function view_attendance()
	{

     }
     //@override
     public function sign_up() //this funtion is for creating account for student
     {
                 $this->load->database();
                 $query=$this->db->get('tbl_student_account');
                 $result_object=$this->db->query("select Student_account_id from tbl_student_account order by Student_account_id desc limit 1;");
                 $results=$result_object->result();
                    $student_new_account_id;
                    if (sizeof($results)==0) { //for first account of student
                        $this->student_new_account_id=1000;
                    }
                    else {  // if account are there. then gets last accunt id and then increse by 1 for new account id
                        $last_id;
                        foreach ($results as $key => $student_ids) {
                        $last_id=$student_ids->Student_account_id;
                        }
                        $this->student_new_account_id=$last_id+1;
                    }
                   $database=new Database();
                   $data= array('Student_account_id' =>$this->student_new_account_id,
                                'Student_registration_id'=>$this->id,
                                'Student_username'=>$this->user_name,
                                'Student_password'=>$this->password,
                                'Class_no'=>$this->student_class_no,
                                'Profile_image_path'=>$this->profile_image_path
                                );
                   $database->insert_data('tbl_student_account',$data);
                   $result_object_insert_check=$this->db->query("select Student_account_id from tbl_student_account where Student_account_id=$this->student_new_account_id");
                   $results_insert_check=$result_object_insert_check->result(); // to make sure about account is saved or not
                   if (sizeof($results_insert_check)==0) {
                     return false;
                   } else {
                    return true;
                   }
     }
     //@override
    public function view_homework_detail()
    {

    }
    public function register_student() //this function stores the registration detail of student
    {
    	$this->load->database();
    	$query=$this->db->get('tbl_registered_student');
    	$data_alredy_added=$this->db->query("select * from tbl_registered_student where Student_first_name='$this->student_first_name' and Student_last_name='$this->student_last_name' and Student_date_of_birth='$this->student_date_of_birth' and Student_address='$this->student_address'");
         $results=$data_alredy_added->result();
         if (sizeof($results)>0) { //if studnet is already registed
         	return "Already Registered";
         } else {
			    	$result_object=$this->db->query("select Student_registration_id from tbl_registered_student order by Student_registration_id desc limit 1;");
			    	$results=$result_object->result();
			    	if (sizeof($results)==0) 
			    	{
			    		$this->student_registration_id=1000; //student registration id for fisrt account
			    	} else {
			    		$last_id;
			    		foreach ($results as $key => $student_ids) {
			    		$last_id=$student_ids->Student_registration_id;
			    		}
			                $this->student_registration_id=$last_id+1; //here gets last student registration id and increse by 1 for new id
			    	}
				    $data= array('Student_registration_id' => $this->student_registration_id ,
						                   'Student_first_name'=>$this->student_first_name,
						                   'Student_last_name '=> $this->student_last_name,
						                   'Student_age'=>$this->student_age,
						                   'Student_date_of_birth'=>$this->student_date_of_birth,
						                   'Student_address '=>$this->student_address
						          	         );
					$database=new Database();
					$database->insert_data("tbl_registered_student",$data);
				    return "Registered successfully"; //returns sucessful registration message
			}
    }


    public function update_register_student()
    {
        $this->load->database();
        $data_alredy_added=$this->db->query("update tbl_registered_student set
                                             Student_first_name='$this->student_first_name',
                                             Student_last_name='$this->student_last_name',
                                             Student_age='$this->student_age',
                                              Student_date_of_birth='$this->student_date_of_birth',
                                               Student_address='$this->student_address'
                                               where Student_registration_id='$this->student_registration_id';
                                               ");
        return "Updated successfully";
    }

     /**
      * @param mixed $student_registration_id
      */
     public function setStudentRegistrationId($student_registration_id)
     {
         $this->student_registration_id = $student_registration_id;
     }



    public function setId($id)
    {
    	$this->id=$id;
    }

    public function setStudent_first_name($first_name)
    {
    	$this->student_first_name=$first_name;
    	
    }

    public function setUser_name($user_name)
    {
    	$this->user_name=$user_name;
    }

    public function setStudent_date_of_birth($date_of_birth)
    {
    	$this->student_date_of_birth=$date_of_birth;
    }
    public function setStudent_age($student_age)
    {
    	$this->student_age=$student_age;
    }
    public function setStudent_address($student_address)
    {
    	$this->student_address=$student_address;
    }

    public function setStudent_last_name($last_name)
    {
        $this->student_last_name=$last_name;
    }

    public function set_password($get_password)
    {
         $this->password=$get_password;
    }
    public function setProfile_image_path($image_path)
    {
        $this->profile_image_path=$image_path;
    }

    public function setStudent_class_no($class_no)
    {
        $this->student_class_no=$class_no;
    }



    public function check_registration_availability()
    {
        //echo $this->id;
           $database=new Database();
           //select_data($selecting_fields,$table_name,$where_condition_data)
           $got_data=$database->select_data("*",
                                  "tbl_registered_student",
                                   array('Student_registration_id' =>"$this->id")
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
           // select_data($selecting_fields,$table_name,$where_condition_data);
           $got_data=$database->select_data("*",
                                  "tbl_student_account",
                                   array('Student_registration_id' =>"$this->id")
                                  );
            if (sizeof($got_data)==0) {
                return true; //not available true
            }
            else
            {
                return false;
            }
    }


  public function check()
  {
      echo 'checked';
  }



     public function get_student_id($user_type,$user_name)
     {
         $database=new Database();
            $student_id=$database->find_user_id($user_type,$user_name);
            return $student_id;
     }

  






 } 
?>
<?php


include_once ('interfaces/Interface_all_user.php');
include_once ('interfaces/Interface_Student_Parent.php');
include_once ('interfaces/Interface_Student_Parent_Teacher.php');
include ('User.php');
class Parents extends User implements Interface_all_user,Interface_Student_Parent,Interface_Student_Parent_Teacher
{
    private $homework;//from Homework class
    private $id;
    private $student_registration_id;
    private $user_name; //implement for all
    private $password;
    private $parent_first_name;
    private $parent_last_name;
    private $parent_phone_no;
    private $profile_image_path;

    /**
     * @param mixed $homework
     */
    public function setHomework($homework)
    {
        $this->homework = $homework;
    }


    public function check_account_availability()
    {
        $this->load->database();
        $query=$this->db->get('tbl_student_account');
        $data_alredy_added=$this->db->query("SELECT * FROM `tbl_student_account` WHERE `Student_account_id`=$this->id and `Parent_account_id` is null");
        $got_data=$data_alredy_added->result();

        if (sizeof($got_data)==0) {
            return true; //already parent account have
        }
        else
        {
            return false;
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $student_registration_id
     */
    public function setStudentRegistrationId($student_registration_id)
    {
        $this->student_registration_id = $student_registration_id;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $parent_first_name
     */
    public function setParentFirstName($parent_first_name)
    {
        $this->parent_first_name = $parent_first_name;
    }

    /**
     * @param mixed $parent_last_name
     */
    public function setParentLastName($parent_last_name)
    {
        $this->parent_last_name = $parent_last_name;
    }

    /**
     * @param mixed $parent_phone_no
     */
    public function setParentPhoneNo($parent_phone_no)
    {
        $this->parent_phone_no = $parent_phone_no;
    }

    /**
     * @param mixed $profile_image_path
     */
    public function setProfileImagePath($profile_image_path)
    {
        $this->profile_image_path = $profile_image_path;
    }

	


	public function add_homework($value='')
	{
		# code...
	}


        //@override
	public function view_profile()
	{

	}//implement for all
        //@override
	public function view_student_report(){

	} //implement for all

	//@override
	public function request_leave()
	{

	}//comes from Interface_Student_parent
	//@override
	public function view_attendance()
	{

	} //comes from Interface_Student_parent
	//@override
	public function sign_up() //this function create new account for the parent and saves parent detail in database
	{
        $this->load->database();
        $query=$this->db->get('tbl_parent_account');
        $result_object=$this->db->query("select Parent_account_id from tbl_parent_account order by Parent_account_id desc limit 1;");
        $results=$result_object->result();
        $parent_new_account_id;
        if (sizeof($results)==0)
        {
            $this->parent_new_account_id=1; //parent account id for fist parent accunt
        } else {
            $last_id;
            foreach ($results as $key => $parent_ids) {
                $last_id=$parent_ids->Parent_account_id;
            }
            $this->parent_new_account_id=$last_id+1; //hew , it gets last account id and increase by1 for new account
        }
        $database=new Database();
        $data= array('Parent_account_id' =>$this->parent_new_account_id, 'Parent_first_name'=>$this->parent_first_name, 'Parent_last_name'=>$this->parent_last_name,
            'Phone_no'=>$this->parent_phone_no, 'Parent_username'=>$this->user_name, 'Parent_password'=>$this->password,
            'Profile_image_path'=>$this->profile_image_path
        );
        $database->insert_data('tbl_parent_account',$data);
        $result_object_insert_check=$this->db->query("select Parent_account_id from tbl_parent_account where Parent_account_id=$this->parent_new_account_id");
        $results_insert_check=$result_object_insert_check->result(); //to check account id created for not
        if (sizeof($results_insert_check)==0) {
            return false;
        } else {
            $database->update_table('tbl_student_account','Student_account_id',$this->student_registration_id,
                array('Parent_account_id'=>$this->parent_new_account_id));
            return true;
        }
	}  //comes from Interface_Student_parent_Teacher
	//@override
	public function view_homework_detail()
	{

	} //comes from Interface_Student_parent_Teacher


    
}
?>
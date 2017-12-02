<?php  
/**
* 
*/
include_once ('Database.php');
class Attendance extends CI_Model
{
	private $class_no;
    private $attendance_p_a;
    private $year;
    private $month;
    private $day;
    private $student_reg_id;



    public function get_roll_no()  // this function is to get roll number of student
    {
        $this->load->Database();
        $roll_no=$this->db->query("select Roll_no from tbl_student_roll_no where Class_no=$this->class_no and Student_registration_id=$this->student_reg_id");
        foreach ($roll_no->result() as $roll_no_data)
        {
            return $roll_no_data->Roll_no; // returns roll number
        }
    }
	public function add_attendance() // this function saves all the attendace detail of the class
	{
        $this->load->Database();
        $check_alredy_stored=$this->db->query("select * from tbl_attendance where Student_registration_id=$this->student_reg_id
        and Class_no=$this->class_no and Today_year=$this->year and Today_month=$this->month and Today_day=$this->day");
        if (sizeof($check_alredy_stored->result())==0) //if attendace is not stored already for same day
        {
                $database=new Database();
                $data=array(
                    'Student_roll_no'=>$this->get_roll_no(),
                    'Class_no'=>$this->class_no,
                    'Student_registration_id'=>$this->student_reg_id,
                    'Attendance_record'=>$this->attendance_p_a,
                    'Today_year'=>$this->year,
                    'Today_month'=>$this->month,
                    'Today_day'=>$this->day
                );
                $database->insert_data('tbl_attendance',$data);
                return true;
        }
        else // if attendance is alredy stored int the system
        {
            return false;
        }
	}

    public function view_attendance()
    {

    }

    /**
     * @param mixed $class_no
     */
    public function setClassNo($class_no)
    {
        $this->class_no = $class_no;
    }

    /**
     * @param mixed $attendance_p_a
     */
    public function setAttendancePA($attendance_p_a)
    {
        $this->attendance_p_a = $attendance_p_a;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }


    public function setStudentRegId($student_reg_id)
    {
        $this->student_reg_id = $student_reg_id;
    }

}

?>
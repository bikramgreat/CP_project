<?php
/**
* 
*/
class Homework extends CI_Model
{
	private $homework_subject;
	private $homework_class_no;

	private $homework_chapter_no;

	private $homework_created_date;
	private $homework_last_date;
	private $homework_detail;
    private $new_homework_id;
    private $last_id;

    /**
     * @param mixed $homework_detail
     */
    public function setHomeworkDetail($homework_detail)
    {
        $this->homework_detail = $homework_detail;
    }


	public function add_homework() //this funtion adds homework detail in database
	{
        $this->load->database();
        $query=$this->db->get('tbl_homework');
        $result_object=$this->db->query("select Homework_id from tbl_homework order by Homework_id desc limit 1;");
        $results=$result_object->result();
        if (sizeof($results)==0)
        {
            $this->new_homework_id=1;
        } else {
            foreach ($results as $key => $homework_ids) {
                $this->last_id=$homework_ids->Homework_id;
            }
            $this->new_homework_id=$this->last_id+1;
        }
        $database=new Database();
        $data= array('Homework_id' =>$this->new_homework_id,
            'Class_no'=>$this->homework_class_no,
            'Subject_name'=>$this->homework_subject,
            'Homework_detail'=>$this->homework_detail,
            'Homework_submit_last_date'=>$this->homework_last_date,
            'added_date'=>$this->homework_created_date
        );
        $result_object_insert_already_check=$this->db->query("select Homework_id from tbl_homework 
                                                               where Class_no='$this->homework_class_no'
                                                               and Subject_name='$this->homework_subject'
                                                               and Homework_detail='$this->homework_detail'
                                                               and Homework_submit_last_date='$this->homework_last_date'
                                                               and added_date='$this->homework_created_date'
                                                              ");
        if (sizeof($result_object_insert_already_check->result())==0) {
            $database->insert_data('tbl_homework',$data);
            $result_object_insert_check=$this->db->query("select Homework_id from tbl_homework where Homework_id='$this->new_homework_id'");
            $results_insert_check=$result_object_insert_check->result();
            if (sizeof($results_insert_check)==0) {
                return false;
            } else {
                return true;
            }
        }
        else
        {
            return false; //if data is all ready inserted
        }


	}
    public function setHomeworkClassNo($homework_class_no)
    {
        $this->homework_class_no = $homework_class_no;

    }

    /**
     * @param mixed $homework_subject
     */
    public function setHomeworkSubject($homework_subject)
    {
        $this->homework_subject = $homework_subject;
    }

    /**
     * @param mixed $homework_chapter_no
     */
    public function setHomeworkChapterNo($homework_chapter_no)
    {
        $this->homework_chapter_no = $homework_chapter_no;
    }

    /**
     * @param mixed $homework_chapter_name
     */

    /**
     * @param mixed $homework_created_date
     */
    public function setHomeworkCreatedDate($homework_created_date)
    {
        $this->homework_created_date = $homework_created_date;
    }

    /**
     * @param mixed $homework_last_date
     */
    public function setHomeworkLastDate($homework_last_date)
    {
        $this->homework_last_date = $homework_last_date;
    }

	public function view_homework() //this function returns all the homework detail according class number and sunject name
	{
        $this->load->database();
        $result_object=$this->db->query("SELECT *, (Homework_submit_last_date-CURDATE()) as number_of_day FROM tbl_homework WHERE Class_no='$this->homework_class_no' and 	Subject_name='$this->homework_subject' and Homework_checked='n' and Homework_submit_last_date>=CURDATE() ORDER by Homework_submit_last_date ASC");
        return $results=$result_object->result();
	}
	public function save_student_homework_report($student_id,$homework_done,$homework_remark,$homework_id) //this funtions saves the homework detail of student
    {
        $database=new Database();
        $select_data=$database->select_data('*','tbl_student_homework',array(
                               'Homework_id'=>$homework_id,
                               'Student_account_id'=>$student_id
                              ));
        if(sizeof($select_data)==0)
        {
            if($homework_done=="done") { //if homework is done
                $done='y';
            } else{
                $done='n';
            }
            $data=array( 'Student_account_id'=>$student_id,
                'Homework_id'=>$homework_id,
                'Done'=>$done,
                'Remark'=>$homework_remark
            );
            $database->insert_data('tbl_student_homework',$data);
            $database=new Database();
            $database->update_table('tbl_homework','Homework_id',$homework_id,array(Homework_checked=>'y'));//to update homework in check
            return true;
        } else {
            return false;
        }
    }

    public function delete_homework($homework_id)
    {
       $database=new Database();
       //echo $homework_id;
       $delete_check= $database->delete_data('tbl_homework',array('Homework_id'=>$homework_id));
       if($delete_check==true)
       {
           return true;
       }
       else
        {
            return false;
        }
    }
}
?>
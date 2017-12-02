<?php
/**
* 
*/
class Database extends CI_Model
{
	
	public function insert_data($table_name,$data)
	{
    //echo "flksjdfla";
		 $this->load->database();
		 $this->db->insert($table_name,$data);
		//$this->db->close();
	}

	public function delete_data($table_name,$where_array)
    {
        //echo print_r($where_array);
        $this->load->database();
        $this->db->where($where_array);
        return $this->db->delete($table_name);

    }


  public function update_table($table_name,$column_for_where,$value_for_where,$data)
  {
            $this->load->database();
            $this->db->where("$column_for_where",$value_for_where);
            $this->db->update("$table_name",$data);
            //$this->db->close();
  }

	public function find_user_id($user_type,$user_name)
	{
		$this->load->database();
		if ($user_type=="Admin"||$user_type=="Teacher") {
            $query_teacher=$this->db->get('tbl_teacher_account');
            $result_teacher=$this->db->query("select Teacher_account_id from tbl_teacher_account where Teacher_username='$user_name';");
           // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
             $results_teacher=$result_teacher->result();
             foreach ($results_teacher as $key => $user_id) {
               return $user_id->Teacher_account_id;
              }

          }
          else if($user_type=="Student")
          {
             $query_student=$this->db->get('tbl_student_account');
             $result_student=$this->db->query("select Student_account_id from tbl_student_account where Student_username='$user_name';");
           // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
             $results_student=$result_student->result();
             foreach ($results_student as $key => $user_id) {
               return $user_id->Student_account_id;
              }
          }

          else if($user_type=="Parent")
          {
              $query_parent=$this->db->get('tbl_parent_account');
              $result_parent=$this->db->query("select Parent_account_id from tbl_parent_account where Parent_username='$user_name';");
           // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
              $results_parent=$result_parent->result();
              foreach ($results_parent as $key => $user_id) {
               return $user_id->Parent_account_id;
              }
          }
          //$this->db->close();
	}

  public function check_data_redundancy()
  {
    
  }


  public function get_user_detail($id)
  {
          $this->load->database();
          $result_teacher=$this->db->query("select * from tbl_teacher_account where Teacher_account_id=$id");
          // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
          $results_teacher=$result_teacher->result();
          if (sizeof($results_teacher)!=0)
          {
              return $results_teacher;

          }
          else
          {
              $result_student=$this->db->query("select * from tbl_student_account where Student_account_id=$id;");
              // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
              $results_student=$result_student->result();
              if(sizeof($results_student)!=0)
              {
                  return $results_student;
              }
              else
              {
                  $result_parent=$this->db->query("select * from tbl_parent_account where Parent_account_id=$id;");
                  // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
                  $results_parent=$result_parent->result();
                  return $results_parent;
              }
          }

  }


    public function get_user_name($id)
    {
        $this->load->database();
        $result_teacher=$this->db->query("select * from tbl_teacher_account tta, tbl_registered_teacher trt where tta.Teacher_registration_id=trt. 	Teacher_registration_id and tta.Teacher_account_id=$id");
        // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
        $results_teacher=$result_teacher->result();
        if (sizeof($results_teacher)!=0)
        {
            foreach ($results_teacher as $teacher_data)
            {
                return $teacher_data->Teacher_first_name." ".$teacher_data->Teacher_last_name;
            }


        }
        else
        {
            $result_student=$this->db->query("select * from tbl_student_account tsa, tbl_registered_student trs where tsa.Student_registration_id=trs.Student_registration_id and Student_account_id=$id;");
            // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
            $results_student=$result_student->result();
            if(sizeof($results_student)!=0)
            {
                foreach ($results_student as $teacher_data)
                {
                    return $teacher_data->Student_first_name." ".$teacher_data->Student_last_name;
                }

            }
            else
            {
                $result_parent=$this->db->query("select * from tbl_parent_account where Parent_account_id=$id;");
                // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
                $results_parent=$result_parent->result();
                foreach ($results_parent as $parent_data)
                {
                    return $parent_data->Parent_first_name." ".$parent_data->Parent_last_name;
                }

            }
        }

    }

  public function select_data($selecting_fields,$table_name,$where_condition_data)
  {
    //print_r($where_condition_data);
      // $data= array('Teacher_registration_id' =>$this->id);
        $this->load->Database();
        $this->db->select($selecting_fields);
        $this->db->from($table_name);
        $this->db->where($where_condition_data);
        $query = $this->db->get();        
        return $query->result();
  }

  public function join_select_data()
  {
    // $this->db->select('*'); // Select field
    // $this->db->from('table1'); // from Table1
    // $this->db->join('table2','table1.col1 = table2.col1','INNER'); // Join table1 with table2 based on the foreign key
    // $this->db->where('table1.col1',2); // Set Filter
    // $res = $this->db->get();
  }
}
?>
<?php
include ('Calendar.php');
include('Message.php');
include ('Event.php');
include ('Notification.php');
include_once ('Database.php');
abstract class User extends CI_Model
{
   private $calendar;
   private $massage;
   private $event;
   private $notification;
   public function sign_in($user_name,$password,$user_type)//checks the user account validity according to user type 
   {
   	  if ($user_type=="Teacher") {
        $this->load->database();
        $query=$this->db->get('tbl_teacher_account');
        $result_object=$this->db->query("select * from tbl_teacher_account where Teacher_username='$user_name'"); // running query and getting object of all data
        $results=$result_object->result(); //getting data from object in array
         if (sizeof($results)==0)// if username is mached 
         {
           return "username_false";
         }
         else {
          foreach ($results as $row) {
                 if ($row->Teacher_password==$password)//if password is mached 
                 {

                    $database=new Database();
                    $user_id_online=$database->find_user_id($user_type,$user_name);
                    $data = array('online' => 'y', 
                                  'online_date'=>date("Y-m-d"),
                                  'online_time'=>date("H:i:s")
                                  );
                    $database->update_table("tbl_teacher_account","Teacher_account_id",$user_id_online,$data);
                    return "password_true";
                 }
                 else
                 {
                    return "password_false";
                 }
          }
         }
      }


      else if($user_type=='Admin')
      {

              $this->load->database();
              $query=$this->db->get('tbl_teacher_account');
              $result_object=$this->db->query("select * from tbl_teacher_account where Teacher_username='$user_name' and  User_type='admin'"); // running query and getting object of all data
              $results=$result_object->result(); //getting data from object in array
              //echo "<pre>";
              //echo print_r($results);
              // echo $results["Teacher_password"];
              if (sizeof($results)==0)// if username is mached
              {
                  return "username_false";
              }
              else
              {
                  foreach ($results as $row)
                  {
                      if ($row->Teacher_password==$password)//if password is mached
                      {

                          $database=new Database();
                          $user_id_online=$database->find_user_id($user_type,$user_name);
                          // $dates = time () ;
                          //  $day = date('d', $dates) ;
                          //  $month =date('m', $dates) ;
                          //  $year = date('Y', $dates) ;
                          $data = array('online' => 'y',
                              'online_date'=>date("Y-m-d"),
                              'online_time'=>date("H:i:s")
                          );
                          $database->update_table("tbl_teacher_account","Teacher_account_id",$user_id_online,$data);
                          return "password_true";
                      }
                      else
                      {
                          return "password_false";
                      }
                  }

              }
      }
      else if($user_type=="Student"){
          $this->load->database();
          $query=$this->db->get('tbl_student_account');
          $result_object=$this->db->query("select * from tbl_student_account where Student_username='$user_name'"); // running query and getting object of all data
          $results=$result_object->result(); //getting data from object in array
          //echo "<pre>";
          //echo print_r($results);
          // echo $results["Student_password"];
          if (sizeof($results)==0)// if username is mached
          {
              return "username_false";
          }
          else
          {
              foreach ($results as $row)
              {
                  if ($row->Student_password==$password)//if password is mached
                  {

                      $database=new Database();
                      $user_id_online=$database->find_user_id($user_type,$user_name);
                      // $dates = time () ;
                      //  $day = date('d', $dates) ;
                      //  $month =date('m', $dates) ;
                      //  $year = date('Y', $dates) ;
                      $data = array('online' => 'y',
                          'online_date'=>date("Y-m-d"),
                          'online_time'=>date("H:i:s")
                      );
                      $database->update_table("tbl_student_account","Student_account_id",$user_id_online,$data);

                      return "password_true";
                  }
                  else
                  {
                      return "password_false";
                  }
              }

          }
      }
      
      else if($user_type="Parent"){
          $this->load->database();
          $query=$this->db->get('tbl_parent_account');
          $result_object=$this->db->query("select * from tbl_parent_account where Parent_username='$user_name'"); // running query and getting object of all data
          $results=$result_object->result(); //getting data from object in array
          //echo "<pre>";
          //echo print_r($results);
          // echo $results["Student_password"];
          if (sizeof($results)==0)// if username is mached
          {
              return "username_false";
          }
          else
          {
              foreach ($results as $row)
              {
                  if ($row->Parent_password==$password)//if password is mached
                  {

                      $database=new Database();
                      $user_id_online=$database->find_user_id($user_type,$user_name);
                      // $dates = time () ;
                      //  $day = date('d', $dates) ;
                      //  $month =date('m', $dates) ;
                      //  $year = date('Y', $dates) ;
                      $data = array('online' => 'y',
                          'online_date'=>date("Y-m-d"),
                          'online_time'=>date("H:i:s")
                      );
                      $database->update_table("tbl_parent_account","Parent_account_id",$user_id_online,$data);

                      return "password_true";
                  }
                  else
                  {
                      return "password_false";
                  }
              }

          }
      }

      
   }

   public function list_online_user()
   {

   }

    public function sand_massage($user_type,$sender_username,$receiver_id,$massage_detail)
   {
      $database=new Database();
      $sender_id=$database->find_user_id($user_type,$sender_username);

      
      $dates = time () ; 
      $day = date('d', $dates) ;  
      $month =date('m', $dates) ;
      $year = date('Y', $dates) ;


   	  $massage=new Message();
      $massage->setMassage_sender($sender_id);
      $massage->setMassage_receiver($receiver_id);
      $massage->setMassage_body($massage_detail);
      $massage->setMassage_send_date($year."-".$month."-".$day);

      $massage->sand_massage();
   }
   public function view_calendar($value='')
   {
   	    $calendar=new Calendar();
   }

   public function view_notification($value='')
   {
   	     $notification=new Notification();
   }


   public function get_notice_number($user_type,$username)
   {
      $notification=new Notification();
      return $notification->get_notice_number($user_type,$username);
   }

   public function get_massage_number($user_type,$username)
   {
       $massage=new Message();
       return $massage->get_massage_numbers($user_type,$username);
   }

    public function view_event($full_date)
   {
   	 $event=new Event();
     $event->setEvent_date($full_date);
     return $event->view_event();
     
   }

    public function view_massage($other_user_id,$current_user_name,$user_type){
          $current_user_id="";
          $this->load->database();
          if ($user_type=="Admin"||$user_type=="Teacher") {
            $query_teacher=$this->db->get('tbl_teacher_account');
            $result_teacher=$this->db->query("select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name';");
             $results_teacher=$result_teacher->result();
             foreach ($results_teacher as $key => $user_id) {
               $this->current_user_id=$user_id->Teacher_account_id;
              }
          }
          else if($user_type=="Student") {
             $query_student=$this->db->get('tbl_student_account');
             $result_student=$this->db->query("select Student_account_id from tbl_student_account where Student_username='$current_user_name';");
             //echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
             $results_student=$result_student->result();
             foreach ($results_student as $key => $user_id) {
               $this->current_user_id=$user_id->Student_account_id;
              }
          }
          else if($user_type=="Parent") {
              $query_parent=$this->db->get('tbl_parent_account');
              $result_parent=$this->db->query("select Parent_account_id from tbl_parent_account where Parent_username='$current_user_name';");
           // echo "select Teacher_account_id from tbl_teacher_account where Teacher_username='$current_user_name'";
              $results_parent=$result_parent->result();
              foreach ($results_parent as $key => $user_id) {
               $this->current_user_id=$user_id->Parent_account_id;
              }
          }
          $massage=new Message();
          $massage->setMassage_sender($this->current_user_id);
          $massage->setMassage_receiver($other_user_id);
          return $massage->view_massage();
   }

   public function get_user_name($user_id)
   {
       $this->load->database();
       $result_teacher=$this->db->query("select * from tbl_teacher_account tta,tbl_registered_teacher trt where tta.Teacher_registration_id =trt.Teacher_registration_id and tta.Teacher_account_id=$user_id;");
       $results_teacher=$result_teacher->result();
       if (sizeof($results_teacher)!=0)
       {
           return $results_teacher;
       }
       else
       {
          // $query_student=$this->db->get('tbl_student_account');
           $result_student=$this->db->query("select * from tbl_student_account tsa,tbl_registered_student trs where tsa.Student_registration_id =trs.Student_registration_id and tsa.Student_account_id=$user_id;");
           $results_student=$result_student->result();
           if (sizeof($results_student)!=0)
           {
               return $results_student;
           }
           else
           {

               $result_parent=$this->db->query("select * from tbl_parent_account where Parent_account_id=$user_id");
               $results_parent=$result_parent->result();
               return $results_parent;
           }
       }
   }

   public function search_user($name)
   {
      $this->load->database();
      $query_teacher=$this->db->get(' tbl_teacher_account');
      $result_teacher=$this->db->query("select * from tbl_teacher_account tta,tbl_registered_teacher trt where tta.Teacher_registration_id =trt.Teacher_registration_id and (INSTR(trt.Teacher_first_name, '{$name}') > 0 OR INSTR(trt.Teacher_last_name, '{$name}') >0);");
       $results_teacher=$result_teacher->result();
     // echo "select * from tbl_teacher_account tta,tbl_registered_teacher trt where tta.Teacher_registration_id =trt.Teacher_registration_id and INSTR(trt.Teacher_first_name, '{$name}') > 0 OR INSTR(trt.Teacher_last_name, '{$name}') >0;";

       $query_student=$this->db->get('tbl_student_account');
       $result_student=$this->db->query("select * from tbl_student_account tsa,tbl_registered_student trs where tsa.Student_registration_id =trs.Student_registration_id and (INSTR(trs.Student_first_name, '{$name}') > 0 OR INSTR(trs.Student_last_name, '{$name}') >0);");
       $results_student=$result_student->result();
      // echo "select * from tbl_student_account tsa,tbl_registered_student trs where tsa.Student_registration_id =trs.Student_registration_id and (INSTR(trs.Student_first_name, '{$name}') > 0 OR INSTR(trs.Student_last_name, '{$name}') >0);";
       $query_parent=$this->db->get('tbl_parent_account');
       $result_parent=$this->db->query("select * from tbl_parent_account where INSTR(Parent_first_name, '{$name}') > 0 OR INSTR(Parent_last_name, '{$name}') >0;");
       $results_parent=$result_parent->result();
       //echo  "select * from tbl_parent_account where INSTR(Parent_first_name, '{$name}') > 0 OR INSTR(Parent_last_name, '{$name}') >0;";
       $all_searched_user=$arrayName = array('teacher' =>$results_teacher,'student'=> $results_student,'parent'=>$results_parent);
       return $all_searched_user;



   }

   public function log_out($user_name,$user_type)
   {
       $database=new Database();
       if ($user_type=='Teacher'||$user_type=='Admin')
       {

           $user_id_online=$database->find_user_id($user_type,$user_name);
           // $dates = time () ;
           //  $day = date('d', $dates) ;
           //  $month =date('m', $dates) ;
           //  $year = date('Y', $dates) ;
           $data = array('online' => 'n',
               'online_date'=>date("Y-m-d"),
               'online_time'=>date("H:i:s")
           );
           $database->update_table("tbl_teacher_account","Teacher_account_id",$user_id_online,$data);
       }

       else if($user_type=='Parent')
       {

           $user_id_online=$database->find_user_id($user_type,$user_name);
           // $dates = time () ;
           //  $day = date('d', $dates) ;
           //  $month =date('m', $dates) ;
           //  $year = date('Y', $dates) ;
           $data = array('online' => 'n',
               'online_date'=>date("Y-m-d"),
               'online_time'=>date("H:i:s")
           );
           $database->update_table("tbl_parent_account","Parent_account_id",$user_id_online,$data);
       }

       else if($user_type=='Student')
       {
           $user_id_online=$database->find_user_id($user_type,$user_name);
           // $dates = time () ;
           //  $day = date('d', $dates) ;
           //  $month =date('m', $dates) ;
           //  $year = date('Y', $dates) ;
           $data = array('online' => 'n',
               'online_date'=>date("Y-m-d"),
               'online_time'=>date("H:i:s")
           );
           $database->update_table("tbl_student_account","Student_account_id",$user_id_online,$data);
       }


   }



   public function check_user_name_uniqueness($user_name)
   {
    //echo $user_name;
         $database=new Database();
         //select_data($selecting_fields,$table_name,$where_condition_data)
          $got_data_teacher=$database->select_data("*",
                              "tbl_teacher_account",
                               array('Teacher_username' =>$user_name)
                              );

          $got_data_student=$database->select_data("*",
                              "tbl_student_account",
                               array('Student_username' =>$user_name)
                              );

          $got_data_student=$database->select_data("*",
                              "tbl_parent_account",
                               array('Parent_username' =>$user_name)
                              );


            if (sizeof($got_data_teacher)==0 && sizeof($got_data_student)==0 && sizeof($got_data_student)==0) {
              return true;
            }
            else
            {
              return false;
            }
   }

   public function get_online_user()
   {
       $this->load->database();
       $query_teacher=$this->db->get(' tbl_teacher_account');
       $result_teacher=$this->db->query("select * from tbl_teacher_account tta,tbl_registered_teacher trt where tta.Teacher_registration_id =trt.Teacher_registration_id and online='y';");
       $results_teacher=$result_teacher->result();
       // echo "select * from tbl_teacher_account tta,tbl_registered_teacher trt where tta.Teacher_registration_id =trt.Teacher_registration_id and INSTR(trt.Teacher_first_name, '{$name}') > 0 OR INSTR(trt.Teacher_last_name, '{$name}') >0;";

       $query_student=$this->db->get('tbl_student_account');
       $result_student=$this->db->query("select * from tbl_student_account tsa,tbl_registered_student trs where tsa.Student_registration_id =trs.Student_registration_id and online='y';");
       $results_student=$result_student->result();
       // echo "select * from tbl_student_account tsa,tbl_registered_student trs where tsa.Student_registration_id =trs.Student_registration_id and (INSTR(trs.Student_first_name, '{$name}') > 0 OR INSTR(trs.Student_last_name, '{$name}') >0);";
       $query_parent=$this->db->get('tbl_parent_account');
       $result_parent=$this->db->query("select * from tbl_parent_account where online='y';");
       $results_parent=$result_parent->result();
       //echo  "select * from tbl_parent_account where INSTR(Parent_first_name, '{$name}') > 0 OR INSTR(Parent_last_name, '{$name}') >0;";
       $all_searched_user = array('teacher' =>$results_teacher,'student'=> $results_student,'parent'=>$results_parent);
       return $all_searched_user;
   }


   public function get_notice_list($user_type)
   {
       $notification=new Notification();
       return $notification->get_notice_list($user_type);
   }

   public function get_massage_list($user_type,$user_name)
   {
       $massage=new Message();
       $database=new Database();
       $user_id=$database->find_user_id($user_type,$user_name);
       return $massage->get_message_list($user_id);

   }


    public function get_student_list($Class_no)
    {
        $this->load->database();
        //$query=$this->db->get('tbl_student_account');
        $result_object=$this->db->query("select *  from tbl_registered_student trs, tbl_student_account tsa WHERE trs.Student_registration_id=tsa.Student_registration_id and tsa.Class_no=$Class_no ORDER BY Student_first_name ASC");
        return $result_object->result();
    }

    public function get_student_report($account_id)
    {
        $this->load->database();
        //$query=$this->db->get('tbl_student_account');
        $result_object=$this->db->query("select *  from tbl_registered_student trs, tbl_student_account tsa , tbl_student_roll_no tsrn 
                                         WHERE trs.Student_registration_id=tsa.Student_registration_id 
                                         and trs.Student_registration_id=tsrn.Student_registration_id
                                         and tsa.Student_account_id=$account_id
                                         and tsa.Class_no=tsrn.Class_no");
        $student_data=$result_object->result();
        $student_reg_id="";
        $student_class_no="";
        $student_roll_no="";
        foreach ($student_data as $student_account_data)
        {
            $student_reg_id=$student_account_data->Student_registration_id;
            $student_class_no=$student_account_data->Class_no;
            $student_roll_no=$student_account_data->Roll_no;

        }
        $database=new Database();
        $student_attendances=$database->select_data("*",'tbl_attendance',array(
                                                                                   'Student_roll_no'=>$student_roll_no,
                                                                                    'Class_no'=>$student_class_no,
                                                                                    'Student_registration_id'=>$student_reg_id
                                                                                   ));
        $total_attendance=sizeof($student_attendances);
        $attendance_a=0;
        $attendance_p=0;
        $this_month_total_attendance=0;
        $this_month_attendance_a=0;
        $this_month_attendance_p=0;



          $dates = time () ;
          $day = date('d', $dates) ;
        $month =date('m', $dates) ;
          $year = date('Y', $dates) ;
        foreach ($student_attendances as $student_attendance_data)
        {
            if($student_attendance_data->Attendance_record=="p")
            {
                $attendance_p=$attendance_p+1;
            }
            if($student_attendance_data->Today_year==$year && $student_attendance_data->Today_month==$month)
            {
                $this_month_total_attendance=$this_month_total_attendance+1;
                if($student_attendance_data->Attendance_record=="p")
                {
                    $this_month_attendance_p=$this_month_attendance_p+1;
                }
            }

        }
        $attendance_a=$total_attendance-$attendance_p;
        //echo $attendance_a;
        $this_month_attendance_a=$this_month_total_attendance-$this_month_attendance_p;
        //echo $this_month_attendance_p;
        $total_homeworks=0;
        $homework_done_no=0;
        $homework_not_done_no=0;
        $total_remark=0;
        $total_remark_got=0;
        $account=array(
            'sub_name'=>'account',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $economic=array(
            'sub_name'=>'economic',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $english=array(
            'sub_name'=>'english',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $enviroment=array(
            'sub_name'=>'enviroment',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $gk=array(
            'sub_name'=>'gk',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $math=array(
            'sub_name'=>'math',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $nepali=array(
            'sub_name'=>'nepali',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $opt_math=array(
            'sub_name'=>'Optional math',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $science=array(
            'sub_name'=>'science',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );
        $social=array(
            'sub_name'=>'social',
            'total_homeworks'=>0,
            'done_homework'=>0,
            'done_not_homework'=>0,
            'total_remark'=>0,
            'remark_got'=>0
        );


        $result_object_homework=$this->db->query("select *  from tbl_student_homework tsh, tbl_student_account tsa , tbl_homework th
                                         WHERE tsh.Student_account_id=tsa.Student_account_id
                                         and th.Homework_id=tsh.Homework_id
                                         and tsa.Student_account_id=$account_id
                                         and tsa.Class_no=th.Class_no");
        //echo print_r($result_object_homework->result());
        $total_homeworks=sizeof($result_object_homework->result());
        foreach ($result_object_homework->result() as $student_homework_data)
        {
            switch ($student_homework_data->Subject_name) {
                case "account":
                    if ($student_homework_data->Done=='y')
                    {
                        $account['done_homework']=$account['done_homework']+1;
                    }
                    else{
                        $account['done_not_homework']=$account['done_not_homework']+1;
                    }
                    $account['total_homeworks']=$account['total_homeworks']+1;

                    $account['remark_got']=$account['remark_got']+$student_homework_data->Remark;
                    $account['total_remark']=$account['total_remark']+5;
                    break;



                case "economic":
                    if ($student_homework_data->Done=='y')
                    {
                        $economic['done_homework']=$economic['done_homework']+1;
                    }
                    else{
                        $economic['done_not_homework']=$economic['done_not_homework']+1;
                    }
                    $economic['total_homeworks']=$economic['total_homeworks']+1;

                    $economic['remark_got']=$economic['remark_got']+$student_homework_data->Remark;
                    $economic['total_remark']=$economic['total_remark']+5;
                    break;



                case "english":
                    if ($student_homework_data->Done=='y')
                    {
                        $english['done_homework']=$english['done_homework']+1;
                    }
                    else{
                        $english['done_not_homework']=$english['done_not_homework']+1;
                    }
                    $english['total_homeworks']=$english['total_homeworks']+1;

                    $english['remark_got']=$english['remark_got']+$student_homework_data->Remark;
                    $english['total_remark']=$english['total_remark']+5;
                     break;
                case "enviroment":
                    if ($student_homework_data->Done=='y')
                    {
                        $enviroment['done_homework']=$enviroment['done_homework']+1;
                    }
                    else{
                        $enviroment['done_not_homework']=$enviroment['done_not_homework']+1;
                    }
                    $enviroment['total_homeworks']=$enviroment['total_homeworks']+1;

                    $enviroment['remark_got']=$enviroment['remark_got']+$student_homework_data->Remark;
                    $enviroment['total_remark']=$enviroment['total_remark']+5;
                    break;
                case "gk":
                    if ($student_homework_data->Done=='y')
                    {
                        $gk['done_homework']=$gk['done_homework']+1;
                    }
                    else{
                        $gk['done_not_homework']=$gk['done_not_homework']+1;
                    }
                    $gk['total_homeworks']=$gk['total_homeworks']+1;

                    $gk['remark_got']=$gk['remark_got']+$student_homework_data->Remark;
                    $gk['total_remark']=$gk['total_remark']+5;
                    break;
                case "math":
                    if ($student_homework_data->Done=='y')
                    {
                        $math['done_homework']=$math['done_homework']+1;
                    }
                    else{
                        $math['done_not_homework']=$math['done_not_homework']+1;
                    }
                    $math['total_homeworks']=$math['total_homeworks']+1;

                    $math['remark_got']=$math['remark_got']+$student_homework_data->Remark;
                    $math['total_remark']=$math['total_remark']+5;
                    break;
                case "nepali":
                    if ($student_homework_data->Done=='y')
                    {
                        $nepali['done_homework']=$nepali['done_homework']+1;
                    }
                    else{
                        $nepali['done_not_homework']=$nepali['done_not_homework']+1;
                    }
                    $nepali['total_homeworks']=$nepali['total_homeworks']+1;

                    $nepali['remark_got']=$nepali['remark_got']+$student_homework_data->Remark;
                    $nepali['total_remark']=$nepali['total_remark']+5;
                    break;
                case "opt math":
                    if ($student_homework_data->Done=='y')
                    {
                        $opt_math['done_homework']=$opt_math['done_homework']+1;
                    }
                    else{
                        $opt_math['done_not_homework']=$opt_math['done_not_homework']+1;
                    }
                    $opt_math['total_homeworks']=$opt_math['total_homeworks']+1;

                    $opt_math['remark_got']=$opt_math['remark_got']+$student_homework_data->Remark;
                    $opt_math['total_remark']=$opt_math['total_remark']+5;
                    break;
                case "science":
                    if ($student_homework_data->Done=='y')
                    {
                        $science['done_homework']=$science['done_homework']+1;
                    }
                    else{
                        $science['done_not_homework']=$science['done_not_homework']+1;
                    }
                    $science['total_homeworks']=$science['total_homeworks']+1;

                    $science['remark_got']=$science['remark_got']+$student_homework_data->Remark;
                    $science['total_remark']=$science['total_remark']+5;
                    break;
                default:
                    if ($student_homework_data->Done=='y')
                    {
                        $social['done_homework']=$social['done_homework']+1;
                    }
                    else{
                        $social['done_not_homework']=$social['done_not_homework']+1;
                    }
                    $social['total_homeworks']=$social['total_homeworks']+1;

                    $social['remark_got']=$social['remark_got']+$student_homework_data->Remark;
                    $social['total_remark']=$social['total_remark']+5;
            }
            $total_remark_got=$total_remark_got+$student_homework_data->Remark;


            if ($student_homework_data->Done=='y')
            {
                $homework_done_no=$homework_done_no+1;
            }
        }
       // echo print_r($math);

        $subject=array();
        array_push($subject,$account);
        array_push($subject,$economic);
        array_push($subject,$english);
        array_push($subject,$enviroment);
        array_push($subject,$gk);
        array_push($subject,$math);
        array_push($subject,$nepali);
        array_push($subject,$opt_math);
        array_push($subject,$science);
        array_push($subject,$social);

        $homework_not_done_no=$total_homeworks-$homework_done_no;
        $total_remark=$total_homeworks*5;
        //echo $total_remark;
        $report_data=array(
                        'total_attendance'=>$total_attendance,
                        'attendance_a'=>$attendance_a,
                        'attendance_p'=>$attendance_p,
                        'this_month_total_attendance'=>$this_month_total_attendance,
                        'this_month_attendance_a'=>$this_month_attendance_a,
                        'this_month_attendance_p'=>$this_month_attendance_p,

                        'total_homeworks'=>$total_homeworks,
                        'homework_done_no'=>$homework_done_no,
                        'homework_not_done_no'=>$homework_not_done_no,
                        'total_remark'=>$total_remark,
                        'total_remark_got'=>$total_remark_got,


                          'subject'=>$subject
//                        'account'=>$account,
//                        'economic'=>$economic,
//                        'english'=>$english,
//                        'enviroment'=>$enviroment,
//                        'gk'=>$gk,
//                        'math'=>$math,
//                        'nepali'=>$nepali,
//                        'opt_math'=>$opt_math,
//                        'science'=>$science,
//                        'social'=>$social,
        );

        return $report_data;





    }


    public  function get_student_list_view_attendance($user_type,$user_name)
    {
       // echo $user_type;
        $this->load->database();
        if($user_type=="Student")
        {
            $query=$this->db->query("select * from  tbl_student_account tsa, tbl_registered_student trs
                                     WHERE tsa.Student_registration_id=trs.	Student_registration_id
                                     and Student_username='$user_name'");

            return $query->result();

        }

        elseif ($user_type=="Parent")
        {
            $database=new Database();
            $id=$database->find_user_id($user_type,$user_name);

            $query=$this->db->query("select * from  tbl_student_account tsa, tbl_registered_student trs
                                     WHERE tsa.Student_registration_id=trs.Student_registration_id
                                     and Parent_account_id=$id");

            return $query->result();
        }
    }


    public function get_student_attendance($student_reg_id,$class_no)
    {
        $dates = time () ;
        $day = date('d', $dates) ;
        $month =date('m', $dates) ;
        $year = date('Y', $dates) ;
        $this->load->database();
        $query=$this->db->query("select * from  tbl_attendance
                                     WHERE Student_registration_id=$student_reg_id
                                     and Class_no=$class_no
                                     and Today_year=$year");
        return $query->result();
    }

}



?>
<?php
/**
* 
*/
include_once ('Database.php');
class Notification extends CI_Model
{
	

	private $notification_title;
	private $notification_detail;
	private $notification_created_date;
	private $notification_to_usertype;
	private $notification_provider;

	public function view_notification()
	{
		
	}

	public function sand_notification() //this funtion saves the notices in database
	{
		 $this->load->database();
		 $notification_query=$this->db->query("select Notification_id from tbl_notification where Notification_to_usertype='$this->notification_to_usertype'
		                   and Notification_title='$this->notification_title'
		                   and Notification_date='$this->notification_created_date'
		                   and Id_of_notification_provider='$this->notification_provider'
		                   and Notification_detail='$this->notification_detail'
		                   ");
		 if(sizeof($notification_query->result())==0)//checking the same notice is alredy stored or not for same day
         {
             $data= array('Notification_date' => $this->notification_created_date,
                 'Notification_to_usertype'=>$this->notification_to_usertype,
                 'Notification_title'=>$this->notification_title,
                 'Notification_detail'=>$this->notification_detail,
                 'Id_of_notification_provider'=>$this->notification_provider);
             $database=new Database();
             $database->insert_data('tbl_notification',$data);

             return "Notice is successfully sent"; //return success message
         }
         else{

             return "Notice is already sent"; //returns already sent message
         }
	}

	public function get_notice_number($user_type,$username) //this funtion is for get number of receive notice for current current
	{
        $this->load->database();
         $dates = time () ;
          $day = date('d', $dates) ;
          $month =date('m', $dates) ;
          $year = date('Y', $dates) ;
        if($user_type=="Admin") //for admiin
        {
            $query_result=$this->db->query("select count(*) as notice_number from tbl_notification where Notification_to_usertype='Teacher' or Notification_to_usertype='Teacher, Parent, Student' and Notification_date LIKE '{$year}%' and Notification_date LIKE '%{$month}%'");
            foreach ($query_result->result() as $masssage_number_data)
            {
                return $masssage_number_data->notice_number;
            }
        }
        else //for other user
        {
            $query_result=$this->db->query("select count(*) as notice_number from tbl_notification where Notification_to_usertype='$user_type' or Notification_to_usertype='Teacher, Parent, Student' and Notification_date LIKE '{$year}%' and Notification_date LIKE '%{$month}%'");
            foreach ($query_result->result() as $masssage_number_data)
            {
                return $masssage_number_data->notice_number;
            }
        }
	}
	public function get_notice_list($user_type) //this funtion returns the all list of notice of current moth form database
    {
        $dates = time () ;
        $day = date('d', $dates) ;
        $month =date('m', $dates) ;
        $year = date('Y', $dates) ;
        $this->load->database();
        $query_result=$this->db->query("select * from tbl_notification where Notification_to_usertype='$user_type' or Notification_to_usertype='Teacher, Parent, Student' ORDER  BY Notification_id DESC");
        return $query_result->result();
    }

	public function setNotification_title($title)
	{
		$this->notification_title=$title;
	}
    
    public function setNotification_detail($notice_detail)
	{
		$this->notification_detail=$notice_detail;
	}

	public function setNotification_created_date($notice_date)
	{
		$this->notification_created_date=$notice_date;
	}

	public function setNotification_to_usertype($user_type)
	{
		$this->notification_to_usertype=$user_type;
	}

	public function setNotification_provider($provider_id)
	{
		$this->notification_provider=$provider_id;
	}


}

?>
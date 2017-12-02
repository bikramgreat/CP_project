<?php
include ('Database.php');
class Event extends CI_Model
{

	private $event_title;
	private $event_detail;
	private $event_date;
	
	function __construct()
	{
		
	}

	public function setEvent_date($e_date)
	{
		$this->event_date=$e_date;
	}


	public function view_event() // this function get all the event detail of current month and returns list of event details
	{
		$splited_date=explode('-', $this->event_date,3);
        $checking_date_part=$splited_date[0]."-".$splited_date[1];
		$this->load->database();
		$query=$this->db->get('tbl_event');
		$result_object=$this->db->query("select * from tbl_event where event_date like '{$checking_date_part}%' order by event_date ASC;");
	    $results=$result_object->result();
	    return $results;// returns the array of event details
	}
	public function add_event($event_title,$event_date,$event_detail) //this function saves the event detail in database
	{
		$this->load->database();
		$query=$this->db->get('tbl_event');
		$result_object=$this->db->query("select * from tbl_event where event_date ='$event_date'");
	    $results=$result_object->result();
	    if (sizeof($results)>2) //to limit enter events for same day ,, the admin can only save two event at for same day
	    {
	    	return false;
	    } else {
	    	$result_object_event_unique=$this->db->query("select * from tbl_event where event_title='$event_title' and event_date ='$event_date'");
	        $results_event_unique=$result_object_event_unique->result();
	    	if (sizeof($results_event_unique)>0) //to block adding of same evnet for same day 
	    	{
	    		return false;
	    	} else {
	    		 $data= array('event_detail' => $event_detail , 'event_date'=>$event_date, 'event_title'=> $event_title);
		         $database=new Database();
		         $database->insert_data("tbl_event",$data);
		         return ($this->db->affected_rows() != 1) ? false : true; //return true and false
	    	}
	    }
	}




}
?>
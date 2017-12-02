<?php
class Message extends CI_Model
{
	private $massge_header;
	private $massage_body;
	private $massage_sender;
	private $massage_receiver;
	private $massage_send_date;
	public function sand_massage()
	{
		$data=$arrayName = array('Masssage_send_date' =>$this->massage_send_date, 
			                      'Massage_receiver_id'=>$this->massage_receiver,
			                      'Massage_sender_id'=>$this->massage_sender,
			                      'Massage_viewed'=>'n',
			                      'Massage_detail '=>$this->massage_body,
			                      );
		$database=new Database();
        $database->insert_data('tbl_massage',$data);//returns true or false
        return true;
	}

	public function view_massage()
	{
		    $this->load->database();
		    $query_massage=$this->db->get('tbl_massage');
            $result_massage=$this->db->query("select * from tbl_massage where (Massage_sender_id='$this->massage_sender' and Massage_receiver_id='$this->massage_receiver') OR (Massage_sender_id='$this->massage_receiver' and Massage_receiver_id='$this->massage_sender') order by Massage_id ASC;");
            //echo "select * from tbl_massage where (Massage_sender_id='$this->massage_sender' and Massage_receiver_id='$this->massage_receiver') OR (Massage_sender_id='$this->massage_receiver' and Massage_receiver_id='$this->massage_sender');";

             $results_massage=$result_massage->result();
             foreach ($results_massage as $massage_data)
             {
                 $this->db->query("update tbl_massage set Massage_viewed='y' where Massage_id=$massage_data->Massage_id and Massage_receiver_id=$this->massage_sender;");
             }
             return $results_massage;
	}
	public function get_massage_numbers($user_type,$username)
    {
        $database1=new Database();
        $user_id=$database1->find_user_id($user_type,$username);
        $this->load->database();
        //echo "select count(*) as massage_number from tbl_massage where Massage_receiver_id=$user_id and Massage_viewed='n'";
        $query_result=$this->db->query("select count(*) as massage_number from tbl_massage where Massage_receiver_id=$user_id and Massage_viewed='n'");
        foreach ($query_result->result() as $masssage_number_data)
        {
            return $masssage_number_data->massage_number;
        }
    }
    public function get_message_list($user_id)
    {
        //echo $user_id;
        $this->load->database();
        //echo "select count(*) as massage_number from tbl_massage where Massage_receiver_id=$user_id and Massage_viewed='n'";
        $query_result=$this->db->query("select * from tbl_massage where Massage_receiver_id=$user_id ORDER BY  Massage_id DESC LIMIT 50");
        return $query_result->result();
    }


	public function setMassage_header($header)
	{
		$this->massge_header=$header;
	}
    public function setMassage_body($body)
	{
		$this->massage_body=$body;
	}
	public function setMassage_sender($sender_id)
	{
		$this->massage_sender=$sender_id;
	}
	public function setMassage_receiver($receiver)
	{
		$this->massage_receiver=$receiver;
	}
    public function setMassage_send_date($date)
    {
    	$this->massage_send_date=$date;
    }

}

?>
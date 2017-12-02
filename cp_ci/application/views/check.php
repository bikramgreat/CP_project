<?php
  /**
  * 
  */
  class view
  {
  	
  	function __construct()
  	{
  		  $this->load->driver('session');
		  $session_check=$this->session->has_userdata('user_name');
		  if($session_check==false)
		  {
		  	    echo "no";
		  	    //$data=array('password_error'=>'','username_error'=>'');
		       	//$this->load->view("signin",$data);
		  }
		  else
		  {
		  	echo 'bikram.';
		  }
  	}
  }
  $view_class=new view();
  
?>
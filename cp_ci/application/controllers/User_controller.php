<?php
/**
* 
*/
include ('Controller_admin.php');
include_once ('School.php');
class User_controller extends CI_Controller
{
	
	private $user;
	
	public function log_in()
	{
		if (isset($_COOKIE['coocie_limit_login'])) 
		{
			if ($_COOKIE['coocie_limit_login']>10) {
				$this->load->view('after_cookie_limit_login');
			}
			else
			{

               $user_name=$this->input->post('user_name');
		        $user_password=$this->input->post('user_password');
		        $user_type=$this->input->post('user_type');
				if ($user_type=="Admin") {
					$this->load->model('Admin');
					$this->user=new Admin();

				
				}
				else if ($user_type=="Teacher") {
					$this->load->model('Teacher');
					$this->user=new Teacher();
				}
				else if ($user_type=="Student") {
					$this->load->model('Student');
					$this->user=new Student();
				}

				elseif ($user_type=="Parent") {
					$this->load->model('Parents');
					$this->user=new Parents();
				}
				else
				{

				}

                $login_result=$this->user->sign_in($user_name,$user_password,$user_type);//gets values "username_false", "password_true", "password_false"
		       if($login_result=="username_false")//wrong username
		       {
		       	$count_cookie=$_COOKIE['coocie_limit_login']+1;
			    setcookie('coocie_limit_login',$count_cookie);
//		       	$data=array('username_error'=>'You have entered wrong username','password_error'=>'');
//		       	$this->load->view("signin",$data);

                   $this->session->set_flashdata('error',array('username_error'=>'You have entered wrong username',
                           'password_error'=>'')
                   );
                   redirect('School/login');
		       }
		       else
		       {
		       	if ($login_result=="password_false") //if wrong password
		       	{
		       		$count_cookie=$_COOKIE['coocie_limit_login']+1;
			        setcookie('coocie_limit_login',$count_cookie);
//		       		$data=array('username_error'=>'','password_error'=>'You have entered wrong password');
//		       	    $this->load->view("signin",$data);

                    $this->session->set_flashdata('error',array('username_error'=>'',
                            'password_error'=>'You have entered wrong password')
                    );
                    redirect('School/login');
		       	}
		       	else
		       	{
		       		$session_data=array('user_name'=>$user_name,'user_type'=>$user_type);
		       		$this->load->library('session');// if sessiion is loadded in autoload array then we dont need to write this line
		       		$this->session->set_userdata($session_data);
		       		// $user_data=$this->Admin->view_profile();//gets user data from model/admin  view_profile()
		       		// $data = array('name' => $user_data[''], );
		           //$this->load->view('view_user/view_admin/admin_profile',$session_data);
		            return redirect("User_controller/dashbord");
		       	}
		       	
		       }









				// $count_cookie=$_COOKIE['coocie_limit_login']+1;
			 //    setcookie('coocie_remember_me',$count_cookie);
			}
			
			
			
		}
		else{
			//setcookie('coocie_limit_login','0',time()+900);
			 $user_name=$this->input->post('user_name');
		        $user_password=$this->input->post('user_password');
		        $user_type=$this->input->post('user_type');
				if ($user_type=="Admin") {
					$this->load->model('Admin');
					$this->user=new Admin();

				}
				else if ($user_type=="Teacher") {
					$this->load->model('Teacher');
					$this->user=new Teacher();
				}
				else if ($user_type=="Student") {
					$this->load->model('Student');
					$this->user=new Student();
				}

				elseif ($user_type=="Parent") {
					$this->load->model('Parents');
					$this->user=new Parents();
				}
				else
				{

				}



            $login_result=$this->user->sign_in($user_name,$user_password,$user_type);//gets values "username_false", "password_true", "password_false"
            $this->load->library('session');
		       if($login_result=="username_false")//wrong username
		       {
		           setcookie('coocie_limit_login','1',time()+900);


//		       	$data=array('username_error'=>'You have entered wrong username','password_error'=>'');
//		       	$this->load->view("signin",$data);

		       	$this->session->set_flashdata('error',array('username_error'=>'You have entered wrong username',
                                                        'password_error'=>'')
                                          );
		       	redirect('School/login');
		       }
		       else
		       {
		       	if ($login_result=="password_false") //if wrong password
		       	{
                    $count_cookie=$_COOKIE['coocie_limit_login']+1;
			        setcookie('coocie_limit_login',$count_cookie);
//		       		$data=array('username_error'=>'','password_error'=>'You have entered wrong password');
//		       	    $this->load->view("signin",$data);


                    $this->session->set_flashdata('error',array('username_error'=>'',
                                                    'password_error'=>'You have entered wrong password')
                                              );
                    redirect('School/login');
		       	}
		       	else
		       	{
		       		$session_data=array('user_name'=>$user_name,'user_type'=>$user_type);
		       		//$this->load->library('session');// if sessiion is loadded in autoload array then we dont need to write this line
                    $this->session->sess_expiration = '60';
		       		$this->session->set_userdata($session_data);
		       		// $user_data=$this->Admin->view_profile();//gets user data from model/admin  view_profile()
		       		// $data = array('name' => $user_data[''], );
		           //$this->load->view('view_user/view_admin/admin_profile',$session_data);
		            return redirect("User_controller/dashbord");
		       	}
		       	
		       }

		}



		
  //       $user_name=$this->input->post('user_name');
  //       $user_password=$this->input->post('user_password');
  //       $user_type=$this->input->post('user_type');
		// if ($user_type=="Admin") {
		// 	$this->load->model('Admin');
		// 	$this->user=new Admin();

		
		// }
		// else if ($user_type=="Teacher") {
		// 	$this->load->model('Teacher');
		// 	$this->user=new Teacher();
		// }
		// else if ($user_type=="Student") {
		// 	# code...
		// }

		// elseif ($user_type=="Parent") {
		// 	# code...
		// }
		// else
		// {

		// }


  //       $login_result=$this->user->sign_in($user_name,$user_password,$user_type);//gets values "username_false", "password_true", "password_false"
  //      if($login_result=="username_false")//wrong username
  //      {
  //      	$data=array('username_error'=>'You have entered wrong username','password_error'=>'');
  //      	$this->load->view("signin",$data);
  //      }
  //      else
  //      {
  //      	if ($login_result=="password_false") //if wrong password
  //      	{
  //      		$data=array('username_error'=>'','password_error'=>'You have entered wrong password');
  //      	    $this->load->view("signin",$data);
  //      	}
  //      	else
  //      	{
  //      		$session_data=array('user_name'=>$user_name,'user_type'=>$user_type);
  //      		$this->load->library('session');// if sessiion is loadded in autoload array then we dont need to write this line
  //      		$this->session->set_userdata($session_data);
  //      		// $user_data=$this->Admin->view_profile();//gets user data from model/admin  view_profile()
  //      		// $data = array('name' => $user_data[''], );
  //          //$this->load->view('view_user/view_admin/admin_profile',$session_data);
  //           return redirect("User_controller/dashbord");
  //      	}
       	
  //      }


	}

    

    
	public function dashbord()
	{
		   $this->load->library('session');
           $user_type=$this->session->userdata('user_type');

		   if ( $user_type!="")
			{
				if ($this->session->userdata('user_type')=="Admin") {
					$this->load->view('admin_profile',$this->session->userdata());//direct sends the value of session to dashboard
				}
				else if($this->session->userdata('user_type')=="Teacher")
				{
					$this->load->view('teacher_profile',$this->session->userdata());//direct sends the value of session to dashboard
				}
				else if ($this->session->userdata('user_type')=="Student") {
					$this->load->view('student_profile',$this->session->userdata());//direct sends the value of session to dashboard
				}
				else if ($this->session->userdata('user_type')=="Parent")//direct sends the value of session to dashboard)
				{
					$this->load->view('parent_profile',$this->session->userdata());//direct sends the value of session to dashboard
				}
			}
			else
			{

                redirect("School/login");
			}

				


		
	}



	public function view_profile()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
        if ($user_type=="Admin") {

            $this->load->model('Admin');
            $this->user=new Admin();
        }
        else if($user_type=="Student")
        {
            $this->load->model('Student');
            $this->user=new Student();

        }
        else if($user_type=="Parent")
        {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else if($user_type=="Teacher")
        {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        $this->user->view_profile($user_type,$user_name);


    }

	public function get_massage_number()
	{


        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
		 if ($user_type=="Admin") {

		 	$this->load->model('Admin');
		 	$this->user=new Admin();
//             $this->Admin->get_notification_number($this->session->user_data('user_name'));//gets username from session and sanding as parameter in get_notification_number
//            $admin->sign_in($this->input->post('user_name'),$this->input->post('user_password'),$this->input->post('user_type'));

		}
		else if($user_type=="Student")
		{
            $this->load->model('Student');
            $this->user=new Student();

		}
		else if($user_type=="Parent")
		{
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else if($user_type=="Teacher")
		{
            $this->load->model('Teacher');
            $this->user=new Teacher();
		}



		$massage_number=$this->user->get_massage_number($user_type,$user_name);
		 if($massage_number==0)
         {
             echo "";
         }
         else{
		     echo $massage_number;
         }

	}


	public  function get_notice_number()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
        if ($user_type=="Admin") {

            $this->load->model('Admin');
            $this->user=new Admin();
        }
        else if($user_type=="Student")
        {
            $this->load->model('Student');
            $this->user=new Student();

        }
        else if($user_type=="Parent")
        {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else if($user_type=="Teacher")
        {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }



        $notice_number=$this->user->get_notice_number($user_type,$user_name);
        if($notice_number==0)
        {
            echo "";
        }
        else{
            echo $notice_number;
        }
    }



    public function get_notice_list()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
        if ($user_type=="Admin") {

            $this->load->model('Admin');
            $this->user=new Admin();
        }
        else if($user_type=="Student")
        {
            $this->load->model('Student');
            $this->user=new Student();

        }
        else if($user_type=="Parent")
        {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else if($user_type=="Teacher")
        {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }

        $notice_details=$this->user->get_notice_list($user_type);
       // $array_notice_json=json_encode($notice_details);
          //echo $array_notice_json;
        foreach ($notice_details as $notice_data)
        {
            echo "<div class='col-sm-12' style='margin-top: 10px;'>
                        <div class='col-sm-2'></div>
                        <div class='col-sm-8' style='text-align: center; background-color: #8ba8af;'>
                            <div class='col-sm-12' style='background-color: lightcoral'>
                                <div class='col-sm-4' >
                                  <p><b>Submited Date:</b></p>
                                  <p>$notice_data->Notification_date </p>
                                </div>
                               <div class='col-sm-4'></div>
                               <div class='col-sm-4'>
                                 <p><b>For</b></p>
                                  <p>$notice_data->Notification_to_usertype</p>
                                </div>
                            </div>


                            <p><b>Title</b></p>
                            <p>'$notice_data->Notification_title'</p>

                            <p><b>Notice detail</b></p>
                            <p>$notice_data->Notification_detail</p>
                        </div>
                        <div class='col-sm-2'></div>
                    </div>";
        }

    }

    public function get_massage_list()
    {
        //echo 'fsdkjf';
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
        if ($user_type=="Admin") {

            $this->load->model('Admin');
            $this->user=new Admin();
        }
        else if($user_type=="Student")
        {
            $this->load->model('Student');
            $this->user=new Student();

        }
        else if($user_type=="Parent")
        {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else if($user_type=="Teacher")
        {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        //echo print_r($this->user->get_massage_list($user_type,$user_name));
        $message_list=$this->user->get_massage_list($user_type,$user_name);
        $seen_message_list=array();
        $unseen_message_list=array();
        foreach ($message_list as $message_data)
        {

           if($message_data->Massage_viewed=="n")
           {
               array_push($unseen_message_list,$message_data);

           }
           else{
               array_push($seen_message_list,$message_data);
           }
        }
        //echo sizeof($unseen_message_list);
        $this->load->model("Database");
        $database=new Database();
        $this->load->library('encryption');
        echo "<div class='col-sm-12'>";
            echo "<div class='col-sm-3'></div>";
            echo "<div class='col-sm-6' style='overflow: scroll; background-color: #baaaeb; height: 500px;'>";
                    $repeating_ids_unseen=array();
                    echo "<div class='col-sm-12' style='text-align: center; font-size: 150%;'>Unseen Messages</div>";
                    foreach ($unseen_message_list as $unseen_message_data)
                    {
                      if(in_array($unseen_message_data->Massage_sender_id,$repeating_ids_unseen))
                      {

                      }
                      else
                      {
                          $name=$database->get_user_name($unseen_message_data->Massage_sender_id);
                          array_push($repeating_ids_unseen,$unseen_message_data->Massage_sender_id);
                          //echo $name;
                          $decrypted_message=$this->encryption->decrypt($unseen_message_data->Massage_detail);
                          $sender_name='"'.$name.'"';
                          echo "
                                <div class='col-sm-12' style='background-color: #f582a2; margin-top: 10px;'>
                                  <div class='col-sm-12' style='text-align: center'><b>$name</b> have sent you a message($unseen_message_data->Masssage_send_date):</div>
                                  
                                  <div class='col-sm-12' style='text-align: center'>'$decrypted_message'</div>
                                  <div class='col-sm-4' style='text-align: center'></div>
                                  <div class='col-sm-4'><button onclick='get_messages_from_list($unseen_message_data->Massage_sender_id,$sender_name);' class='btn btn-primary active' style='width:100%; font-size: 110%;'>View in Detail</button></div>
                                  <div class='col-sm-4' style='text-align: center'></div>
                                </div>
                                
                                ";
                      }

                      //$sender_name=
                    }

                    $repeating_ids_seen=array();
                    echo "<div class='col-sm-12' style='text-align: center; font-size: 150%;'>Seen Messages</div>";
                    foreach ($seen_message_list as $seen_message_data)
                    {

                        if(in_array($seen_message_data->Massage_sender_id,$repeating_ids_seen))
                        {

                        }
                        else
                        {
                            $name=$database->get_user_name($seen_message_data->Massage_sender_id);
                            array_push($repeating_ids_seen,$seen_message_data->Massage_sender_id);
                            //echo $name;
                            $sender_name='"'.$name.'"';
                            $decrypted_message=$this->encryption->decrypt($seen_message_data->Massage_detail);
                            echo "
                                <div class='col-sm-12' style='background-color: #e3ceed; margin-top: 10px;'>
                                  <div class='col-sm-12' style='text-align: center'><b>$name</b> have sent you a message($seen_message_data->Masssage_send_date):</div>
                                  
                                  <div class='col-sm-12' style='text-align: center'>'$decrypted_message'</div>
                                  <div class='col-sm-4' style='text-align: center'></div>
                                  <div class='col-sm-4'><button onclick='get_messages_from_list($seen_message_data->Massage_sender_id,$sender_name);' class='btn btn-primary active' style='width:100%; font-size: 110%;'>View in Detail</button></div>
                                  <div class='col-sm-4' style='text-align: center'></div>
                                </div>
                                ";
                        }



                        //$sender_name=
                    }
            echo  "</div>";
            echo "<div class='col-sm-3'></div>";
        echo "</div>";


    }

	public function check_session()
	{
        parent::__construct();
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');
		echo $user_name;
	}

	public function get_online_users()
	{
		//echo "bikram";
        $this->load->driver('session');
        $user_type=$this->session->userdata('user_type');
        $sender_user_name=$this->session->userdata('user_name');

        if ($user_type=="Admin") {
            $this->load->model('Admin');
            $this->user=new Admin();


        }
        else if ($user_type=="Teacher") {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
        }

        elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else
        {

        }
        $user_online_list=$this->user->get_online_user();
        foreach ($user_online_list as $key => $users) {
            //echo $key;

            if ($key=="teacher") {

                foreach ($users as $key => $teacher_user) {
                    //echo $teacher_user->Teacher_first_name;
                    if ($teacher_user->Teacher_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$teacher_user->Teacher_first_name.' '.$teacher_user->Teacher_last_name.'"';
                        echo"<div id='all_online_user_list' style='margin-top: 10px;' onclick='hide_list_option($teacher_user->Teacher_account_id);' onmouseover='show_name_input_field($searched_user_name);'>
                                <li>
                                    
                                        <div class='a_online_user_main_div' style='height: 50px;width: 100%;'>
                                            <div class='a_online_user_main_div_image_div'>
                                             <img src='";echo base_url()."$teacher_user->Profile_image_path' style='height: 40px; width: 40px; border-radius: 50%;'>
                                            </div>
                                            <div class='a_online_user_main_div_user_name_div'><b><P>$searched_user_name</> </b><p style='color: red'>$teacher_user->User_type</p></div>
                                            <div class='a_online_user_main_div_online_green'></div>
                                            <span id='' hidden=''>user_name</span>
                                        </div>
                                    
                                </li>
        
                            </div>";
                    }

                }
            }

            else if($key=="student")
            {

                foreach ($users as $key => $student_user) {
                    if ($student_user->Student_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$student_user->Student_first_name.' '.$student_user->Student_last_name.'"';
                        echo"<div id='all_online_user_list' style='margin-top: 10px;' onclick='hide_list_option($student_user->Student_account_id);' onmouseover='show_name_input_field($searched_user_name);'>
                                <li>
                                    
                                        <div class='a_online_user_main_div' style='height: 50px;width: 100%;'>
                                            <div class='a_online_user_main_div_image_div'>
                                             <img src='";echo base_url()."$student_user->Profile_image_path' style='height: 40px; width: 40px; border-radius: 50%;'>
                                            </div>
                                            <div class='a_online_user_main_div_user_name_div'><b><P>$searched_user_name</P> </b><p style='color: red'>$student_user->User_type</p></div>
                                            <div class='a_online_user_main_div_online_green'></div>
                                            <span id='' hidden=''>user_name</span>
                                        </div>
                                    
                                </li>
        
                            </div>";
                    }

                }
            }
            else if ($key=="parent") {

                foreach ($users as $key => $parent_user) {
                    if ($parent_user->Parent_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$parent_user->Parent_first_name.' '.$parent_user->Parent_last_name.'"';
                        echo"<div id='all_online_user_list' style='margin-top: 10px;' onclick='hide_list_option($parent_user->Parent_account_id);' onmouseover='show_name_input_field($searched_user_name);'>
                                <li>
                                    
                                        <div class='a_online_user_main_div' style='height: 50px;width: 100%;'>
                                            <div class='a_online_user_main_div_image_div'>
                                             <img src='";echo base_url()."$parent_user->Profile_image_path' style='height: 40px; width: 40px; border-radius: 50%;'>
                                            </div>
                                            <div class='a_online_user_main_div_user_name_div'><b><P>$searched_user_name</P> </b><p style='color: red'>$parent_user->User_type</p></div>
                                            <div class='a_online_user_main_div_online_green'></div>
                                            <span id='' hidden=''>user_name</span>
                                        </div>
                                   
                                </li>
        
                            </div>";
                    }

                }
            }

        }



	}



	public function send_massage()
	{
		$receiver_id=$this->input->get('receiver_id');
		$this->load->library('encryption');

        $massage_detail=$this->encryption->encrypt($this->input->get('massage_detail'));//encrption of massage


		$this->load->driver('session');
		$user_type=$this->session->userdata('user_type');
		$sender_user_name=$this->session->userdata('user_name');
		
		if ($user_type=="Admin") {
			$this->load->model('Admin');
			$this->user=new Admin();

		
		}
		else if ($user_type=="Teacher") {
			$this->load->model('Teacher');
		 	$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
		}

		elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else
		{

		}

		// echo $receiver_id.$massage_detail.$sender_user_name;

		$save_success=$this->user->sand_massage($user_type,$sender_user_name,$receiver_id,$massage_detail);
        foreach ($save_success as $key => $users) {
            //echo $key;

            if ($key=="teacher") {

                foreach ($users as $key => $teacher_user) {
                    //echo $teacher_user->Teacher_first_name;
                    if ($teacher_user->Teacher_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$teacher_user->Teacher_first_name.' '.$teacher_user->Teacher_last_name.'"';
                        echo"<option onclick='hide_list_option($teacher_user->Teacher_account_id);' id='found_user_list_option' style='background-color:#87c8ed;' 
		 				     onmouseover='show_name_input_field($searched_user_name);'>
				             <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'>
				 
				               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
				                 <img src='"; echo base_url().$teacher_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
				               </div>
				                
				               
				               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$teacher_user->Teacher_first_name $teacher_user->Teacher_last_name($teacher_user->User_type)</p>
				                   
				               </div>
				             </div>
				            </option>";
                    }

                }
            }

            else if($key=="student")
            {

                foreach ($users as $key => $student_user) {
                    if ($student_user->Student_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$student_user->Student_first_name.' '.$student_user->Student_last_name.'"';
                        echo "<option onclick='hide_list_option($student_user->Student_account_id);' id='found_user_list_option' style='background-color:#87c8ed; '
		 				       onmouseover='show_name_input_field($searched_user_name);'>
				              <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
				 
				               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
				                 <img src='"; echo base_url().$student_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
				               </div>
				                
				               
				               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$student_user->Student_first_name $student_user->Student_last_name($student_user->User_type, Class :$student_user->Class_no)</p>
		                           
				               </div>
				             </div>
				            </option>";
                    }

                }
            }
            else if ($key=="parent") {

                foreach ($users as $key => $parent_user) {
                    if ($parent_user->Parent_username==$this->session->userdata('user_name')) //to remove own data in list
                    {

                    }
                    else
                    {
                        $searched_user_name='"'.$parent_user->Parent_first_name.' '.$parent_user->Parent_last_name.'"';
                        echo "<option onclick='hide_list_option($parent_user->Parent_account_id);' id='found_user_list_option' style='background-color:#87c8ed; ' onmouseover='show_name_input_field($searched_user_name);'>
			              <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
			 
			               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
			                 <img src='"; echo base_url().$parent_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
			               </div>
			                
			               
			               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$parent_user->Parent_first_name $parent_user->Parent_last_name($parent_user->User_type)</p>
	                           
			               </div>
			             </div>
			            </option>";
                    }

                }
            }

        }


    }











//to search user using username
	public function search_user()
	{
		$input_name=$this->input->get('input_name');
		$this->load->driver('session');
		$user_type=$this->session->userdata('user_type');
		
		if ($user_type=="Admin") {
			$this->load->model('Admin');
			$this->user=new Admin();

		
		}
		else if ($user_type=="Teacher") {
		    $this->load->model('Teacher');
			$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
		}

		elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else
		{

		}
        //echo $input_name;
		$all_searched_user=$this->user->search_user($input_name);//gets user list in arrary form
		//print_r($all_searched_user);

		 foreach ($all_searched_user as $key => $users) {
		 //echo $key;

		 	if ($key=="teacher") {
		 		
		 		foreach ($users as $key => $teacher_user) {
		 		//echo $teacher_user->Teacher_first_name;
		 			if ($teacher_user->Teacher_username==$this->session->userdata('user_name')) //to remove own data in list
		 			{
		 				
		 			}
		 			else
		 			{
		 				$searched_user_name='"'.$teacher_user->Teacher_first_name.' '.$teacher_user->Teacher_last_name.'"';
		 				echo"<option onclick='hide_list_option($teacher_user->Teacher_account_id);' id='found_user_list_option' style='background-color:#87c8ed;' 
		 				     onmouseover='show_name_input_field($searched_user_name);'>
				             <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'>
				 
				               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
				                 <img src='"; echo base_url().$teacher_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
				               </div>
				                
				               
				               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$teacher_user->Teacher_first_name $teacher_user->Teacher_last_name($teacher_user->User_type)</p>
				                   
				               </div>
				             </div>
				            </option>";
		 			}
		 	
		 	    }
			}
			
			else if($key=="student")
			{

                foreach ($users as $key => $student_user) {
                	if ($student_user->Student_username==$this->session->userdata('user_name')) //to remove own data in list
		 			{

		 			}
		 			else
		 			{
		 				$searched_user_name='"'.$student_user->Student_first_name.' '.$student_user->Student_last_name.'"';
		 				echo "<option onclick='hide_list_option($student_user->Student_account_id);' id='found_user_list_option' style='background-color:#87c8ed; '
		 				       onmouseover='show_name_input_field($searched_user_name);'>
				              <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
				 
				               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
				                 <img src='"; echo base_url().$student_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
				               </div>
				                
				               
				               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$student_user->Student_first_name $student_user->Student_last_name($student_user->User_type, Class :$student_user->Class_no)</p>
		                           
				               </div>
				             </div>
				            </option>";
		 			}

		 	    }
			}
			else if ($key=="parent") {
				
				foreach ($users as $key => $parent_user) {
					if ($parent_user->Parent_username==$this->session->userdata('user_name')) //to remove own data in list
		 			{

		 			}
		 			else
		 			{
		 				$searched_user_name='"'.$parent_user->Parent_first_name.' '.$parent_user->Parent_last_name.'"';
		 				echo "<option onclick='hide_list_option($parent_user->Parent_account_id);' id='found_user_list_option' style='background-color:#87c8ed; ' onmouseover='show_name_input_field($searched_user_name);'>
			              <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
			 
			               <div class='found_user_image_div' style='height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
			                 <img src='"; echo base_url().$parent_user->Profile_image_path; echo "' style='height: 40px; width: 40px; border-radius: 50%;'>
			               </div>
			                
			               
			               <div class='found_user_detail_div' style='float:left; height:40px;width: 70%; margin-left: 5px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;'><p style='color:black; font-size: 20px; margin-top: 8px;'>$parent_user->Parent_first_name $parent_user->Parent_last_name($parent_user->User_type)</p>
	                           
			               </div>
			             </div>
			            </option>";
		 			}
		 		  
		 	    }
			}
			
		}


	}



	public function get_massage()
	{
		$user_id=$this->input->get('selected_user_id');
	    //echo $user_id;
		$this->load->driver('session');
        $user_type=$this->session->userdata('user_type');
		$user_name=$this->session->userdata('user_name');
		
		if ($user_type=="Admin") {
		 	$this->load->model('Admin');
		 	$this->user=new Admin();

		
		 }
		else if ($user_type=="Teacher") {
			$this->load->model('Teacher');
		 	$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
		}

		elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else
		{

		}

       $reciever_data=$this->user->get_user_name($user_id);//TO GET USER NAME OF RECIEVER
        //echo $user_id.$user_name.$user_type;
	   $all_massages=$this->user->view_massage($user_id,$user_name,$user_type);

	   $profile_path='';
	   foreach ($reciever_data as $found_reciever_data)
       {
           $profile_path=$found_reciever_data->Profile_image_path;
       }


	   if (sizeof($all_massages)==0) {
	   	  echo "sand massage ";
	   }
	   else
	   {
	   	$this->load->library('encryption');



			   foreach ($all_massages as $key => $massage) {
			   	//echo $massage->Masssage_send_date;
			   	$decode_massage=$this->encryption->decrypt($massage->Massage_detail);
			   	if ($massage->Massage_receiver_id=="$user_id") {

			   		echo "<div id='massage_user_right_div' style='width: 100%; float: right; margin-top: 10px;'>

						   <div class='massage_image_div' style='height: 30px; width: 30px; background-color: green; float: right; border-radius: 50%;'>
						   <img src='"; echo base_url()."Profile_picture/".$user_name.".jpg"; echo "' style='height: 30px; width: 30px; border-radius: 50%;'></div>


						   <div class='massage_content_div' style='word-wrap: break-word; width: 80%; background-color: #adc3f1; margin- right: 30px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px; text-align: right; float: right;'><p style='margin- right:40px; margin-top:10px;'>$decode_massage</p></div>
						   <div style='width: 70%; float: right;'>
							   <div class='massage_user_name' style=' float:right;margin-right: 30px;'></div>
							   <div class='massage_date_div' style='float:right; margin-right: 10px;'>$massage->Masssage_send_date</div>
							   <div class='massage_seen_div' style=' float:right; margin-right: 10px;'>";
							   if ($massage->Massage_viewed=='n') {
							    	echo 'Unseen';
							    }
							    else
							    {
							    	echo 'seen';
							    } echo "</div>
						   </div>


						 </div>";
			   	}
			   	else
			   	{

			   		echo "<div id='massage_user_left_div' style='width: 100%; float: left; margin-top: 10px;'>

						   <div class='massage_image_div' style='height: 30px; width: 30px; background-color: green; float: left; border-radius: 50%;'>
						   <img src='";  echo base_url().$profile_path; echo "' style='height: 30px; width: 30px; border-radius: 50%;'></div>


						   <div class='massage_content_div' style='word-wrap: break-word; width: 80%;background-color: #5b8bec; margin-left: 30px; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px; text-align: left;'><p style='margin-left: 5px;'>$decode_massage</p></div>
						   <div style='width: 70%; float: left;'>
						   <div class='massage_user_name' style='margin-left: 30px; float: left;'></div>
						   <div class='massage_date_div' style='float: left; margin-left: 10px;'>$massage->Masssage_send_date</div>
						   <div class='massage_seen_div' style=' float: left; margin-left: 10px;'>";
							   if ($massage->Massage_viewed=='n') {
							    	//echo 'Unseen ';
							    }
							    else
							    {
							    	//echo 'seen';
							    } echo "</div>
						   </div>


						 </div>";
			   	}
			   }
	   }
		
	}











	public function view_event()
	{
		$year=$this->input->get('year');
		$month=$this->input->get('month');
		$day=$this->input->get('day');
		        echo "<div class='col-md-6'>";
		                                  echo '<div class="container-fluid">';
												echo  '<div class="table-responsive">';
     
												        function Calendar($day_get,$month_get,$year_get){
												               
												            $dates = time (); 
												            $day = $day_get;  
												            $month = $month_get;
												            $year = $year_get ;

												            $first_day = mktime(0,0,0,$month, 1, $year) ;

												            $title = date('F', $first_day) ;
												         
												            $day_of_week = date('D', $first_day) ; 
												            switch($day_of_week)
												            { 
												             case "Sun": $blank = 0; break; 
												             case "Mon": $blank = 1; break; 
												             case "Tue": $blank = 2; break; 
												             case "Wed": $blank = 3; break; 
												             case "Thu": $blank = 4; break; 
												             case "Fri": $blank = 5; break; 
												             case "Sat": $blank = 6; break; 
												             }

												             $days_in_month = cal_days_in_month(0, $month, $year) ;

												             echo '<table border=1 width=294 id="calander_table" class="table table-striped">';
												             echo '<tr id="top_year">
												                        <th colspan=2> 
												                             <button class="btn btn-primary active" id="calendar_privious_button" style="width:100%; margin-top: 20px; font-size: 110%;" onclick="get_calendar_in_previous();">prev</button>
												                        </th>

												                        <th colspan=3>'; 
												                        
												                        echo '  <select class="dropdown" id="year_select" style="height:30px; width:50%; margin-left:25%; text-align:center;" oninput="get_calendar_in_year_input();">
																				               <option value="" id="calendar_selected_year">';echo $year.'</option>';
																				               $date_year=1990;
																				               for ($i=0; $i <150; $i++) { 
													                                                echo "<option value=$date_year id='calendar_selected_year'>".($date_year+$i)."</option>";
													                                            }

													                                            
													                                           
																			echo '</select>';
																			echo '<p style="height:30px; width:50%; margin-left:25%; text-align: center;">'.$title.'</p><p hidden="" id="calendar_month_number">'.date('m', $first_day).'</p>';
																			echo '

												                             


												                        </th>

												                        <th colspan=2> 
												                             <button class="btn btn-primary active" id="calendar_next_button" style="width:100%; margin-top: 20px; font-size: 110%;" onclick="get_calendar_in_next();">next</button>
												                        </th>
												                    </tr>';
												             echo "<tr id='week_days'><td width=42>Sun</td><td width=42>Mon</td><td 
												                   width=42>Tues</td><td width=42>Wed</td><td width=42>Thu</td><td 
												                   width=42>Fri</td><td width=42>Sat</td></tr>";
												             echo "<tr>";
												            $day_count = 1;
												            
												            while ( $blank > 0 ) //for number of empty fields initially
												            { 
												               echo "<td id='dates_td'></td>";//to make empty fields 
												               $blank = $blank-1; 
												               $day_count++;
												             } 
												         
												             $day_number = 1;

												             while ( $day_number <= $days_in_month ) 
												             { 
												                // $todays= date("Y"). "-"  . date("m"). "-".$day_number;
												                 if ($day_number==date('d')) {
												                        echo "<td id='dates_td' Style='background-color:#ce5858;'><span id='calendar_day_number'>$day_number</span></br></td>";
												                  }
												                 else
												                  {
												                        echo "<td id='dates_td'>$day_number </td>";
												                  } 
												                  
												                  $day_number++; 
												                  $day_count++;

												                  if ($day_count > 7)
												                  {
												                    echo "</tr id='dates_td'><tr>";
												                    $day_count = 1;
												                  }
												              }


												             while ( $day_count >1 && $day_count <=7 ) //to making empty field at last
												             { 
												                echo "<td id='dates_td'> </td>"; 
												                 $day_count++; 
												              } 

												               echo "</tr id='dates_td'></table>"; 
												        }
												        // $dates = time () ; 
												        //  $day = date('d', $dates) ;  
												        //  $month =date('m', $dates) ;
												        //  $year = date('Y', $dates) ;

												        Calendar($day,$month,$year);
												        
												 
												 echo '</div>';
												    


												 echo '</div>';


                  echo "</div>";
         $this->load->driver('session');
		 $user_type=$this->session->userdata('user_type');
         if ($user_type=="Admin") {
		 	$this->load->model('Admin');
		 	$this->user=new Admin();

		
		 }
		else if ($user_type=="Teacher") {
			$this->load->model('Teacher');
			$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
		}

		elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else
		{

		}
         
          //for event view
          
		  if ($month<10) {
		  	$got_event_details=$this->user->view_event($year."-0".$month."-".$day);
		  }
		  else
		  {
		  	$got_event_details=$this->user->view_event($year."-".$month."-".$day);
		  }
		  
		  $number_of_event_data=sizeof($got_event_details);
   echo "<div class='col-md-6'>"; //main div for event view

		 echo '<div class="container-fluid" style="height: 180px; margin-top:0px;"> 
		        
			    <div class="col-md-12" style="height: 500px; background-color: #9287c3; border: 3px; overflow: scroll;">';
		           foreach ($got_event_details as $key => $event_data) 
		           {	  	
			     	echo '<div style="height: 180px; margin-bottom: 5px; width: 100%; border: 3px solid #0e1040;">
				          <div style="text-align: center; background-color: #12747f; height: 20px;"><b><p>DATE:  '; echo $event_data->event_date; echo '</p></b></div>
				          <div style="text-align: center; background-color: #1db6c8; height: 60px;"><b><p>EVENT TITLE</p></b><p>'; echo $event_data->event_title; echo '</p></div>
				          <div style="text-align: center; width: 100%; background-color: #6ee7f5; height: 93px;"><textarea readonly="readonly" style="text-align: center; width: 100%; height: 90px;  background-color: #6ee7f5;"> ';  echo $event_data->event_detail; echo ' </textarea></div>
				          </div>';
			        }
	      
		  echo '</div>
		        
		    </div>';
   echo "</div>";	    

		  // $this->load->model('Admin');
		  // $admin=new Admin();
		  // $admin->view_event($year."-".$month."-".$day);
	}



	public function get_calendar()
	{
		$year=$this->input->get('year');
		$month=$this->input->get('month');
		$day=$this->input->get('day');
		
		                                  echo '<div class="container-fluid">';
												echo  '<div class="table-responsive">';
     
												        function Calendar($day_get,$month_get,$year_get){
												               
												            $dates = time () ; 
												            $day = $day_get;  
												            $month = $month_get;
												            $year = $year_get ;

												            $first_day = mktime(0,0,0,$month, 1, $year) ;

												            $title = date('F', $first_day) ;
												         
												            $day_of_week = date('D', $first_day) ; 
												            switch($day_of_week)
												            { 
												             case "Sun": $blank = 0; break; 
												             case "Mon": $blank = 1; break; 
												             case "Tue": $blank = 2; break; 
												             case "Wed": $blank = 3; break; 
												             case "Thu": $blank = 4; break; 
												             case "Fri": $blank = 5; break; 
												             case "Sat": $blank = 6; break; 
												             }

												             $days_in_month = cal_days_in_month(0, $month, $year) ;

												             echo '<table border=1 width=294 id="calander_table" class="table table-striped">';
												             echo '<tr id="top_year">
												                        <th colspan=2> 
												                             <button class="btn btn-primary active" id="calendar_privious_button" style="width:100%; margin-top: 20px; font-size: 110%;" onclick="get_calendar_in_previous();">prev</button>
												                        </th>

												                        <th colspan=3>'; 
												                        
												                        echo '  <select class="dropdown" id="year_select" style="height:30px; width:50%; margin-left:25%; text-align:center;" oninput="get_calendar_in_year_input();">
																				               <option value="" id="calendar_selected_year">';echo $year.'</option>';
																				               $date_year=1990;
																				               for ($i=0; $i <150; $i++) { 
													                                                echo "<option value=$date_year id='calendar_selected_year'>".($date_year+$i)."</option>";
													                                            }

													                                            
													                                           
																			echo '</select>';
																			echo '<p style="height:30px; width:50%; margin-left:25%; text-align: center;">'.$title.'</p><p hidden="" id="calendar_month_number">'.date('m', $first_day).'</p>';
																			echo '

												                             


												                        </th>

												                        <th colspan=2> 
												                             <button class="btn btn-primary active" id="calendar_next_button" style="width:100%; margin-top: 20px; font-size: 110%;" onclick="get_calendar_in_next();">next</button>
												                        </th>
												                    </tr>';
												             echo "<tr id='week_days'><td width=42>Sun</td><td width=42>Mon</td><td 
												                   width=42>Tues</td><td width=42>Wed</td><td width=42>Thu</td><td 
												                   width=42>Fri</td><td width=42>Sat</td></tr>";
												             echo "<tr>";
												            $day_count = 1;
												            
												            while ( $blank > 0 ) //for number of empty fields initially
												            { 
												               echo "<td id='dates_td'></td>";//to make empty fields 
												               $blank = $blank-1; 
												               $day_count++;
												             } 
												         
												             $day_number = 1;

												             while ( $day_number <= $days_in_month ) 
												             { 
												                // $todays= date("Y"). "-"  . date("m"). "-".$day_number;
												                 if ($day_number==date('d')) {
												                        echo "<td id='dates_td' Style='background-color:#ce5858;'><span id='calendar_day_number'>$day_number</span></br></td>";
												                  }
												                 else
												                  {
												                        echo "<td id='dates_td'>$day_number </td>";
												                  } 
												                  
												                  $day_number++; 
												                  $day_count++;

												                  if ($day_count > 7)
												                  {
												                    echo "</tr id='dates_td'><tr>";
												                    $day_count = 1;
												                  }
												              }


												             while ( $day_count >1 && $day_count <=7 ) //to making empty field at last
												             { 
												                echo "<td id='dates_td'> </td>"; 
												                 $day_count++; 
												              } 

												               echo "</tr id='dates_td'></table>"; 
												        }
												        // $dates = time () ; 
												        //  $day = date('d', $dates) ;  
												        //  $month =date('m', $dates) ;
												        //  $year = date('Y', $dates) ;

												        Calendar($day,$month,$year);
												        
												 
												 echo '</div>';
												    


												 echo '</div>';


        
         
          //for event view
		 $this->load->driver('session');
		 $user_type=$this->session->userdata('user_type');
          if ($user_type=="Admin") {
		 	$this->load->model('Admin');
		 	$this->user=new Admin();

		
		 }
		else if ($user_type=="Teacher") {
			$this->load->model('Teacher');
			$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
		}

		elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
		}
		else
		{

		}
         
		  if ($month<10) {
		  	$got_event_details=$this->user->view_event($year."-0".$month."-".$day);
		  }
		  else
		  {
		  	$got_event_details=$this->user->view_event($year."-".$month."-".$day);
		  }
		  
		  $number_of_event_data=sizeof($got_event_details);
		  //echo $number_of_event_data;
		 
		 echo '<div class="container-fluid" style="height: 180px; margin-top:-9px;"> 
       
		   
		      <div class="col-md-4" style="height: 0px; background-color: #110885;"></div>
		      <div class="col-md-4" style="height: 180px; background-color: #9287c3; border: 3px; overflow: scroll;">';
		       foreach ($got_event_details as $key => $event_data) {
		  	
		echo '<div style="height: 180px; margin-bottom: 5px; width: 100%; border: 3px solid #0e1040;">
		       <div style="text-align: center; background-color: #12747f; height: 20px;"><b><p>DATE:  '; echo $event_data->event_date; echo '</p></b></div>
		       <div style="text-align: center; background-color: #1db6c8; height: 60px;"><b><p>EVENT TITLE</p></b><p>'; echo $event_data->event_title; echo '</p></div>
		       <div style="text-align: center; width: 100%; background-color: #6ee7f5; height: 93px;"><textarea readonly="readonly" style="text-align: center; width: 100%; height: 90px;  background-color: #6ee7f5;"> ';  echo $event_data->event_detail; echo ' </textarea></div>
		     </div>';
		  }
      
		 echo '

                  </div>
                  <div class="col-md-4" style="height: 0px; background-color: #110885;"></div>
                  </div>';

		  // $this->load->model('Admin');
		  // $admin=new Admin();
		  // $admin->view_event($year."-".$month."-".$day);
		 



	}


	public function log_out()
	{
		
	    //echo $user_id;
		$this->load->library('session');
		 $user_type=$this->session->userdata('user_type');
		$user_name=$this->session->userdata('user_name');
		
		if ($user_type=="Admin") {
		 	$this->load->model('Admin');
		 	$this->user=new Admin();

		
		 }
		else if ($user_type=="Teacher") {
			$this->load->model('Teacher');
		 	$this->user=new Teacher();
		}
		else if ($user_type=="Student") {
			$this->load->model('Student');
			$this->user=new Student();
		}

		elseif ($user_type=="Parent") {
			$this->load->model('Parents');
			$this->user=new Parents();
		}
		else
		{

		}


		$this->user->log_out($user_name,$user_type);
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_name');
		$this->session->sess_destroy();

		//$school=new School();
		redirect("School/login");
		//$school->log_in();

	}


	public function check_user_name_validation()
	{
		$user_name=$this->input->get('user_name');
		$user_type=$this->input->get('user_type');
		if ($user_name=="") {
			echo "Plase, user name field is required";
		}
		else
		{
			if ($user_type=="Teacher") {
				$this->load->model('Teacher');
				$this->user=new Teacher();
			}
			else if ($user_type=="Parent") {
				$this->load->model('Parents');
				$this->user=new Parents();
			}
			else if ($user_type=="Student") {
				$this->load->model('Student');
				$this->user=new Student();
			}
           
            $user_name_uniqueness=$this->user->check_user_name_uniqueness($user_name);
            if ($user_name_uniqueness==true) {
            	echo "";
            }
            else
            {
            	echo "This user name is alredy in use, please make another User name";
            }
		}
	}



	public function get_homework()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        $class_no=$this->input->get('class_no');
        $subject=$this->input->get('subject');
        if($class_no=="" || $subject=="")
        {
            echo "";
        }
        else{
            $this->load->model('Homework');
            $homework=new Homework();
            $homework->setHomeworkClassNo($class_no);
            $homework->setHomeworkSubject($subject);
            $get_homework_detail=$homework->view_homework();
            if (sizeof($get_homework_detail)==0)
            {
                echo "database_empty";
            }
            else{
                if ($user_type=='Teacher')
                {
                    foreach ($get_homework_detail as $homework_data)
                    {
                        $homework_id=$homework_data->Homework_id;
                        $class_no=$homework_data->Class_no;
                        $homework_detail='"'.$homework_data->Homework_detail.'(final date:'.$homework_data->Homework_submit_last_date.')"';
                        $subject_name='"'.$homework_data->Subject_name.'"';
                        echo "<div class='col-sm-12' style='margin-top: 10px; margin-top: 10px;'>
                        <div class='col-sm-4'></div>
                        <div class='col-sm-4' style='text-align: center; background-color: #afd9ee; font-size: 120%; border: solid black 2px;'>
                           <div class='col-sm-12' style='background-color: rosybrown'> 
                                <p><b>Class:</b></p>
                                <p>$homework_data->Class_no</p>
                           </div>
                            
                    
                            <p><b>Subject:</b></p>
                            <p>$homework_data->Subject_name</p>
                    
                            <p><b>homework Given Date:</b></p>
                            <p>$homework_data->added_date</p>
                    
                            <p><b>Final submission Date:</b></p>
                            <p>$homework_data->Homework_submit_last_date</p>
                    
             
                    
                            <p><b>Home Work Detail:</b></p>
                            <p>$homework_data->Homework_detail</p>
                    
                        </div>
                        <div class='col-sm-4'></div>
                    
                    
                       <div class='col-sm-12'>
                           <div class='col-sm-4'></div>
                            <div class='col-sm-4'>
                                <button class='btn btn-primary active' id='check_homework_button' style='margin-top: 5px; width: 100%;' onclick='get_student_list_homework_check($homework_id,$class_no,$subject_name,$homework_detail);'>Check Homework</button>
                                <button class='btn btn-primary active' id='delete_homework' style='width: 100%; margin-top: 5px;' onclick='delete_homework($homework_id,$homework_data->Class_no,$subject_name);'>Delete Homework</button>
                            </div>
                            <div class='col-sm-4'></div>
                       </div>
                        
                    </div>";
                    }
                }

                else{
                    foreach ($get_homework_detail as $homework_data)
                    {
                        $homework_id=$homework_data->Homework_id;
                        $class_no=$homework_data->Class_no;
                        $homework_detail='"'.$homework_data->Homework_detail.'(final date:'.$homework_data->Homework_submit_last_date.')"';
                        $subject_name='"'.$homework_data->Subject_name.'"';
                        echo "<div class='col-sm-12' style='margin-top: 10px;  margin-top: 10px;'>
                        <div class='col-sm-4'></div>
                        <div class='col-sm-4' style='text-align: center; background-color: #afd9ee; font-size: 120%; border: solid black 2px;'>
                            <div class='col-sm-12' style='background-color: rosybrown'> 
                                <p><b>Class:</b></p>
                                <p>$homework_data->Class_no</p>
                           </div>
                    
                            <p><b>Subject:</b></p>
                            <p>$homework_data->Subject_name</p>
                    
                            <p><b>homework Given Date:</b></p>
                            <p>$homework_data->added_date</p>
                    
                            <p><b>Final submission Date:</b></p>
                            <p>$homework_data->Homework_submit_last_date</p>
              
                    
                            <p><b>Home Work Detail:</b></p>
                            <p>$homework_data->Homework_detail</p>
                    
                        </div>
                        <div class='col-sm-4'></div>
                    </div>";
                    }
                }

            }

        }
    }




    public function get_class_student_list()
    {
        $class_no=$this->input->get('class_no');
       // echo "$class_no";
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        if ($user_type=="Admin") {
            $this->load->model('Admin');
            $this->user=new Admin();


        }
        else if ($user_type=="Teacher") {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();
        }

        elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else
        {

        }
        $student_list=$this->user->get_student_list($class_no);
        //echo print_r($student_list);
        echo "<option></option>";
        foreach ($student_list as $student_data)
        {
            $profile_picture=base_url().$student_data->Profile_image_path;
            echo " <option class='col-sm-12' style='background-color: #8ba8af' onclick='select_student_reg_account_id($student_data->Student_account_id);'>
                    
                    <div class='student_attendance_detail col-sm-4' id='student_attendance_detail'>
                                            <div id='found_user_show_div' style='width: 100%; float: left; margin-top: 10px; background-color: #cce2e8; border-radius: 5px 10px 5px 10px / 10px 5px 10px 5px;' >
                                 
                                               <div class='found_user_image_div' style='width='30%'; height: 40px; width: 40px; background-color: green; float: left; border-radius: 50%;'>
                                                 $student_data->Student_first_name $student_data->Student_last_name (Class: $class_no)
                                                 
                                               </div>                             
                    </div>
                   </option>";
        }

    }


    public function get_student_report_for_teacher() // to get sutdent id for teacher account get_student_report($account_id)
    {
        $reg_id=$this->input->get('reg_id');
        $account_id=$this->input->get('account_id');
        $class_no=$this->input->get('class_no');

        $this->get_student_report($account_id);
        //$this->user->get_student_report();
    }

    public function get_student_report_for_student() // to get student id for student account get_student_report($account_id)
    {
        //echo 'fasdfas';
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        if($user_type=='Student')
        {
            $this->load->model('Student');
            $student=new Student();
            $student->get_student_id($user_type,$user_name);
            $this->get_student_report($student->get_student_id($user_type,$user_name));
        }
    }

    public  function get_student_report_for_parent()
    {
             $student_id=$this->input->get('student_id');
             //echo ($student_id);
             $this->get_student_report($student_id);

    }


    public function get_student_report($account_id)
    {

        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        if ($user_type=="Admin") {
            $this->load->model('Admin');
            $this->user=new Admin();


        }
        else if ($user_type=="Teacher") {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();

        }

        elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else
        {

        }
        $student_report=$this->user->get_student_report($account_id);//
        //echo print_r($student_report);
        $total_attendance=$student_report['total_attendance'];
        $attendance_a=$student_report['attendance_a'];
        $attendance_p=$student_report['attendance_p'];
        $this_month_total_attendance=$student_report['this_month_total_attendance'];
        $this_month_attendance_a=$student_report['this_month_attendance_a'];
        $this_month_attendance_p=$student_report['this_month_attendance_p'];




        echo "
        <div class='col-sm-12' id='main_report_div' style='margin-top: -200px;'>
           <div class='col-sm-12'>
                  <div class='col-sm-12' style='font-size: 200%; text-align: center; background-color: lightcoral'>Attendance Report</div>
                  <div class='col-sm-6' style='background-color: #8ba8af'>
                    <p style='font-size: 150%; text-align: center;'><b >Overall Report</b></p>
                          <p style='font-size: 110%; text-align: center;'>Total Numbe of Day:$total_attendance</p>
                          <p style='font-size: 110%; text-align: center;'>Absent day:$attendance_a</p>
                          <p style='font-size: 110%; text-align: center;'>Present day:$attendance_p</p>
                          <p style='font-size: 110%; text-align: center;'></p>
                  </div>
                  <div class='col-sm-6' style='background-color: #8ba8af'>
                    <p style='font-size: 150%; text-align: center;'><b >Report this Month</b></p>
                          <p style='font-size: 110%; text-align: center;'>Total Numbe of Day:$this_month_total_attendance</p>
                          <p style='font-size: 110%; text-align: center;'>Absent day:$this_month_attendance_a</p>
                          <p style='font-size: 110%; text-align: center;'>Present day:$this_month_attendance_p</p>
                          <p style='font-size: 110%; text-align: center;'></p>
                  </div>
                  <div class='col-sm-4'></div>
                  <div class='col-sm-4'><button class='btn btn-primary active' id='attendance_chart_button' style='margin-top: 5px; width: 100%;' onclick='get_attendance_chart($total_attendance,$attendance_a)'>Get Report In Chart</button></div>
                  <div class='col-sm-4'></div>


                  <div class='col-sm-12' id='attendance_chart_div' style='height: 400px;' hidden=''></div>

            </div>";

          $total_remark=$student_report['total_remark'];
          $array_json = json_encode($student_report['subject']);
//        $math_total_homeworks=$student_report['math']['total_homeworks'];
//        $math_done_homework=$student_report['math']['done_homework'];
//        $math_done_not_homework=$student_report['math']['done_not_homework'];
//        $math_total_remark=$student_report['math']['total_remark'];
//        $math_remark_got=$student_report['math']['remark_got'];
//        $math_total_remark=$student_report['math']['total_remark'];
//        $math_remark_got=$student_report['math']['remark_got'];
//
//        $account_total_remark=$student_report['account']['total_remark'];
//        $account_remark_got=$student_report['account']['remark_got'];
//
//        $economic_total_remark=$student_report['economic']['total_remark'];
//        $economic_remark_got=$student_report['economic']['remark_got'];
//
//        $english_total_remark=$student_report['english']['total_remark'];
//        $english_remark_got=$student_report['english']['remark_got'];
//
//        $enviroment_total_remark=$student_report['enviroment']['total_remark'];
//        $enviroment_remark_got=$student_report['enviroment']['remark_got'];
//
//        $gk_total_remark=$student_report['gk']['total_remark'];
//        $gk_remark_got=$student_report['gk']['remark_got'];
//
//        $nepali_total_remark=$student_report['nepali']['total_remark'];
//        $nepali_remark_got=$student_report['nepali']['remark_got'];
//
//        $opt_math_total_remark=$student_report['opt_math']['total_remark'];
//        $opt_math_remark_got=$student_report['opt_math']['remark_got'];
//
//        $science_total_remark=$student_report['science']['total_remark'];
//        $science_remark_got=$student_report['science']['remark_got'];
//
//        $social_total_remark=$student_report['social']['total_remark'];
//       echo $social_remark_got=$student_report['social']['remark_got'];


        echo"
            <div class='col-sm-12' style='margin-top: 20px;'>
              <div class='col-sm-12' style='font-size: 200%; text-align: center; background-color: lightcoral'>Homework Report</div>
                <div class='col-sm-12' style='background-color: #8ba8af;'>";

                     foreach ($student_report['subject'] as $subjects)
                     {
                        echo " <div class='col-sm-4' style='background-color: #8ba8af'>
                                <p style='font-size: 150%; text-align: center;'><b >$subjects[sub_name]</b></p>

                                  <p style='font-size: 110%; text-align: center;'>total homework number:$subjects[total_homeworks]</p>
                                  <p style='font-size: 110%; text-align: center;'>total homework done:$subjects[done_homework]</p>
                                  <p style='font-size: 110%; text-align: center;'>total homework not done:$subjects[done_not_homework]</p>
                                  <p style='font-size: 110%; text-align: center;'></p>
                         </div>";
                     }

            echo"</div>
                 <div class='col-sm-4'></div>
                  <div class='col-sm-4'><button class='btn btn-primary active' id='attendance_chart_button' style='margin-top: 5px; width: 100%;' onclick='bar_remark_diagram($array_json,$total_remark);'>Get Report In Chart</button></div>
                  <div class='col-sm-4'></div>

                  <div class='col-sm-12' id='homework_done_chart_div' style='height: 400px;' hidden=''></div>
                  <div class='col-sm-12' id='homework_remark_chart_div' style='height: 400px;' hidden=''></div>
                  <div style='height: 40px; width:100%;'></div>
               </div>
        </div>
        ";
    }

    public function get_report_view_student_list()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        if ($user_type=="Admin") {
            $this->load->model('Admin');
            $this->user=new Admin();


        }
        else if ($user_type=="Teacher") {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();

        }

        elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else
        {

        }

        $got_list;
        if($user_type=="Teacher")
        {


        }
        else if($user_type=="Student")
        {
            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
        }
        else if($user_type=="Parent")
        {
            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
        }
        echo "<option></option>";
        foreach ($got_list as $student_record)
        {
            $all_attendance=$this->user->get_student_attendance($student_record->Student_registration_id,$student_record->Class_no);
            $array_json = json_encode($all_attendance);

            echo "<option onclick='get_student_report_for_parent($student_record->Student_account_id)'>
                 $student_record->Student_first_name $student_record->Student_last_name(Class no.:$student_record->Class_no)</option>";
        }


    }




    public function get_attendance_view_student_list()
    {
        $this->load->library('session');
        $user_type=$this->session->userdata('user_type');
        $user_name=$this->session->userdata('user_name');

        if ($user_type=="Admin") {
            $this->load->model('Admin');
            $this->user=new Admin();


        }
        else if ($user_type=="Teacher") {
            $this->load->model('Teacher');
            $this->user=new Teacher();
        }
        else if ($user_type=="Student") {
            $this->load->model('Student');
            $this->user=new Student();

        }

        elseif ($user_type=="Parent") {
            $this->load->model('Parents');
            $this->user=new Parents();
        }
        else
        {

        }

        $got_list;
        if($user_type=="Teacher")
        {


        }
        else if($user_type=="Student")
        {
            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
        }
        else if($user_type=="Parent")
        {
            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
        }
        echo "<option></option>";
        foreach ($got_list as $student_record)
        {
            $all_attendance=$this->user->get_student_attendance($student_record->Student_registration_id,$student_record->Class_no);
            $array_json = json_encode($all_attendance);

                 echo "<option onclick='get_attendance_record($array_json);'>
                 $student_record->Student_first_name $student_record->Student_last_name(Class no.:$student_record->Class_no)</option>";
        }


    }


//
//    public function get_attendance_view_student_list()
//    {
//        $this->load->library('session');
//        $user_type=$this->session->userdata('user_type');
//        $user_name=$this->session->userdata('user_name');
//
//        if ($user_type=="Admin") {
//            $this->load->model('Admin');
//            $this->user=new Admin();
//
//
//        }
//        else if ($user_type=="Teacher") {
//            $this->load->model('Teacher');
//            $this->user=new Teacher();
//        }
//        else if ($user_type=="Student") {
//            $this->load->model('Student');
//            $this->user=new Student();
//
//        }
//
//        elseif ($user_type=="Parent") {
//            $this->load->model('Parents');
//            $this->user=new Parents();
//        }
//        else
//        {
//
//        }
//
//        $got_list;
//        if($user_type=="Teacher")
//        {
//
//
//        }
//        else if($user_type=="Student")
//        {
//            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
//        }
//        else if($user_type=="Parent")
//        {
//            $got_list=$this->user->get_student_list_view_attendance($user_type,$user_name);
//        }
//        echo "<option></option>";
//        foreach ($got_list as $student_record)
//        {
//            $all_attendance=$this->user->get_student_attendance($student_record->Student_registration_id,$student_record->Class_no);
//            $array_json = json_encode($all_attendance);
//
//            echo "<option onclick='get_attendance_record($array_json);'>
//                 $student_record->Student_first_name $student_record->Student_last_name(Class no.:$student_record->Class_no)</option>";
//        }
//
//
//    }



}



?>
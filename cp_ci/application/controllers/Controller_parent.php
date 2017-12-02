<?php 

include('Controller_interface_user.php');
class controller_parent extends CI_Controller implements Controller_interface_user
{


    private $user;

    //@override
    public function view_profile()
    {

    }

    //@override
    public function sign_in()
    {

    }

    //@override
    public function view_student_report()
    {

    }

    //@override
    public function add_notification()
    {

    }


    public function cp_sign_up()
    {
        if (isset($_COOKIE['sign_up_cookie'])) //chack cookei is setted or not
        {

            if ($_COOKIE['sign_up_cookie']>5)//form one browser one 5 account can be created
            {
                //$error_user="*error log in please wait for some minute*";
                //$error_cookie=$_COOKIE['count_cookie'];
                $this->load->view('after_cookie_limit');
            }
            else
            {
                $count_cookie=$_COOKIE['sign_up_cookie']+1;

                setcookie('sign_up_cookie',$count_cookie);//cookies save

                $student_reg_id=$this->input->post('student_reg_id');
                $parent_fname=$this->input->post('parent_fname');
                $parent_sname=$this->input->post('parent_sname');
                $parent_phone_no=$this->input->post('parent_phone_no');
                $parent_user_name=$this->input->post('parent_user_name');
                $parent_password=$this->input->post('parent_password');


                if($this->upload_profile($parent_user_name)==true) //if upload is successful then
                {
                    $this->load->model('Parents');
                    $parent=new Parents();
                    $parent->setParentFirstName($parent_fname);
                    $parent->setParentLastName($parent_sname);
                    $parent->setParentPhoneNo($parent_phone_no);
                    $parent->setStudentRegistrationId($student_reg_id);
                    $parent->setUserName($parent_user_name);
                    $parent->setPassword($parent_password);

                    $parent->setProfileImagePath('/profile_picture/'.$parent_user_name.".jpg");
                    $sign_up_check=$parent->sign_up();
                    if ($sign_up_check==true) {
                        $data=array('user_name'=>$parent_user_name);
                        $this->load->view('after_sign_up',$data);
                        //echo 'fasd';
                    }
                    else
                    {
                        //echo "dfsa".$sign_up_check;
                        echo "not data inserted";
                    }

                }

            }
        }
        else
        {
            setcookie('sign_up_cookie',1,time()+900);
            $student_reg_id=$this->input->post('student_reg_id');
            $parent_fname=$this->input->post('parent_fname');
            $parent_sname=$this->input->post('parent_sname');
            $parent_phone_no=$this->input->post('parent_phone_no');
            $parent_user_name=$this->input->post('parent_user_name');
            $parent_password=$this->input->post('parent_password');

            if($this->upload_profile($parent_user_name)==true) //if upload is successful then
            {
                $this->load->model('Parents');
                $parent=new Parents();
                $parent->setParentFirstName($parent_fname);
                $parent->setParentLastName($parent_sname);
                $parent->setParentPhoneNo($parent_phone_no);
                $parent->setStudentRegistrationId($student_reg_id);
                $parent->setUserName($parent_user_name);
                $parent->setPassword($parent_password);

                $parent->setProfileImagePath('/profile_picture/'.$parent_user_name.".jpg");
                $sign_up_check=$parent->sign_up();
                if ($sign_up_check==true) {
                    $data=array('user_name'=>$parent_user_name);
                    $this->load->view('after_sign_up',$data);
                    //echo 'fasd';
                }
                else
                {
                    //echo "dfsa".$sign_up_check;
                    echo "not data inserted";
                }

            }
        }
    }

    public function upload_profile($parent_user_name)
    {
        if (isset($_FILES['parent_profile_pic']['name']))
        {



            //ini_set('upload_max_filesize','20M');
            $config['upload_path']     = './assets_file/profile_image/'; //image rakhni thau
            $config['allowed_types']   = 'gif|jpg|png|jpeg';
            $config['file_name']       =  $parent_user_name.".jpg";  //name of uploaded image
            $config['max_size']     = '10000';
            // $config['max_width'] = '600';
            // $config['max_height'] = '600';
            $this->load->library('upload',$config); //ci image class loading
            // $this->upload->do_upload('student_profile_pic');

            if ( ! $this->upload->do_upload('parent_profile_pic')) //if image is not uploaded
            {
                echo $this->upload->display_errors();
                //echo 'not uploaded';
                return false;
            }
            else
            {
                $data=$this->upload->data();
                $file_name=$data['file_name'];
                //echo "uploadd";
                $config['image_library']='gd2'; //loading config name to edit uploaded image file
                $config['source_image']='./assets_file/profile_image/'.$file_name;//getting file from folder to edit
                $config['create_thumb']= false;
                $config['maintain_ratio']=false;
                $config['quality']='60%';
                $config['width']=200;
                $config['height']=200;
                $config['new_image']='./profile_picture/'.$file_name;//folder to store new image
                $this->load->library('image_lib',$config);
                //$this->image_lib->resize();
                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                    return false;
                }
                else
                {
                    //echo 'fine';
                    return true;
                }


            }
        }
    }

    public function cp_view_homework_detail($value = '')
    {
        # code...
    }

    public function cp_leave_request($value = '')
    {
        # code...
    }

    public function cp_view_attendance($value = '')
    {
        # code...
    }

    public function view_homework($value = '')
    {
        # code...
    }

    public function check_already_account_have()
    {
        $reg_id=$this->input->get('registration_id');
        //echo $reg_id."dfas";
        if ($reg_id=="") {
            echo "Please enter student registration id provided by School";
        }
        else
        {
            if ($reg_id=="`")
            {
                echo "invalid id";
            }
            else {
                //echo "check";
                $this->load->Model('Parents');
                $this->Parents->setId($reg_id);
                $already_account_availability = $this->Parents->check_account_availability();
                //echo $already_account_availability;
                if ($already_account_availability == true) {
                    echo "The Account is already created for this Student Registration ID";
                } else {
                    echo "";
                }
            }

        }
    }
}


 ?>
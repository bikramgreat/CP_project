<?php
class testing_notification_class extends CI_Controller
{
    private $notification;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notification');
        $this->notification=new Notification();
        $this->load->library('unit_test');
    }

    public function test_notification1()
    {

        $this->notification->setNotification_title("title");
        $this->notification->setNotification_detail('notice detail');
        $this->notification->setNotification_created_date("2017-10-1");
        $this->notification->setNotification_to_usertype('teacher');

        $result=$this->notification->sand_notification();
        $exp_res = "Notice is successfully sent";
        $test_name = 'testing send notification funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_notification2()
    {

        $this->notification->setNotification_title("title");
        $this->notification->setNotification_detail('notice detail');
        $this->notification->setNotification_created_date("2017-10-1");
        $this->notification->setNotification_to_usertype('teacher');
        $this->notification->setNotification_provider(105);

        $result=$this->notification->sand_notification();
        $exp_res = "Notice is already sent";
        $test_name = 'testing send notification funtion 2';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_notification3()
    {
        $result=$this->notification->get_notice_number("Teacher","iswor");
        $exp_res = "7";
        $test_name = 'testing get notification number funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_notification4()
    {
        $result=$this->notification->get_notice_list("Teacher");
        $exp_res = "is_array";
        $test_name = 'testing get notification list funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }






}
?>
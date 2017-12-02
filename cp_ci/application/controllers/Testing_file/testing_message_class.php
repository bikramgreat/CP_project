<?php
class testing_message_class extends CI_Controller
{
    private $message;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Message');
        $this->message=new Message();
        $this->load->library('unit_test');
    }

    public function test_sand_massage1()
    {
        $this->message->setMassage_sender('1000');
        $this->message->setMassage_receiver('2000');
        $this->message->setMassage_body("hi my baby");
        $this->message->setMassage_send_date("2017-8-9");
        $this->load->model('Database');
        $result=$this->message->sand_massage();
        $exp_res = true;
        $test_name = 'testing send Message funtion 1';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_sand_massage2()
    {
        $this->message->setMassage_sender('11000');
        $this->message->setMassage_receiver('22000');
        $result="";
        foreach ($this->message->view_massage() as $result_array)
        {
            $result=$result_array->	Massage_detail;
        }
        $exp_res = "hi my baby";
        $test_name = 'testing view Message function ';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        //echo print_r($exp_res);
       // echo print_r($exp_res);
        echo $ans;
    }

    public function test_sand_massage3()
    {
        $this->load->model('Database');
        $result=$this->message->get_massage_numbers('Student','bikram');

        $exp_res = '1';
        $test_name = 'testing get Message number funtion 1';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }
}
?>
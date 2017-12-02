<?php
class testing_event_class extends CI_Controller
{
    private $event;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event');
        $this->event=new Event();
        $this->load->library('unit_test');
    }

    public function test_view_event()
    {
        $this->load->model('Event');
        $this->event=new Event();
        $result=$this->event->view_event();
        $exp_res = array();
        $test_name = 'testing view event';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_add_event1()
    {
        $this->load->model('Event');
        $this->event=new Event();
        $result=$this->event->add_event('fsdffafasdf',"2017-10-11","testing event for date 11");
        $exp_res = true;
        $test_name = 'testing add event funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_add_event2()
    {
        $this->load->model('Event');
        $this->event=new Event();
        $result=$this->event->add_event('fsdffafasdf',"2017-10-11","testing event for date 11");
        $exp_res = false;
        $test_name = 'testing add event funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_add_event3()
    {
        $this->load->model('Event');
        $this->event=new Event();
        $result=$this->event->add_event('fsdffafasdffsdf',"2017-10-11","testing event for date 11 third time");
        $exp_res = false;
        $test_name = 'testing add event funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }



}
?>
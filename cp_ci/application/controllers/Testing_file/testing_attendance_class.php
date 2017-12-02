<?php
class testing_attendance_class extends CI_Controller
{
    private $attendance;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance');
        $this->attendance=new Attendance();
        $this->load->library('unit_test');
    }

    function check_add_attendance1()
    {
       $this->attendance->setStudentRegId(1);
       $this->attendance->setDay(2);
       $this->attendance->setClassNo(10);
       $this->attendance->setStudentRegId(1000);
       $this->attendance->setAttendancePA('P');
       $this->attendance->setMonth(10);
       $this->attendance->setYear(2017);
        $result=$this->attendance->add_attendance();
        $exp_res = true;
        $test_name = 'testing add attendance funtion';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;

    }


    function check_add_attendance2()
    {
        $this->attendance->setStudentRegId(1);
        $this->attendance->setDay(2);
        $this->attendance->setClassNo(10);
        $this->attendance->setStudentRegId(1000);
        $this->attendance->setAttendancePA('P');
        $this->attendance->setMonth(10);
        $this->attendance->setYear(2017);
        $result=$this->attendance->add_attendance();
        $exp_res = false;
        $test_name = 'testing add attendance funtion second';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;

    }


}
?>
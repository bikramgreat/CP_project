<?php
class testing_teacher_class extends CI_Controller
{
    private $teacher;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Teacher');
        $this->teacher=new Teacher();
        $this->load->library('unit_test');
    }


    public function test_teacher1()
    {


        $result= $this->teacher->add_notification("title","notice detail","2017-6-6","student");
        $exp_res = "Notice is successfully sent";
        $test_name = 'test adding notification';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_teacher2()
    {


        $result= $this->teacher->save_homework(10,"math","home detail","2017-6-6","2017-6-2");
        $exp_res = true;
        $test_name = 'test adding homework';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_teacher3()
    {


        $result= $this->teacher->add_refrash_roll_no(10);
        $exp_res = "is_array";
        $test_name = 'test class of student list got';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }





}
?>
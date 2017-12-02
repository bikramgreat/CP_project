<?php
class testing_student_class extends CI_Controller
{
    private $student;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student');
        $this->student=new Student();
        $this->load->library('unit_test');
    }

    public function test_student1()
    {
        $this->student->setId("150000");
        $this->student->setUser_name("test_uname");
        $this->student->set_password("test_password");
        $this->student->setStudent_class_no(10);
        $this->student->setProfile_image_path('/profile_picture/'."test_profile".".jpg");
        $result=$this->student->sign_up();
        $exp_res = true;
        $test_name = 'testing sign up student';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_student2()
    {
        $this->student->setStudent_first_name('test');

         $this->student->setStudent_last_name('test');

        $this->student->setStudent_age(20);

        $this->student->setStudent_date_of_birth(2017-2-5);

        $this->student->setStudent_address('test_address');

        $result=$this->student->register_student();
        $exp_res = "Registered successfully";
        $test_name = 'testing registration of student';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_student3()
    {
        $this->student->setStudent_first_name('test');

        $this->student->setStudent_last_name('test');

        $this->student->setStudent_age(20);

        $this->student->setStudent_date_of_birth(2017-2-5);

        $this->student->setStudent_address('test_address');

        $result=$this->student->register_student();
        $exp_res = "Already Registered";
        $test_name = 'testing registration of student 2';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }



    public function test_student4()
    {
        $this->student->setId(150000);
        $result=$this->student->check_registration_availability();
        $exp_res = true;
        $test_name = 'testing registration availability of student';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_student5()
    {
        $this->student->setId(150000);
        $result=$this->student->check_account_availability();
        $exp_res = false;
        $test_name = 'testing account availability of student';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }




}
?>
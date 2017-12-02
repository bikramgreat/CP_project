<?php
class testing_admin_class extends CI_Controller
{
    private $admin;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin');
        $this->admin=new Admin();
        $this->load->library('unit_test');
    }

    public function test_admin()
    {
        $result=$this->admin->register_student("first name","last name",20,"2017-2-5","address");
        $exp_res = "Registered successfully";
        $test_name = 'testing student registration in admin calss';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;

    }


    public function test_admin2()
    {
        $result=$this->admin->sign_in("ram","ram1234","Admin");
        $exp_res = "password_true";
        $test_name = 'testing log in true';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }

    public function test_admin3()
    {
        $result=$this->admin->sign_in("ram2","ram1234","Admin");
        $exp_res = "username_false";
        $test_name = 'testing log in username false';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_admin4()
    {
        $result=$this->admin->sign_in("ram","ram12345","Admin");
        $exp_res = "password_false";
        $test_name = 'testing log in password false';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_admin5()
    {
        $result=$this->admin->sand_massage("Admin","ram","100","message detail");
        $exp_res = null;
        $test_name = 'testing message send';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }





}
?>
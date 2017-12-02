<?php
class testing_parent_class extends CI_Controller
{
    private $parents;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Parents');
        $this->parents=new parents();
        $this->load->library('unit_test');
    }

    public function test_parent1()
    {
        $this->parents->setParentFirstName('test_name');
        $this->parents->setParentLastName('test_lname');
        $this->parents->setParentPhoneNo('9843660474');
        $this->parents->setStudentRegistrationId(15000);
        $this->parents->setUserName('test_user_name');
        $this->parents->setPassword('test_password');
        $this->parents->setProfileImagePath('profile_picture/test.jpg');

        $this->parents->setProfileImagePath('profile_picture/test.jpg');
        $result=$this->parents->sign_up();
        $exp_res = true;
        $test_name = 'testing sign up student';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


    public function test_parent2()
    {
        $this->parents->setId(15000);
        $result=$this->parents->check_account_availability();
        $exp_res = true;
        $test_name = 'testing account availability of parent';
        $ans = $this->unit->run($result,$exp_res,$test_name);
        echo $ans;
    }


}
?>
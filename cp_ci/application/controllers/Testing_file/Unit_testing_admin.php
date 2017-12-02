<?php
/*this is a class for testing all the funtion of Admin.php(Admin)
 *
 * */
class Unit_testing_admin extends CI_Controller
{

    /**
     * Unit_testing_admin constructor.
     */
    private $admin;
    public function __construct()
    {
       $this->load->model('Admin');
       $this->admin=new Admin();
    }


}
?>
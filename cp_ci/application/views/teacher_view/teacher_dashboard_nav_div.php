<div class="container-fluid" style="height: 100px; background-color: #aec3f3;">


    <div class="col-md-2" style="background-color:#d4cff8;" id="dashbord_online_user_div">
        <div class="dropdown" style="margin-top: 5px;" onclick="add_massage_send_div_from_online();">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;" id="online_user_list_btn">ONLINE USER
                <span class="caret"></span></button>
            <ul class="dropdown-menu" style="width: 150%; height: 500px; overflow: scroll;">
                <div id="all_online_main_user_list_div">

                </div>




            </ul>
        </div>


        <!-- <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
          <ul class="dropdown-menu"></ul>
         </li>
        </ul> -->

    </div>






    <div class="col-md-2" style="background-color:green;" id="dashbord_main_nev_div_mid"></div>
    <div class="col-md-2" style="background-color:green;" id="dashbord_main_nev_div_mid"></div>
    <div class="col-md-2" style="background-color:green;" id="dashbord_main_nev_div_mid"></div>
    <div class="col-md-2" style="background-color:green;" id="dashbord_main_nev_div_mid"></div>


    <div class="col-md-2" style="background-color:#d4cff8;" id="dashbord_buttons_div">

        <div class="dropdown" style="margin-top: 5px;">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Activities
                <span class="caret"></span></button>
            <ul class="dropdown-menu" style="width: 100%;">
                <li ><button class="btn btn-primary active" id="calendar_button" style="width:100%; margin-top: 20px; font-size: 110%; ">Calender

                    </button><li/>

                <li><button class="btn btn-primary active" id="send_massage_button" style="width:100%; margin-top: 20px; font-size: 110%;">Send Massage</button><li/>
                <li><button class="btn btn-primary active" id="view_event_button" style="width:100%; margin-top: 20px; font-size: 110%;">View event</button><li/>
                <li><button class="btn btn-primary active" id="add_student_manage_button" style="width:100%; margin-top: 20px; font-size: 110%;">Student Management</button><li/>
                <li><button class="btn btn-primary active"  id="view_homework_button" style="width:100%; margin-top: 20px; font-size: 110%;">View Homework</button><li/>
                <li><button class="btn btn-primary active" id="send_notice_button" style="width:100%; margin-top: 20px; font-size: 110%;">Send Notice</button><li/>
                <li><button class="btn btn-primary active" id="add_homework_button" style="width:100%; margin-top: 20px; font-size: 110%;">Add Homework</button><li/>
                <li><button class="btn btn-primary active" id="get_report_form_button" style="width:100%; margin-top: 20px; font-size: 110%;">Student Report</button><li/>
                <li><a href="<?php echo base_url();?>User_controller/log_out"><button class="btn btn-primary active" id="log_out_button" style="width:100%; margin-top: 20px; font-size: 110%;">Log Out</button></a><li/>
            </ul>
        </div>

    </div>

</div>
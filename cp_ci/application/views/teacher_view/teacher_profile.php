<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_profile.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_massage_view.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_notice.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_file/bootstrap_file/css/bootstrap.min.css">
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/jquery/jqueryui.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets_file/java_script/get_calendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets_file/Ajax/all_ajax_files.js"></script>


    <script type="text/javascript" src="<?php echo base_url();?>assets_file/canvas/canvasjs.min.js"></script>

</head>
<body>


<form class="container" id="teacher_signup_form" style="background-color:#afc3f6; " method="post" action="<?php echo base_url()?>Controller_teacher/ct_sign_up" enctype="multipart/form-data">
    <div class="col-md-4"></div>
    <div  class="col-md-4" style="">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img style="height: 150px; width: 150px;" src="<?php echo base_url();?>profile_picture>
         </div>
         div class="col-md-4"></div>
        </div>


        <div class="form-horizontal"  >


            <div class="form-group">
                <label class="teacher_user_name">User Name:</label>
                <input type="text" required="" class="form-control" name="teacher_user_name" id="teacher_user_name" onfocus="check_registration_id();" oninput="check_user_name_validation('teacher_user_name')"> </input>
                <p id="user_name_error" class="error_p" style="color: red;"><?php $user_name_error;?></p>

            </div>

            <div class="form-group">
                <label class="teacher_password" >Password:</label>
                <input type="password" required="" class="form-control" name="teacher_password" id="teacher_password" oninput="password_strangth('teacher_password');" onfocus="check_already_account_have();"> </input>
                <p id="password_error" class="error_p"><?php $password_error;?></p>
            </div>


            <div class="form-group">
                <label class="teacher_con_password">Rewrite the Password:</label>
                <input type="password" required="" class="form-control" name="teacher_con_password" id="teacher_con_password" oninput="password_conformation_check('teacher_password','teacher_con_password');" onfocus="password_validation('teacher_password');"> </input>
                <p id="c_password_error" class="error_p" style="color: red;"><?php $c_password_error;?></p>

            </div>

            <div class="form-group">
                <label class="teacher_profile_pic">Select profile picture:</label>
                <input type="file" required="" class="form-control" name="teacher_profile_pic" id="teacher_profile_pic" oninput="Validation_file_type('teacher_profile_pic')" onmouseover="validation_con_password('teacher_con_password');"> </input>
                <p id="profile_pic_error" class="error_p" style="color: red;"><?php $profile_pic_error;?></p>
            </div>


            <!-- <div class="g-recaptcha " data-sitekey="6LdjUBoUAAAAAKRDNZJoapnGxGlxUCzGRq_wbViY" class="form-group" style="width: 100%; margin-left: -15px;"></div>
    		  <p id="captcha_error" class="error_p" style="color: red;"><?//php $captcha_error;?></p> -->


            <div class="form-group" onmouseover="check_already_account_have();password_conformation_check('teacher_password','teacher_con_password');enable_sign_up();">

                <button type="submit" class="btn btn-primary active" style="width:100%; margin-top: 10px;" value="upload" disabled="" id="submit_button" >Sign Up</button>

            </div>


            <div class="form-group">

                <a href=" <?php echo base_url();?>school/login"><button style="width:80%; margin-left: 10%; margin-top: 10px;">Cancle</button></a>

            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</form>

</body>
</html>
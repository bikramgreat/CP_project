<form class="container" id="parent_signup_form" style="background-color:#afc3f6; " method="post" action="<?php echo base_url()?>Controller_parent/cp_sign_up" enctype="multipart/form-data">
          <div class="col-md-4"></div>
         <div  class="col-md-4" style="">
               <b><p style="text-align: center; color: red; font-size: 150%;">SIGN UP</p></b>
              <div class="form-horizontal"  >
                <div class="form-group">
                <label  for="student_reg_id">Student Registration ID:</label>
                <input type="text" class="form-control" id="student_reg_id" required="" name="student_reg_id" title="Student Registration Id provided by school">
                <p id="id_error" style="color: red;"><?php $id_error;?></p>
                
              </div>

              <div class="form-group">
                  <label class="parent_fname">First Name:</label>
                  <input type="text" required="" class="form-control" name="parent_fname" id="parent_fname" onfocus="check_already_account_have_parent();"> </input>
                  <p id="fname_error" class="error_p"></p>

              </div>

              <div class="form-group">
                  <label class="parent_sname">Second Name:</label>
                  <input type="text" required="" class="form-control" name="parent_sname" id="parent_sname" onfocus="check_already_account_have_parent();"> </input>
                  <p id="sname_error" class="error_p"></p>

              </div>

              <div class="form-group">
                  <label class="parent_phone_no">Phone no.:</label>
                  <input type="text" required="" class="form-control" name="parent_phone_no" id="parent_phone_no" onfocus="check_already_account_have_parent();"> </input>
                  <p id="phone_no_error" class="error_p"></p>

              </div>

              <div class="form-group">
                  <label class="parent_user_name">User Name:</label>
                  <input type="text" required="" class="form-control" name="parent_user_name" id="parent_user_name" onfocus="check_registration_id_student();check_phone_no_validation();" oninput="check_user_name_validation('parent_user_name')"> </input>
                  <p id="user_name_error" class="error_p" style="color: red;"><?php $user_name_error;?></p>

              </div>

              <div class="form-group">
                  <label class="parent_password">Password:</label>
                  <input type="password" required="" class="form-control" name="parent_password" id="parent_password" oninput="password_strangth('parent_password');" onfocus="check_already_account_have_parent();"> </input>
                  <p id="password_error" class="error_p"><?php $password_error;?></p>

              </div>


              <div class="form-group">
                  <label class="parent_con_password">Rewrite the Password:</label>
                  <input type="password" required="" class="form-control" name="parent_con_password" id="parent_con_password" oninput="password_conformation_check('parent_password','parent_con_password');" onfocus="password_validation('parent_password');"> </input>
                  <p id="c_password_error" class="error_p" style="color: red;"><?php $c_password_error;?></p>

              </div>

              
              
              <div class="form-group">
                  <label class="parent_profile_pic">Select profile picture:</label>
                  <input type="file" required="" class="form-control" name="parent_profile_pic" id="parent_profile_pic" oninput="Validation_file_type('parent_profile_pic')" onmouseover="validation_con_password('parent_con_password');"> </input>
                  <p id="profile_pic_error" class="error_p" style="color: red;"><?php $profile_pic_error;?></p>
              </div>

              
<!--              <div class="g-recaptcha " data-sitekey="6LdjUBoUAAAAAKRDNZJoapnGxGlxUCzGRq_wbViY" class="form-group" style="width: 100%; margin-left: -15px;"></div>
              <p id="captcha_error"><?php// $captcha_error;?></p> -->
              

              <div class="form-group" onmouseover ="check_already_account_have_parent();password_conformation_check('parent_password','parent_con_password');enable_sign_up();">
                
                  <button type="submit" class="btn btn-primary active" style="width:100%; margin-top: 10px;" value="upload" disabled="" id="submit_button">Sign Up</button>
        
              </div>
<!-- 
              <div class="form-group"> 
                
                  <a href=" <?php //echo base_url();?>school/login"><button style="width:80%; margin-left: 10%; margin-top: 10px;">Cancle</button></a>
        
              </div> -->
              <div class="form-group"> 
                
                  <a href=" <?php echo base_url();?>school/login" style="text-align: center;">Cancle</a>
        
              </div>
            </div>
        </div>
        <div class="col-md-4"></div>

    </form>
    
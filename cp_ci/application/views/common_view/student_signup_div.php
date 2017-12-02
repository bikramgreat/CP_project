<form class="container" id="student_signup_form" style="background-color:#afc3f6; " method="post" action="<?php echo base_url()?>Controller_student/cs_sign_up" enctype="multipart/form-data">
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
                  <label class="student_user_name">User Name:</label>
                  <input type="text" required="" class="form-control" name="student_user_name" id="student_user_name" onfocus="check_registration_id_student();" oninput="check_user_name_validation('student_user_name')"> </input>
                  <p id="user_name_error" class="error_p" style="color: red;"><?php $user_name_error;?></p>

              </div>

              <div class="form-group">
                  <label class="student_password">Password:</label>
                  <input type="password" required="" class="form-control" name="student_password" id="student_password" oninput="password_strangth('student_password');" onfocus="check_already_account_have_student();"> </input>
                  <p id="password_error" class="error_p"><?php $password_error;?></p>

              </div>


              <div class="form-group">
                  <label class="student_con_password">Rewrite the Password:</label>
                  <input type="password" required="" class="form-control" name="student_con_password" id="student_con_password" oninput="password_conformation_check('student_password','student_con_password');" onfocus="password_validation('student_password');"> </input>
                  <p id="c_password_error" class="error_p" style="color: red;"><?php $c_password_error;?></p>

              </div>

              <div class="form-group">
                  <label class="student_class_no">Class number:</label>
                  <input type="text" required="" class="form-control" name="student_class_no" id="student_class_no" oninput="check_class_no_validation()" required=""> </input>
                  <p id="class_no_error" class="error_p" style="color: red;"><?php $user_name_error;?></p>

              </div>
              
              <div class="form-group">
                  <label class="student_profile_pic">Select profile picture:</label>
                  <input type="file" required="" class="form-control" name="student_profile_pic" id="student_profile_pic" oninput="Validation_file_type('student_profile_pic')" onmouseover="validation_con_password('student_con_password');"> </input>
                  <p id="profile_pic_error" class="error_p" style="color: red;"><?php $profile_pic_error;?></p>
              </div>

              
<!--     		      <div class="g-recaptcha " data-sitekey="6LdjUBoUAAAAAKRDNZJoapnGxGlxUCzGRq_wbViY" class="form-group" style="width: 100%; margin-left: -15px;"></div>
              <p id="captcha_error"><?php// $captcha_error;?></p> -->
    		    	

              <div class="form-group" onmouseover ="check_already_account_have_student();password_conformation_check('student_password','student_con_password');enable_sign_up();"> 
                
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
    
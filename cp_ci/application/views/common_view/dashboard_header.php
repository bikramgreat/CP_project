
	<div class="container-fluid" id="profile_header" >
		  <div class="col-md-2" style="background: #aec3f3" id="profile_image">
		  	<img class="img-circle" src="<?php echo base_url();?>assets_file/image_file/logo2.png">
		  </div>
		  <div id="profile_header_notice" class="col-md-2" style="background: #aec3f3">
		  	<div class="massage_notification_div" id="notice_text_div"><a style="text-decoration: none;"><b>NOTIFICATION</b></a></div>
		  	<div class="notification_no_div" id="notice_number" ></div>
		  </div>
		  <div id="profile_header_massage" class="col-md-2" style="background: #aec3f3">
		  	<div class="massage_notification_div" id="massage_text_div"><a style="text-decoration: none;"><b>MASSAGE</b></a></div>
		  	<div class="massage_no_div" id="massage_number" ></div>
		  </div>
		  <div id="profile_header_empty" class="col-md-2" style="background: #aec3f3">
              <div style="margin-top: 30px; text-align: center; font-size: 200%;">
                  <a href="<?php echo base_url();?>school/load_help" target="_blank" style="text-decoration: none;">HELP</a>
              </div>

          </div>
		  <div id="profile_header_welcome" class="col-md-2" style="background: #aec3f3">
		  	<p style="font-size: 110%;" id="profile_header_welcome_p1">Hellow <b style="font-size: 150%;"><?php echo $user_name;?> </b></p>
		  	<p style="font-size: 110%;" id="profile_header_welcome_p2">Date:<b><?php echo date("Y/m/d");?> </b></p>
		  </div>
		  <div class="col-md-2" style="background: #aec3f3">
		  	<img class="img-circle" src="<?php echo base_url();?>profile_picture/<?php echo $user_name.'.jpg'?>">
		  </div>
	</div>

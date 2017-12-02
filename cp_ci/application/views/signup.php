
<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_signin.css">

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo base_url();?>assets_file/bootstrap_file/css/bootstrap.min.css">
	  <script src='https://www.google.com/recaptcha/api.js'></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.min.js"></script>
	  <script src="<?php echo base_url();?>assets_file/java_script/sign_up.js"></script>

	  <style>
	        #signup_top_div
		     {
		     	margin-top: 5px;
		     	height: 240px;
		     	width: 50%;
		     	background-color: #aec3f3;
		     	border-radius: 10%;
		     }

		     #signin_logo_div
		     {
		     	background: #aec3f; 
		     	height:150px;
		     }

		     #signin_image_logo
             {
             	height: 150px;
             	width: 100%;
             	border-radius: 10%;

             }
             .error_p
             {
             	color: red;
             }

             

		     
		     
		  
		     

		  @media (max-width: 600px)
		  {
		     #signup_top_div
		     {
		     	margin-top: 5px;
		     	height: 300px;
		     	width: 80%;
		     	background-color: #aec3f3;
		     	border-radius: 10%;
		     }


		     #signin_logo_div
		     {
		     	background: #aec3f; 
		     	height:180px;
		     }


             #signin_image_logo
             {
             	height: 180px;
             }

             

		     
		  }
	  </style>
	  <script type="text/javascript">
	  	function show_div_on_select_user() {
	  		//alert ('dfhsa');
	  		var user_type=document.getElementById('signup_user_type').value;
	  		//alert(user_type);
	  		if (user_type=="Teacher") {
                // alert(user_type);
                 // if ($('#teacher_signup_form').css('display')=='none') {
                 // 	alert(user_type);
                 // 	$('#teacher_signup_form').css('display','block');
                 // 	$(this).load("file.php");
                 // 	$('#parent_signup_form').css('display','none');
                 // 	$('#student_signup_form').css('display','none');
                 // 	$('#welcome_div').css('display','none');

                 // }

                  $("#welcome_div").load("<?php echo base_url();?>School/load_teacher_sign_up"); 
                  //$('#teacher_signup_form').css('display','block');
                 
	  		}

	  		else if (user_type=="Student") {
                 // if ($('#student_signup_form').css('display')=='none') {
                 // 	$('#teacher_signup_form').css('display','none');
                 // 	$('#parent_signup_form').css('display','none');
                 // 	$('#student_signup_form').css('display','block');
                 // 	$('#welcome_div').css('display','none');

                 // }
                 $("#welcome_div").load("<?php echo base_url();?>School/load_student_sign_up"); 
	  		}

	  		else if(user_type=="Parent"){
                 //   if ($('#parent_signup_form').css('display')=='none') {
                 // 	$('#teacher_signup_form').css('display','none');
                 // 	$('#parent_signup_form').css('display','block');
                 // 	$('#student_signup_form').css('display','none');
                 // 	$('#welcome_div').css('display','none');

                 // } 
                 $("#welcome_div").load("<?php echo base_url();?>School/load_parent_sign_up"); 
	  		}
	  		else
	  		{
	  			if ($('#welcome_div').css('display')=='none') {
                 	$('#teacher_signup_form').css('display','none');
                 	$('#parent_signup_form').css('display','none');
                 	$('#student_signup_form').css('display','none');
                 	$('#welcome_div').css('display','block');
                 }
	  		}


	  	}

	  	function check_registration_id() {
	  		
                   
                   var registration_id=document.getElementById('teacher_reg_id').value;                   

                     
                   $.ajax({
                    url:"<?php echo base_url();?>Controller_teacher/check_validation_reg_id",
                    mathod:"post",
                    data:{registration_id:registration_id},
                    success:function (massage) {
                        //alert(calender);
                    document.getElementById("id_error").innerHTML=massage;
                    }
                   });

                   
	  	}


	  	function check_registration_id_student() {
	  		
                   //alert ('kjsdfh');
                   var registration_id=document.getElementById('student_reg_id').value;                   

                    //alert (registration_id);
                   $.ajax({
                    url:"<?php echo base_url();?>Controller_student/check_validation_reg_id",
                    mathod:"post",
                    data:{registration_id:registration_id},
                    success:function (massage) {
                        //alert(calender);
                        //alert(massage);
                    document.getElementById("id_error").innerHTML=massage;
                    }
                   });

                   
	  	}

	  	function check_already_account_have() {
	  		
                   
                    var registration_id=document.getElementById('teacher_reg_id').value;                   
                   //  var error_id=document.getElementById('id_error').innerHTML;
                     
                   $.ajax({
                    url:"<?php echo base_url();?>Controller_teacher/check_already_account_have",
                    mathod:"post",
                    data:{registration_id:registration_id},
                    success:function (massage) {
                        //alert(calender);

                        document.getElementById("id_error").innerHTML=massage;

                    }
                   });
	  	}

	  	function check_already_account_have_student() {
	  		var registration_id=document.getElementById('student_reg_id').value;                   
                   //  var error_id=document.getElementById('id_error').innerHTML;
                     
                   $.ajax({
                    url:"<?php echo base_url();?>Controller_student/check_already_account_have",
                    mathod:"post",
                    data:{registration_id:registration_id},
                    success:function (massage) {
                        //alert(calender);

                        document.getElementById("id_error").innerHTML=massage;

                    }
                   });
	  	}


	  	function check_already_account_have_parent() {
            var registration_id=document.getElementById('student_reg_id').value;
            //  var error_id=document.getElementById('id_error').innerHTML;

            $.ajax({
                url:"<?php echo base_url();?>Controller_parent/check_already_account_have",
                mathod:"post",
                data:{registration_id:registration_id},
                success:function (massage) {
                    //alert(calender);

                        document.getElementById("id_error").innerHTML=massage;

                }
            });
        }
        
        
        
        
        function check_phone_no_validation() {
            var phone_no=document.getElementById('parent_phone_no').value;
            var cont_phone_no=phone_no.length;
            if(/[\d]/.test(phone_no))
            {
                if(cont_phone_no==10||cont_phone_no==7)
                {
                    document.getElementById('phone_no_error').innerHTML="";
                }
                else
                {
                    document.getElementById('phone_no_error').innerHTML="Invalid phone number";
                }
            }
            else
            {
                document.getElementById('phone_no_error').innerHTML="Phone number is not valid";
            }
        }







	  	function check_user_name_validation(user_user_name) {
		  		var user_name=document.getElementById(user_user_name).value;
		  		var user_type=document.getElementById('signup_user_type').value;                

	                  //alert (user_name);   
	                   $.ajax({
	                    url:"<?php echo base_url();?>User_controller/check_user_name_validation",
	                    mathod:"post",
	                    data:{user_name:user_name,user_type:user_type},
	                    success:function (massage) {
	                        //alert(calender);
	                    document.getElementById("user_name_error").innerHTML=massage;
	                    }
	                   });
		}

        function password_strangth(user_password)
		{

			var special_char='!@#$%^&*()_+{}[~]|><~`';
			var score=0;
			var password=document.getElementById(user_password).value;
			var number_char=0;
			var number_alpha=0;
			var number_lager_alpha=0;
			var number_numaric=0;
            //alert (password);
			

			for (var i = 0; i<password.length; i++) 
			{
				//alert (password.charAt(i));


				    if (special_char.indexOf(password.charAt(i))>-1)
					{
		               number_char=number_char+1;
					}



					if (/[a-z]/.test(password.charAt(i)))
					 {
					 	//alert (password.charAt(i));
					 	number_alpha=number_alpha+1;
					 }

					 if (/[A-Z]/.test(password.charAt(i)))
					{
		               number_lager_alpha=number_lager_alpha+1;
					}

					if (/[\d]/.test(password.charAt(i)))
					{
		               number_numaric=number_numaric+1;
					}

					
				
			}

			if (number_char>2) {
				score=score+1.5;
			}

			if (number_alpha>3) {
				score=score+1.5;
			}

			// // if (/[a-z]/.test(password))
			//  // {
			//  // 	score=score+1;
			//  // }



			if (number_lager_alpha>1) {
                   score=score+0.5;
			}
		     
			 
			//  // if (/[A-Z]/.test(password))
			//  //  {
			//  //  	score=score+1;
			//  //  }

           

			if (number_numaric>0) {
                   score=score+0.5;
			}



			//   // if (/[\d]/.test(password))
			//   // {
			//   // 	score=score+1;
			//   // }
		      

		      
			 

			  if (password.length >= 8) 
			  {
			  	 score=score+1;
			  }

			 //alert(score);
             
		      
			  if (score >=4)
			  {
			  	//alert ('vary str');
			  	$('#password_error').css('color','#61050c');
			  	document.getElementById('password_error').innerHTML="*vary strong password*";//score+"*vary strong*";
			  }
			  else if(score<4,score>=3.5)
			  {
			  	//alert ('strong');
			  	$('#password_error').css('color','#831f26');
		         document.getElementById('password_error').innerHTML="*strong password*";//score+"*strong*";
			  }
			  else if(score<3.5,score>=2.5)
			  {
			  	$('#password_error').css('color','#ac3941');
		         document.getElementById('password_error').innerHTML="*mediam password*";//score+"*mediam*";
			  }

			  else if(score<2.5&&score>=1.5)
			  {
			  	$('#password_error').css('color','#c1565d');
			  	document.getElementById('password_error').innerHTML="*weak password*";//score+"*weak*";
			  }

			  else if(1.5>score)
			  {
			  	$('#password_error').css('color','#ec848c');
			  	document.getElementById('password_error').innerHTML="*vary weak password*";//score+"*vary weak*";

			  }

			  if (password=="") {
				document.getElementById('password_error').innerHTML="";
			}
		}

		function password_validation(user_password) {
			var password=document.getElementById(user_password).value;
			if (password.length<5) 
			  {
			  	 document.getElementById('password_error').innerHTML="Please, Password Length should be more than 4 character";
			  }
			  else
			  {
			  	document.getElementById('password_error').innerHTML="";
			  }
		}


		function password_conformation_check(user_password,user_con_password) {
			var password=document.getElementById(user_password).value;
			if (password=="") {
				document.getElementById('password_error').innerHTML="Please enter password for your account";
			}
			else
			{

				var c_password=document.getElementById(user_con_password).value;
				if (c_password==password) {
					$('#c_password_error').css('color','green');
			  	    document.getElementById('c_password_error').innerHTML="Matched";//score+"*vary strong*";
				}
				else
				{
					$('#c_password_error').css('color','red');
			  	    document.getElementById('c_password_error').innerHTML="not Matched";//score+"*vary strong*";
				}
			}

			if (c_password=="") {
				document.getElementById('c_password_error').innerHTML="";
			}
		}

		function validation_con_password(user_con_password)
		{
			var con_password=document.getElementById(user_con_password).value;
			if (con_password=="") {
				document.getElementById('c_password_error').innerHTML="Please, conform the password";
			}
			else
			{
				document.getElementById('c_password_error').innerHTML="";
			}
		}

		function Validation_file_type(user_profile_pic) {
			//alert ('fasdh');
			var image_file=document.getElementById(user_profile_pic);
			//var fileInput = document.getElementById('upload');   
            var filename = image_file.files[0].name;
            var width = image_file.clientWidth;
            var height = image_file.clientHeight;
            var img=image_file.files[0].size;
            var imgsize=img/1024;
           // alert (filename);
            var extension=filename.split('.').pop();
           // alert (extension);
            if (extension=="jpg"||extension=="png"||extension=="jpeg"||extension=="JPEG"||extension=="PNG"||extension=="JPG"||extension=="gif"||extension=="GIF") 
            {
            	if (imgsize>5000) {
            		document.getElementById('profile_pic_error').innerHTML='Please upload image file which have file size less than 5mv';
            	}
            	else
            	{
            	    document.getElementById('profile_pic_error').innerHTML="";
                }
            }
            else
            {
            	//alert (extension);
            	document.getElementById('profile_pic_error').innerHTML="Please Upload only a image file";
            	
            }


		}


		


		function check_class_no_validation() {
			var class_no=document.getElementById('student_class_no').value;
			//alert (class_no);
			if (/[\d]/.test(class_no)) {
				//alert ('number');
                if (class_no>10||class_no<0) {
                    document.getElementById('submit_button').disabled=ture;
                    document.getElementById('class_no_error').innerHTML="Not valid class number";
                }
                else
                {
                	document.getElementById('class_no_error').innerHTML="";
                    document.getElementById('submit_button').disabled=false;
                }
			}
			else
			{
				//alert ('nor number');
				document.getElementById('class_no_error').innerHTML="Please, class number must be number";
                document.getElementById('submit_button').disabled=true;
			}
		}


		function enable_sign_up() {
            //alert ('lksadjf');
			var error_id=document.getElementById('id_error').innerHTML;
			var error_user_name=document.getElementById('user_name_error').innerHTML;
			var error_password=document.getElementById('password_error').innerHTML;
			var error_con_password=document.getElementById('c_password_error').innerHTML;
			var error_image_file=document.getElementById('profile_pic_error').innerHTML;

              //alert('a:'+error_con_password);
			if (error_con_password==""||error_con_password=="Matched")
			{
                //alert ('lksadjf');
				if (error_id==""&&error_user_name==""&&error_password==""&&error_image_file=="") {
                    document.getElementById('submit_button').disabled=false;
			     }
			     else
			     {
			     	alert("Please fill all the field properly");
                    document.getElementById('submit_button').disabled=true;
			     }
			}
			else
			{
                 //alert("Please fill all the field properly");
                 document.getElementById('submit_button').disabled=true;
			}
		}









	  </script>

</head>
<body style="background-color: #a29dd8">
  <div class="container-fluid" id="signup_top_div">
		<div class="row">
		  <div class="col-md-4" style="background-color: #aec3f3;"></div>
		  <div class="col-md-4" style="" id="signin_logo_div">
		    <img id="signin_image_logo" src="<?php echo base_url();?>assets_file/image_file/logo3.png" >
		  </div>
		  <div class="col-md-4" style=" background-color: #aec3f3;"></div>
		</div>

		<div class="form-group" style="text-align: center;">
		  <label for="signup_user_type" >Select User Type To Sign Up</label>
		  <select class="form-control" id="signup_user_type" style="width: 60%; margin-left: 20%; text-align: center;" oninput="show_div_on_select_user();">
		    <option></option>
		    <option>Teacher</option>
		    <option>Student</option>
		    <option>Parent</option>
		  </select>
		</div> 
   </div>


   <div id="signup_main_div">
      <div id='welcome_div' style="text-align: center;"> <p style="font-size: 400%; margin-top: 100px;">WELCOME</p></div>
      <?php //include_once ('common_view/teacher_signup_div.php');?>
      <?php //include_once ('common_view/Student_signup_div.php');?>
      <?php //include_once ('common_view/Parent_signup_div.php');?>
   </div>
</body>
</html>
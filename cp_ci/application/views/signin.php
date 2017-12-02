
<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_signin.css">

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo base_url();?>assets_file/bootstrap_file/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.min.js"></script>
	  <style>
	        #signin_main_div
		     {
		     	margin-top: 50px;
		     	height: 480px;
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

             #signin_form
             {
             	margin-top: 15px; 
             	background-color: #d4cff8;
                border-radius: 5%;
             }

		     .form-group
		     {
		     	text-align: center;
		     }
		     .form-group label
		     {
                font-size: 150%;
		     }

		     .form-group input
		     {
                text-align: center;
                width: 80%;
                margin-left: 10%;
		     }
             
             .form-group select
             {
             	text-align: center;
                width: 20%;
                margin-left: 40%;
             }


		     .checkbox
		     {
		     	text-align: center;
		     }

		     

		     .btn
		     {
                width: 40%;
		     	margin-left:30%; 
		     }

		     .error
		     {
		     	font-size: 15px;
		     	color: red;

		     }

		  @media (max-width: 600px)
		  {
		     #signin_main_div
		     {
		     	margin-top: 5px;
		     	height: 600px;
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

             #signin_form
             {
             	margin-top: 25px; 
             	background-color: #d4cff8;
                border-radius: 5%;
             }

		     .form-group
		     {
		     	text-align: center;
		     }

		     .form-group input
		     {
                text-align: center;
                width: 90%;
                margin-left: 5%;
		     }

		     .form-group select
             {
             	text-align: center;
                width: 90%;
                margin-left: 5%;
             }

		     .btn
		     {
                width: 60%;
		     	margin-left:20%; 
		     }
		  }
	  </style>

</head>
<body style="background-color: #a29dd8">
  <div class="container-fluid" id="signin_main_div">
	<div class="row">
	  <div class="col-md-4" style="background-color: #aec3f3;"></div>
	  <div class="col-md-4" style="" id="signin_logo_div">
	    <img id="signin_image_logo" src="<?php echo base_url();?>assets_file/image_file/logo3.png" >
	  </div>
	  <div class="col-md-4" style=" background-color: #aec3f3;"></div>
	</div>
    



	<div>
		<form id="signin_form" action="<?php echo base_url()?>User_controller/log_in" method="post">
          
		  <div class="form-group">
		    <label for="text" >User name:</label>
		    <input type="text" class="form-control" id="signin_username" name="user_name" required="">
		    <p class="error" id="error_user_name"><?php echo $username_error;?></p>
		  </div>
		  <div class="form-group">
		    <label for="pwd" class="lebel">Password:</label>
		    <input type="password" class="form-control" id="signin_pwd" name="user_password" required="">
		    <p class="error" id="error_password"><?php echo $password_error;?></p>
		  </div>
          

          <div class="form-group">
			  <label for="sel1">Select user type</label>
			  <select class="form-control" id="sel1" required="" name="user_type">
			    <option></option>
			    <option>Admin</option>
			    <option>Teacher</option>
			    <option>Student</option>
			    <option>Parent</option>
			  </select>
		  </div>
		  
		  <button type="submit" class="btn btn-primary active"> Sign IN </button>
		  <div style="text-align: center; margin-top: 5px;"><a href="<?php echo base_url()?>school/sign_up">Create new account</a></div>
		</form>
	</div>
</div>
</body>
</html>
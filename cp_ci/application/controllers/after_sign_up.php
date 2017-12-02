<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo base_url();?>assets_file/bootstrap_file/css/bootstrap.min.css">
	  <script src='https://www.google.com/recaptcha/api.js'></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.min.js"></script>
</head>
<body>
   <div style="width: 100%; height: 300px; text-align: center;">
     <p style="font-size: 500%">Hello <?php echo $user_name;?></p>
     <p style="font-size: 200%">Now you can use your account By sign IN</p>
   </div>
   <form action="<?php echo base_url();?>school/login" method="post">
   	 <div style="width: 100%; height: 300px;">
   	   <a href="signin.php" style="margin-top: 50px;"><button type="submit" style="width:50%; margin-left: 25%; margin-top: 10px; width: 50px;">SIGN IN</button></a>
   	 </div>
   </form>
   
</body>
</html>
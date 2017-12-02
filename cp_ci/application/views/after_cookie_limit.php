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
     <p style="font-size: 500%">Hello</p>
     <p style="font-size: 300%">Please wait 15 min to create new account</p>
   </div>
   <form action="<?php echo base_url();?>school/login" method="post">
     <div class="col-md-4"></div>
   	 <div style="width: 100%; height: 300px;" class="col-md-4">
   	   <a href="signin.php" style="margin-top: 50px; width: 100%;" ><button type="submit" style="width:100%;  margin-top: 10px; height: 100px; font-size: 150%">GO BACK</button></a>
   	 </div>
     <div class="col-md-4"></div>
   </form>
   
</body>
</html>
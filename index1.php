<?php


//error_reporting(0);
	$con = mysqli_connect("localhost","root","","late_come");

	if (!$con) {
		echo "Database Connected";
		exit();
	}
session_start();

//login 
$error['leng']="";
if (isset($_POST['login'])) {
   if (!strlen(trim($_POST['username'])) && !strlen(trim($_POST['password']))) { $error['leng']=3; }
   else if (!strlen(trim($_POST['username'])) && strlen(trim($_POST['password']))) { $error['leng']=1; }
   else if (strlen(trim($_POST['username'])) && !strlen(trim($_POST['password']))) { $error['leng']=2; }
   else { $error['leng']=""; }

   if ($error['leng']=="") {
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $password = mysqli_real_escape_string($con, $_POST['password']);

      $query = "SELECT * FROM `admin` WHERE `username`='$username'  AND `password`='$password' ";
      $result = mysqli_query($con, $query);
      $count1 = mysqli_num_rows($result);

      if ($count1==1) {
         $fetch = mysqli_fetch_array($result);
         if ($username==$fetch['username'] && $password==$fetch['password']) {
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['username'] = $fetch['username'];



            $error['leng']="";
            echo "<script>alert('Login Success');location.href='dashboard.php'</script>";
         }
      }
      else{
         $error['leng']=4;
      }
      
   }
}
?>





<!DOCTYPE html>
<html>
<head>
<title> Latecomers </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="image/icon" href="images/adityalogo.png" rel="icon">
<meta name="keywords" content="Shadow Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style9.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files --> 
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main --> 
	<div class="main-agileinfo slider ">
		<div class="items-group">
			<div class="item agileits-w3layouts">
				<div class="block text main-agileits"> 
					<span class="circleLight"></span> 
					<!-- login form -->
					<div class="login-form loginw3-agile"> 
						<div class="agile-row">
							<b><h1> Login Form</h1></b> 
							<div class="login-agileits-top"> 	
								<form action="#" method="post"> 
									<p>User Name </p>
									<input type="text" class="name" name="username" required=""/>
									<p>Password</p>
									<input type="password" class="password" name="password" required=""/>  
									<label class="anim">
										<input type="checkbox" class="checkbox">
										<span> Remember me ?</span> 
									</label>   
									<input type="submit" name="login" value="Login"> 	
								</form> 	
							</div> 
							                <div class="login-agileits-bottom wthree"> 
								           
							              </div> 
						</div>  
					</div>   
				</div>
				 
			</div>   
		</div>
	</div>	 
	<!-- //main --> 
</body>
</html>
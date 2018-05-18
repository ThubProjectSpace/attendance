<?php


include("api/config.php");
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
   <title>Latecomers</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link type="image/icon" href="images/adityalogo.png" rel="icon">
   <!-- Bootstrap core CSS-->
   <link href="css/bootstrap.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/style.js"></script>
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
   <!-- external css-->
   <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/style2.css" rel="stylesheet">
   <link href="css/style-responsive.css" rel="stylesheet">
    <!-- Page-Level CSS-->

  </head>

<body>

<div class="bg"></div>

<div class="container animated fadeIn">
   <div class="alert alert-danger" style="display: none;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <label id="alertCont"></label>
   </div>
   <div class="error well well-sm text-danger text-center empid_error" style="display: <?php if($error['leng']!=0){ echo "block";  } else{ echo "none"; }; ?>;background: <?php if(@count($error)){ echo "#fff;";  } else { echo "transparent;"; } ?>;">
      <h5 style="display: <?php if($error['leng']==1){ echo "block";  } else{ echo "none"; }; ?>;"><b style="color: #f00">Please Enter Username</b></h5>
      <h5 style="display: <?php if($error['leng']==2){ echo "block";  } else{ echo "none"; }; ?>;"><b style="color: #f00">Please Enter Password</b></h5>
      <h5 style="display: <?php if($error['leng']==3){ echo "block";  } else{ echo "none"; }; ?>;"><b style="color: #f00">Please Enter All Fields</b></h5>
      <h5 style="display: <?php if($error['leng']==4){ echo "block";  } else{ echo "none"; }; ?>;"><b style="color: #f00">Please Enter Valid Details</b></h5>
   </div>
  <center>
    <h2>Login</h2>
  </center>
  <hr>
  <form class="form-validate form-horizontal " id="register_form" method="post">
      <center>
      <div> 
        <input type="text" name="username" id="username" placeholder="Email or Employee Id" required autocomplete="true" value="<?php echo @$_POST['username'] ?>">
        <input type="password" name="password" id="password" placeholder="Password" required value="<?php echo @$_POST['password'] ?>">
       </div>
      <p class="a-link"><a href="#forget-password">Forget password?</a></p>
        <button class="btn btn-primary" name="login">Login</button>
      </center>
      <br>
   </form>
</div>
  <ul class="bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    
  
 
</div>
</body>
</html>
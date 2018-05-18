
<?php

include("includes/check_session.php");
include("api/config.php");

  // student data load
  if ($_REQUEST['action'] && $_REQUEST['action']=="data") {

    echo "<script>$('#roll').val('');</script>";

    





$pin = mysqli_real_escape_string($con, $_REQUEST['pin']);


$q="SELECT * FROM students where student_code='".$pin."'";
$res7=mysqli_query($con, $q);
$student=mysqli_num_rows($res7);



if($student>=1)
{


$que="SELECT * from `attendence` where day(date)='".date('d')."' AND month(date)='".date('m')."' AND year(date)='".date('Y')."' AND `rollno`='".$pin."'";
$res3=mysqli_query($con, $que);
$total=mysqli_num_rows($res3);

if($total>=1)
{
?>

<div class="alert alert-info">
  <strong>Already data found</strong> 
</div>

<?php
}
else{ 
$query1="insert into `attendence` SET `rollno`='".$pin."',`status`=1";
$res2=mysqli_query($con, $query1);
if($res2){
?>

<div class="alert alert-success">
  <strong>Success!</strong> SMS has been sent.
</div>

<?php

}

}


}
else{


echo "<center><h4 class='low'>Student Data not found in data base...! contact THUB </h4></center>";


}


?>

<style>
.low{
  color:red;
}
.high{

font-size: 100px;font-weight: bold;
border:0px 0.5px 0px 0.5px;
background-color:#ffa64d;
width: 250PX;
border-radius: 5px;
align-content: left;
color: #ffffff;
}

.panel-heading{
    background-image: url("bg9.jpg");
}

.title{
  color:#000000;
}
</style>

<?php



$que="SELECT * from `attendence` where day(date)='".date('d')."' AND month(date)='".date('m')."' AND year(date)='".date('Y')."'";
$res3=mysqli_query($con, $que);

$total=mysqli_num_rows($res3);

echo "<center><h2 class='title'><b>Number of latecomers:</b></h2><h1 class='high'>".$total."</h1></center>";



                $x=1;      
             $query= "SELECT * FROM `students` where `student_code`='".$pin."'";
             $res=mysqli_query($con, $query);
             while($row = mysqli_fetch_array($res)) {

                    	


                    ?> 

<div class="container" align="left" >
<div class="row">
<div class="col-md-12 ">

<div class="panel panel-default" style="border-color: #003366; background-image: url("images/bg8.jpg")">
  <div class="panel-heading" style="border-color: #003366; background-color: #336699"> <center> <h2 style="color:  #ffffff">Student Data</h2></center></div>
   <div class="panel-body" style="border-color: #003366">
       
    <div class="box box-info" >
        
            <div class="box-body">

            <div class="col-md-12">
            <center><img alt="User Pic"  style="width: 100PX;height: 100px" src="images/user.jpg" id="profile-image1" class="img-circle img-responsive"></center> <br>
    
            </div>


            <div class="col-md-6">
            <span><h4 class="text-right" style="color: #003300;">Roll No :</h4></span>
             <span><h4 class="text-right" style="color: #003300;">Name :</h4></span>
              <span><h4 class="text-right" style="color: #003300;">Guardian name :</h4></span>
               <span><h4 class="text-right" style="color: #003300;">Mobile :</h4></span>
                <span><h4 class="text-right" style="color: #003300;">Gender :</h4> 
                 <span><h4 class="text-right" style="color: #003300;">Year :</h4></span>
                   <span><h4 class="text-right" style="color: #003300;">College :</h4></span>

               
            </div>

                <div class="col-md-6">
            <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['student_code'];?> </h4></span>
             <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['student_name'];?> </h4></span>
              <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['guardian_name'];?> </h4></span>
               <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['mobile'];?> </h4></span>
                <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['gender'];?> </h4></span>
                 <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['year'];?> </h4></span>
                   <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['college'];?> </h4></span>

               
            </div>



                

        </div> 
            
       </div> 
    </div>
</div>  
  
       
       
       
       
       
       
       
       
       
   </div>
</div>





   




                     <?php
            $x++;
            }
           
          }


   ?>







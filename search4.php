<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");

/*if ($_GET['encode']=="") {
$id=base64_encode($_GET['id']);
echo "<script>location.href='index.php?encode=encoded&id=$id'</script>";
}*/





//session_start();

?>


<script>
  $(document).ready(function() {
    $('.example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
</script>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->
<section id="main-content">

  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="tab-content">
          <div id="finder" class="tab-pane fade in active">
            <div class="row dashboard-stats container"><br><br><br>
              <div class="col-md-4 col-sm-6 col-md-offset-7">
                <section class="panel panel-box">
                  <div class="panel-left panel-icon bg-lovender"><i class="fa fa-book fw fa-2x" style="margin-top: 12px;"></i></div>
                  <div class="panel-right panel-icon bg-reverse">
                    <p class="text-muted no-margin text"><span> </span></p>
                    <Strong>
                      <p class="size-h1">Late Comers list</p>
                    </Strong>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <h4>
  <ul class="nav nav-tabs">
    <li class="<?php if(isset($_POST['submit']) ) echo "active";?>"><a data-toggle="pill" href="#studentsearch">Student Search</a></li>
    <li class="<?php if(isset($_POST['submit1']) ) echo "active";
    elseif (!isset($_POST['submit'])) echo "inactive";
    else echo "inactive";
    
    ?>"><a data-toggle="pill" href="#collegesearch">College Search</a></li>
    <li class="<?php if(isset($_POST['submit2']) ) echo "active";?>"><a data-toggle="pill" href="#branchsearch">Branch Search</a></li>
   
  </ul></h4>

  <div class="tab-content">
    <div id="studentsearch" class="tab-pane fade in active <?php if(isset($_POST['submit'])) echo 'active';?>">
      <div class="row">
<center>
 <form method="post">
<p>Enter rollno: <input type="text" name="rollno">
<button class="btn btn-warning" name="submit">Submit</button>

        <!--table responsive div end-->
 
 </form>
 </center>

    </div>

    <!--  data will write here -->


    


          <?php 
         if(isset($_POST['submit']))
         {

          ?>

<div class="tab-content" style="border: 1px solid #eee; background: #fff; padding: 10px;">
      <!--  data will write here -->
      <center><h2 class="text-center">Students List</h2></center>

      <!--table responsive div start-->
      <div class="table-responsive">
        <table class="table example table-striped table-bordered table-centered table-hover">
          <thead>    
            <!--<a href="#add" onclick="display_form()" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus"></i> Start Mapping</a>-->
            <tr>
              <th>S.No</th>
              <th>Date</th>
               <th>Student code</th>
              <th>Student name</th>
              <th>Guardian name</th>
              <th>Mobile</th>
              <th>Gender</th>
              <th>Year</th>
              <th>College</th>
              
            </tr>
          </thead>
          <tbody>

          <?php
        

               

     
         
          
                $x=1;    

                $rollno=$_POST['rollno'];
                
             $query18 ="SELECT * FROM `attendence` WHERE `rollno`='".$rollno."' ";
         
             $res18=mysqli_query($con, $query18);


                  while($row = mysqli_fetch_array($res18)) {

                    $query17="SELECT * from `students` where student_code='".$row['rollno']."'";
                    $res17=mysqli_query($con, $query17);
                    $fetch= mysqli_fetch_array($res17);



                    ?> 
                    <tr class="data">
                        <td><?php echo $x;?></td>
                        <td  ><?php echo $row['date'];?></td>
                       <td  ><?php echo $row['rollno'];?></td>
                        <td  ><?php echo $fetch['student_name'];?></td>
                        <td  ><?php echo $fetch['guardian_name'];?></td>
                        <td ><?php echo $fetch['mobile'];?></td>
                        <td  ><?php echo $fetch['gender'];?></td>
                        <td ><?php echo $fetch['year'];?></td>
                        <td ><?php echo $fetch['college'];?></td>

                       
                  
                       

                    </tr>
           <?php
            $x++;
            }
          }
            ?>
         
          </tbody>
        </table>
      </div><!--table responsive div end-->
    </div>
  </div> <!-- /row -->
  </div>


     <div class="tab-content">
    <div id="collegesearch" class="tab-pane fade <?php if(isset($_POST['submit1']) || !isset($_POST['submit'])) echo 'active';?>">
       <div class="row">
<center>
 <form method="post">
<p>Select College: 
<select class="selectpicker" name="college">
  <option value="AEC">ADITYA ENGINEERING COLLEGE</option>
  <option value="ACET">ADITYA COLLEGE OF ENGG AND TECH</option>
  <option value="ACOE">ADITYA COLLEGE OF ENGG</option>
</select>

<button class="btn btn-warning" name="submit1">Submit</button></p>

        <!--table responsive div end-->
 
 </form>
 </center>

    </div>

    <!--  data will write here -->


    


          <?php 
         if(isset($_POST['submit1']))
         {

          ?>

<div class="tab-content" style="border: 1px solid #eee; background: #fff; padding: 10px;">
      <!--  data will write here -->
      <center><h2 class="text-center">Students List</h2></center>

      <!--table responsive div start-->
      <div class="table-responsive">
        <table class="table example table-striped table-bordered table-centered table-hover">
          <thead>    
            <!--<a href="#add" onclick="display_form()" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus"></i> Start Mapping</a>-->
            <tr>
              <th>S.No</th>
              <th>Date</th>
               <th>Student code</th>
              <th>Student name</th>
              <th>Guardian name</th>
              <th>Mobile</th>
              <th>Gender</th>
              <th>Year</th>
              <th>College</th>
              
              
              
            </tr>
          </thead>
          <tbody>

          <?php
        

               

     
         
          
                $x=1;    

                $college=$_POST['college'];
                
             $query20 ="SELECT * FROM `students` WHERE `college`='".$college."' ";
         
             $res20=mysqli_query($con, $query20);


                  while($row = mysqli_fetch_array($res20)) {

                    $query22="SELECT * from `attendence` where `rollno`='".$row['student_code']."'";
                    $res22=mysqli_query($con, $query22);
                    while($fetch1= mysqli_fetch_array($res22)){

                    $query23="SELECT * from `students` where `student_code`='".$fetch1['rollno']."'";
                    $res23=mysqli_query($con, $query23);
                    $fetch2= mysqli_fetch_array($res23);



                    ?> 
                    <tr class="data">
                        <td><?php echo $x;?></td>
                        <td  ><?php echo $fetch1['date'];?></td>
                       <td  ><?php echo $fetch1['rollno'];?></td>
                      <td  ><?php echo $fetch2['student_name'];?></td>
                       <td  ><?php echo $fetch2['guardian_name'];?></td>
                        <td ><?php echo $fetch2['mobile'];?></td>
                        <td  ><?php echo $fetch2['gender'];?></td>
                        <td ><?php echo $fetch2['year'];?></td>
                        <td ><?php echo $fetch2['college'];?></td>

                  
                       

                    </tr>
           <?php
            $x++;
            }
          }
          }
            ?>
         
          </tbody>
        </table>
      </div><!--table responsive div end-->
    </div>
  </div> <!-- /row -->
</div>



 <div class="tab-content">
    <div id="branchsearch" class="tab-pane fade <?php if(isset($_POST['submit2']) || !isset($_POST['submit']) || !isset($_POST['submit1'])) echo 'active';?>">
      <div class="row">
<center>
 <form method="post">
<p>Select Branch: 
<select class="selectpicker" name="Branch">
  <option value="CSE" >COMPUTER SCIENCE AND ENGG</option>
  <option value="ECE">ELECTRONICS AND COMMUNICATION ENGG</option>
  <option value="EEE">ELECTRICAL AND ELECTRONICS ENGG</option>
  <option value="CIVIL">CIVIL ENGG</option>
  <option value="MECH">MECHANICAL ENGG </option>
  <option value="IT">INFORMATION TECHNOLOGY</option>
</select>
<button class="btn btn-warning" name="submit2">Submit</button></p>

        <!--table responsive div end-->
 
 </form>
 </center>

    </div>

    <!--  data will write here -->


    


          <?php 
         if(isset($_POST['submit2']))
         {

          ?>

<div class="tab-content" style="border: 1px solid #eee; background: #fff; padding: 10px;">
      <!--  data will write here -->
      <center><h2 class="text-center">Students List</h2></center>

      <!--table responsive div start-->
      <div class="table-responsive">
        <table class="table example table-striped table-bordered table-centered table-hover">
          <thead>    
            <!--<a href="#add" onclick="display_form()" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus"></i> Start Mapping</a>-->
            <tr>
              <th>S.No</th>
              <th>Date</th>
               <th>Student code</th>
              <th>Student name</th>
              <th>Guardian name</th>
              <th>Mobile</th>
              <th>Gender</th>
              <th>Year</th>
              <th>College</th>
               <th>Branch</th>
              
              
              
              
            </tr>
          </thead>
          <tbody>

          <?php
        

               

     
         
          
                $x=1;    

                $Branch=$_POST['Branch'];
                
             $query24 ="SELECT * FROM `students` WHERE `Branch`='".$Branch."' ";
         
             $res24=mysqli_query($con, $query24);


                  while($row = mysqli_fetch_array($res24)) {

                    $query25="SELECT * from `attendence` where `rollno`='".$row['student_code']."'";
                    $res25=mysqli_query($con, $query25);
                    while($fetch3= mysqli_fetch_array($res25)){

                    $query26="SELECT * from `students` where `student_code`='".$fetch3['rollno']."'";
                    $res26=mysqli_query($con, $query26);
                    $fetch4= mysqli_fetch_array($res26);



                    ?> 
                    <tr class="data">
                        <td><?php echo $x;?></td>
                        <td  ><?php echo $fetch3['date'];?></td>
                       <td  ><?php echo $fetch3['rollno'];?></td>
                      <td  ><?php echo $fetch4['student_name'];?></td>
                       <td  ><?php echo $fetch4['guardian_name'];?></td>
                        <td ><?php echo $fetch4['mobile'];?></td>
                        <td  ><?php echo $fetch4['gender'];?></td>
                        <td ><?php echo $fetch4['year'];?></td>
                        <td ><?php echo $fetch4['college'];?></td>
                        <td ><?php echo $fetch4['Branch'];?></td>

                  
                       

                    </tr>
           <?php
            $x++;
            }
          }
          }
            ?>
         
          </tbody>
        </table>
      </div><!--table responsive div end-->
    </div>
  </div> <!-- /row -->
      
    </div>
   
  

<br><br/> <!-- /.container -->
</section>







<?php
include("includes/footer.php");
?>

</section>

</body>
</html>
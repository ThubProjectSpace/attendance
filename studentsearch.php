<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");
include("api/config.php");

/*if ($_GET['encode']=="") {
$id=base64_encode($_GET['id']);
echo "<script>location.href='index.php?encode=encoded&id=$id'</script>";
}*/





//session_start();

?>


<script>
  $(document).ready(function() {
    $('.example').DataTable( {
     // dom: 'Bfrtip',
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


    <div class="row">
<center>
 <form method="post">
<p>Enter rollno: <input type="text" name="rollno"><br></p>
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
</div><br><br/> <!-- /.container -->
</section>
<?php
include("includes/footer.php");
?>

</section>
</body>
</html>
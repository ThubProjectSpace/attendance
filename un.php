<table id="datatable" class="table table-striped table-bordered table-centered table-hover">
              <thead>    
                  <!--<a href="#add" onclick="display_form()" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus"></i> Start Mapping</a>-->
                  <tr>
                     <th>S.No</th>
                  <th>Student code</th>
                    <th>Student name</th>
                    <th>Guardian name</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Year</th>
                    <th>College</th>
                   
                    
                    <!--<th>Action</th>-->
                  </tr>
              </thead>

              <?php 
         if(isset($_POST['submit']))
         {



          echo "testing";
          $student_code=$_POST['student_code'];

                $x=1;    


                

             $query= "SELECT * FROM `students` where `student_code`='".$student_code."'";
             $res=mysqli_query($con, $query);

                     
                          
                    while($row = mysqli_fetch_array($res)) {
                    ?> 
                    <tr class="data">
                        <td><?php echo $x;?></td>
                        <td  ><?php echo $row['student_code'];?></td>
                        <td  ><?php echo $row['student_name'];?></td>
                        <td  ><?php echo $row['guardian_name'];?></td>
                        <td ><?php echo $row['mobile'];?></td>
                        <td  ><?php echo $row['gender'];?></td>
                        <td ><?php echo $row['year'];?></td>
                        <td ><?php echo $row['college'];?></td>

                       

                    </tr>
           <?php
            $x++;
            }
          }
            ?>
          </table>
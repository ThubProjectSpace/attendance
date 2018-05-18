<!-- - config file included here   - -->
<?php
include("includes/check_session.php");
include("api/config.php");
?>


<!--
**********************************************************************************************************************************************************
MAIN SIDEBAR MENU
***********************************************************************************************************************************************************
-->
<!-- sidebar start-->


<aside>
<style>
  .drop .drops{
    color:#000000;
  }
  </style>
   <div id="sidebar" class="nav-collapse">
      <!-- sidebar menu start-->
      <ul id="nav-accordion" class="sidebar-menu">
         <p class="centered">
            <a href="index1.php">
               <?php
               if (isset($_SESSION['username']) && $_SESSION['username']!="" ) { 
                  ?>
                  <img src="images/thub.jpg" width="80" class="img-circle">
                  <?php
               }
               else if (isset($_SESSION['emp_id']) && $_SESSION['emp_id']!="" ) {
                  if (file_exists("images/profilepics/".$_SESSION['emp_id'].".jpg")) {
                     ?>
                     <img src="images/thub.jpg" width="80" class="img-circle"/>
                     <?php
                  }
               }
               else {
                  ?>
                  <img src="images/thub.jpg" width="80" class="img-circle"/>
                  <?php
               } ?>
            </a>
         </p>
         
   
         <li class="sub-menu"><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         <li class="sub-menu"><a href="report.php"><i class="fa fa-dashboard"></i><span>Reports</span></a></li>
          
          <li class="sub-menu"><a href="students.php"><i class="fa fa-dashboard"></i><span>Students list</span></a></li>

          
          
           <li class="dropdown">
           <a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard"></i><span>Search</span></a>
              <ul class="dropdown-menu">
               
                        <li class="drop"><a class="drops" href="studentsearch.php">Student search</a></li>
                        <li class="drop"><a class="drops" href="collegesearch.php">College search</a></li>
                         <li class="drop"><a class="drops" href="branchsearch.php">Branch search</a></li>
                         
                    </ul>
         

    </li>
        
         
      </ul>
   </div>
</aside>
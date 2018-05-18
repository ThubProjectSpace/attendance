<?php

include("api/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Late comers</title>
  <link type="image/icon" href="images/adityalogo.png" rel="icon">
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- external css-->
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/preloader.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <!-- Page-Level CSS-->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link href="plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="plugins/dataTables/datatables.min.css"/>
  <script>

    //query for tooltip dont remove
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });


    $(document).ready(function() {
      $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
        ]
      } );
    } );
  </script>


  <style>
  .header, #sidebar {
    background: #2C3E50;
  }
  .panel-box {
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 30px;
    text-align: center;
    border: medium none;
  }
  .panel-box .panel-icon {
    display: table-cell;
    padding: px;
    width: 1%;
    vertical-align: top;
    border-radius: 0px;
    text-align: center;
      /*border-bottom: 1px solid #fcfcfc;
      border-top: 1px solid #fcfcfc;
      border-right: 1px solid #fcfcfc;*/
    }
    .panel-box .size-h1 {
      margin-top:7px;
    }
    .panel-box .fa {
      margin-top:9px;
    }
    .bg-lovender {
      background-color: #8075C4 !important;
      color: #FFF !important;
    }
    .lovender-text {
      color: #6a5fb1;
    }
  </style>

</head>
<body>

  <section id="container">
    <!-- header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div data-placement="right" data-original-title="Toggle Navigation" class="fa fa-bars tooltips"></div>
      </div>
      <!-- logo start--><a href="index1.php" class="logo"><b><img src="images/myhub_logo.png" style="height:55px;width:100px;margin-top:-13px"></b></a>
        <!-- logo end-->
        <div class="navbar-custom-menu">
          <ul class="top-nav navbar-right">
            <!-- Notification Menu-->
            <!-- User Menu-->
            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i style="margin: 10px 10px 0 0;font-size: 2.2em;color: #f2815e;" class="fa fa-user fa-lg pull-right"></i></a>
              <ul style="margin-top: 35px" class="dropdown-menu settings-menu">
                
                <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </header>
      <!-- header end-->
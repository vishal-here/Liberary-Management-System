﻿<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>

    <?php 
include('../clg-nav.php') ;
?>
        <!-- <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <img src="images/9.png" style="float: left; height:85px ; margin-right: 20px; margin-top: 5px; margin-left: 70px"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                   
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
          
        </div>
        /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 span3">
                        <div class="sidebar">

                        <ul class="unstyled" style="margin-left:0; padding-left:0;">
                                <li style="text-align: center ; border-radius:10px ; font-style :italic ; background-color:brown; padding: 10px; "><h1 style="color:white">Admin Panel</h1> </li>
                            </ul> <br><br>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                                <!-- <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li> -->
                                 <!-- <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li> -->
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Users </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>All Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>New book Requests </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                            
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
                    <div class="col-md-3">
                        <center>
                            <div class="card"  style="border-radius : 20px ;" > 
                                <!-- <img class="card-img-top" src="images/profile2.png" alt="Card image cap"> -->
                                <div class="card-body">

                                <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                               // $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                $type  = $row['Type'] ;
                                ?>    
                                    <i>
                                    <h1 class="card-title"><center><?php echo $name ?></center></h1>
                                    <h3 class="card-title"><center><b>[&nbsp;&nbsp;<?php echo $type?>&nbsp;&nbsp;]<b></center></h3>
                                    <br>
                                    <p><b>Email ID: </b><?php echo $email ?></p>
                                    <br>
                                    <p><b>Mobile number: </b><?php echo $mobno ?></p>
                                    </b>
                                </i>

                                </div>
                            </div>
                        <br>
               

                        <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                                <li><a href="edit_admin_details.php"><i class="menu-icon icon-setting"></i>Change Password </a></li>
                            </ul>
                      
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </center>               
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <?php include('../clg-footer.php') ?>
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
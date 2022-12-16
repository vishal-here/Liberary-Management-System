<?php
ob_start();
require('dbconn.php');
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
           
        </div> -->
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                        <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                        <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Return to Dashboard
                                </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                              
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i> Issued Books </a></li>
                                <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Reading history </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Ask for a book </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="module">
                            <div class="module-head">
                                <h2 style="text-align: center;">Update Details</h3>
                            </div>
                            <div class="module-body">


                                <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                             //   $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                $pswd=$row['Password'];
                                ?>    
                    			
                                <form class="form-horizontal row-fluid" action="edit_student_details.php?id=<?php echo $rollno ?>" method="post">

                                    <div class="control-group">
                                        <label class="control-label" for="Name"><h6><b>Name:</b></h6></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8 p-4" style="width:80%" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><h6>
                                        <b>Email Id:</b>
                                        </h6></label>
                                        <div class="controls">
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8  p-4" style="width:80%"required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="MobNo"><h6>
                                        <b>Mobile Number:</b>
                                        </h6></label>
                                        <div class="controls">
                                            <input type="text" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" class="span8 p-4" style="width:80%" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="Password"><h6>
                                        <b>New Password:</b>
                                        </h6></label>
                                        <div class="controls">
                                            <input type="password" id="Password" name="Password"  value= "<?php echo $pswd?>" class="span8 p-4" style="width:80%" required>
                                        </div>
                                    </div>   

                                    <div class="control-group">
                                            <div class="d-flex justify-content-around controls " style="margin-left:0">
                                                <button type="submit" name="submit"class="btn btn-danger"><center>Update Details</center></button>
                                            </div>
                                        </div>                                                                     

                                </form>
                    		           
                        </div>
                        </div> 	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        include('../clg-footer.php')
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
if(isset($_POST['submit']))
{
    $rollno = $_GET['id'];
    $name=$_POST['Name'];
    $category=$_POST['Category'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];

$sql1="update LMS.user set Name='$name', Category='$category', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>
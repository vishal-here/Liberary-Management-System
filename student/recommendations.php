<?php
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
        <?php include('../clg-nav.php') ; ?>
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
                                <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Reading history & Fines</a></li>
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
                    <div class="content">

                        <div class="module">
                            <div class="module-head" style="text-align: center;">
                                <h1>Ask for a Book</h1>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid " action="recommendations.php" method="post">
                                        <div class="control-group" style="text-align: center;">
                                            
                                            <div class="controls" style="margin-left: 0;">
                                            <label class="control-label" for="Title"><h4>Book Name </h4></label>
                                                <input type="text" id="title" name="title" placeholder="Title" class="col-md-8 p-4" required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group" style="text-align: center;">
                                          
                                            <div class="controls " style="margin-left: 0;">
                                            <label class="control-label" for="Description"><h4>Authors</h4></label>
                                                <input type="text" id="Description" name="Description" placeholder="Description" class="col-md-8 p-4" required>
                                            </div>
                                        </div>

                                        <div class="control-group" style="text-align: center;">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn btn-danger">Ask</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

        <?php include('../clg-footer.php') ; ?>
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
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $rollno=$_SESSION['RollNo'];

$sql1="insert into LMS.new_book_requests (Book_Name,Description,RollNo) values ('$title','$Description','$rollno')"; 



if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('Query submitted !! ')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?> 

    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
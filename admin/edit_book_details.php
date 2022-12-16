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
        

    <?php 
include('../clg-nav.php') ;
?>
      
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                        <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Admin Panel
                                </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                               
                            <!-- <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li> -->
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Users </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>All Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>New Book Requests </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i> Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled" style="margin-left:0; padding-left:0;">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                    <div class="span9">
                        <div class="module">
                            <div class="module-head">
                                <h2 style="text-align: center;">Update Book Details</h2>
                            </div>
                            <div class="module-body">

                                <?php
                                    $bookid = $_GET['id'];
                                    $sql = "select * from LMS.book where Bookid='$bookid'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                    $name=$row['Title'];
                                    $publisher=$row['Publisher'];
                                    $year=$row['Year'];
                                    $avail=$row['Availability'];


                                ?>

                                    <br >
                                    <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $bookid ?>" method="post">
                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Title"><h6>Book Title:</h6></label></b>
                                            <div class="controls">
                                                <input type="text" id="Title" name="Title" value= "<?php echo $name?>" class="span8 p-4" style="width: 70%" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Publisher"><h6>Publisher:</h6></label></b>
                                            <div class="controls">
                                                <input type="text" id="Publisher" name="Publisher" value= "<?php echo $publisher?>" class="span8 p-4"  style="width: 70%" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Year"><h6>Year:</h6></label></b>
                                            <div class="controls">
                                                <input type="text" id="Year" name="Year" value= "<?php echo $year?>" class="span8 p-4" style="width:70%" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <b>
                                            <label class="control-label" for="Availability"><h6>Availability:</h6></label></b>
                                            <div class="controls">
                                                <input type="text" id="Availability" name="Availability" value= "<?php echo $avail?>" class="span8 p-4" style="width: 70%" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls d-flex justify-content-around ml-0">
                                                <button type="submit" name="submit"class="btn btn-danger">Update Details</button>
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
        <?php include('../clg-footer.php') ?>
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
    $bookid = $_GET['id'];
    $name=$_POST['Title'];
    $publisher=$_POST['Publisher'];
    $year=$_POST['Year'];
    $avail=$_POST['Availability'];

$sql1="update LMS.book set Title='$name', Publisher='$publisher', Year='$year', Availability='$avail' where BookId='$bookid'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
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
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

                    <!--/.span9-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h2 style="text-align: center;">Add Book</h2>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="addbook.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Title"><h6>Book Title</h6></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Title" class="span8 p-4" style="width: 80%" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Author"><h6>Author</h6></label>
                                            <div class="controls">
                                                <input type="text" id="author1" name="authors" class="span8 p-4" style="width: 80%" placeholder="Authors" required>
                                        

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Publisher"><h6>Publisher</h6></label>
                                            <div class="controls">
                                                <input type="text" id="publisher" name="publisher" placeholder="Publisher" class="span8 p-4 " style="width: 80%" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Year"><h6>Year</h6></label>
                                            <div class="controls">
                                                <input type="text" id="year" name="year" placeholder="Year" class="span8 p-4" style="width: 80%" required>
                                            </div>
                                        </div>
                                        <div class="control-group ">
                                            <label class="control-label" for="Availability"><h6>Quantity</h6></label>
                                            <div class="controls">
                                                <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="span8 p-4" style="width: 80%" required>
                                            </div>
                                        </div>
                                        

                                        <div class="control-group " >
                                            <div class="d-flex controls justify-content-around"  style="margin-left:0"  >
                                                <button type="submit" name="submit"class="btn btn-danger" >Add Book</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

                </div>
            </div>
            <!--/.container-->

        </div>


        
        <!--/.wrapper-->
        <?php include('../clg-footer.php') ?>

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
    $author1=$_POST['authors'];
  
    $publisher=$_POST['publisher'];
    $year=$_POST['year'];
    $availability=$_POST['availability'];

$sql1="insert into LMS.book (Title,Publisher,Year,Availability,Authors ) values ('$title','$publisher','$year','$availability','$author1')";

if($conn->query($sql1) === TRUE){



/*
$sql2="select max(BookId) as x from LMS.book";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();
$x=$row['x'];
$sql3="insert into LMS.author values ('$x','$author1')";
$result=$conn->query($sql3);
if(!empty($author2))
{ $sql4="insert into LMS.author values('$x','$author2')";
  $result=$conn->query($sql4);}
if(!empty($author3))
{ $sql5="insert into LMS.author values('$x','$author3')";
  $result=$conn->query($sql5);}
echo "<script type='text/javascript'>alert('Success')</script>";
*/
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
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
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book Name</th>
                                      <th>Authors</th>
                                      <th>Requested By</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select * from LMS.new_book_requests";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookname=$row['Book_Name'];
                                $description=$row['Authors'];
                                $rollno=$row['RollNo'];
                            ?>
                                    <tr>
                                      <td><?php echo $bookname ?></td>
                                      <td><?php echo $description?></td>
                                      <td><b><?php echo strtoupper($rollno)?></b></td>

                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>

                                <center>
                                <a href="addbook.php" class="btn btn-danger">Add a Book</a></center>
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
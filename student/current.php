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
                               
                              
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>
                                All Books </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i> Issued Books </a></li>
                                <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Reading history  & Fines</a></li>
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
           
                                    <br>
                                    <?php
                                    $rollno = $_SESSION['RollNo'];
                                  
                                        // $sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId";

                                        $sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId";


                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No books has been issued &nbsp :( </i></b></h2></center>";
                                    else
                                    {

                                
                                    ?> 
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                    
                                      
                                      <th>

                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php
//fine calculation 

                        $sql1="update LMS.record set Dues  = DATEDIFF(CURRENT_DATE , Due_Date) * 2 WHERE DATEDIFF( CURRENT_DATE , Due_Date) > 0 AND Date_of_Return is NULL";
                             $result1=$conn->query($sql1);
                        
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $renewals=$row['Renewals_left'];
                              
                            
                            ?>

                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                  
                                        <td><center>
                                        <?php 
                                         if($renewals)
                                            echo "<a href=\"renew_request.php?id=".$bookid."\" class=\"btn btn-light\">Renew</a>";
                                        ?>
                                        <a href="return_request.php?id=<?php echo $bookid; ?>" class="btn btn-danger">Return</a>
                                        </center></td>
                                    </tr>
                            <?php }} ?>
                                    </tbody>
                                </table>
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
      
    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
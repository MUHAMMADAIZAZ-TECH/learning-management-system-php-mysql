<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0) 
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | Course History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
       <link rel="stylesheet" href="css/bootstrap.min.css" >
       <link rel="stylesheet" href="css/bootstrap.css" >

       <link rel="stylesheet" type="text/css" href="style1.css">
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>

<body class="b_pic">
        <div class="container-fluid">
        <?php include('includes/header.php');
  
        ?>
                <div class="row" >
                <?php 
                  include('includes/menubar.php');      
         ?>

                <div class="col-lg-9">
                <h1>Course History  </h1>
                   
                <div class="card">
                        <div  class="card-header " >
                           Course History
                        </div>
      <div class="card-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name </th>
                                            <th>Session </th>
                                            <th> Department</th>
                                                <th>Semester</th>
                                             <th> Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
if($_SESSION['type']=="Student"){
    $sql=mysqli_query($con,"select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,courseenrolls.enrollDate as edate ,semester.semester as sem from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department join semester on semester.id=courseenrolls.semester  where courseenrolls.studentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courname']);?></td>
                                            <td><?php echo htmlentities($row['session']);?></td>
                                            <td><?php echo htmlentities($row['dept']);?></td>
                                             <td><?php echo htmlentities($row['sem']);?></td>
                                             <td><?php echo htmlentities($row['edate']);?></td>
                                                          </tr>
<?php 
$cnt++;
}
}
else{ 
    if($_SESSION['type']=="Teacher"){
    $sql=mysqli_query($con,"select teacher_course.course as cid, course.courseName as courname,session.session as session,department.department as dept,teacher_course.enrollDate as edate ,semester.semester as sem from teacher_course join course on course.id=teacher_course.course join session on session.id=teacher_course.session join department on department.id=teacher_course.department join semester on semester.id=teacher_course.semester  where teacher_course.teacherRegno='".$_SESSION['login']."'");
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
    {
    ?>
    
    
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($row['courname']);?></td>
                                                <td><?php echo htmlentities($row['session']);?></td>
                                                <td><?php echo htmlentities($row['dept']);?></td>
                                                <td><?php echo htmlentities($row['sem']);?></td>
                                                 <td><?php echo htmlentities($row['edate']);?></td>
                                               
                                            </tr>
    <?php 
    $cnt++;
    }
}
}
 ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>




 <?php include('includes/footer.php');?>
        </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
         <script src="js/jquery.min.js" ></script>
  <script src="js/jquery.min.js" ></script>
  <script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<?php } ?>

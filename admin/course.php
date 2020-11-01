<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];
$course_id=$_POST['course_id'];
$coursename=$_POST['coursename'];
$pincode = rand(100000,999999);
$ret=mysqli_query($con,"insert into course(courseCode,course_id,pincode,courseName) values('$coursecode','$course_id','$pincode','$coursename')");
header("location:course.php");
exit();
if($ret)
{
$_SESSION['message']="Course Created Successfully !!";
exit();
}
else
{
  $_SESSION['message']="Error : Course not created";
  exit();
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from course where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Course deleted !!";
header("location:course.php");
                  exit();
      }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | ADMIN Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="css/style1.css">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="css/bootstrap.min.css" >
       <link rel="stylesheet" href="css/bootstrap.css" >

       <script src="js/jquery.min.js" ></script>
  <script src="js/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
 <link rel="stylesheet" type="text/css" href="css/style1.css">
       
   </head>

<body class="b_pic">

        <div class="container-fluid">
        <?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->

                <div class="row">
                <?php include('includes/sidebar.php');?>
       
                    <div class="col-lg-9">
                   <div> <h1>Course  </h1>
                   </div> 
                   <div class="card">
                        <div  class="card-header">
                            Course 
                        </div>
                      
                        <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['message']);?><?php echo htmlentities($_SESSION['message']="");?></div>
                        <div  class="card-body">
                       <form name="course" method="post">
   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" required />
  </div>
  <div class="form-group">
    <label for="coursecode">Course id  </label>
    <input type="text" class="form-control" id="courseid" name="course_id" placeholder="Course id" required />
  </div>
 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
  </div>

 <button type="submit" name="submit" class="btn btn-outline-info" >Create</button>
</form>
                            </div>
                            </div>
                            <div>
                            <div class="card">
                        <div  class="card-header">
                        Manage Course
                        </div>
                      
                        <div  class="card-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Course id </th>
                                            <th>Course Name </th>
                                            <th>pincode </th>
                                             <th>Creation Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from course");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courseCode']);?></td>
                                            <td><?php echo htmlentities($row['course_id']);?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
                                            <td><?php echo htmlentities($row['pincode']);?></td>                          
                                             <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['id']?>">
<button class="btn btn-outline-primary"> Edit</button> </a>                                        
  <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-outline-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    </div>
                  
                </div>
       
<?php include('includes/footer.php');?>
  
        </div>
  
</body>
</html>
<?php } ?>

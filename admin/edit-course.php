<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$id=intval($_GET['id']);
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];
$course_id=$_POST['course_id'];
$coursename=$_POST['coursename'];
$ret=mysqli_query($con,"update course set courseCode='$coursecode',course_id='$course_id',courseName='$coursename',updationDate='$currentTime' where id='$id'");
if($ret)
{
$_SESSION['msg']="Course Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not Updated";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | ADMIN Edit Course</title>
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
   
   <div class="row" >
   <?php include('includes/sidebar.php');?>
      
                    <div class="col-lg-9">
                  <div>  <h1 > Mannage Course  </h1></div>
                
                    <div class="card">
                        <div  class="card-header">
                          Edit Course 
                        </div>
                        <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");
                        unset($_SESSION['msg']);?></div>


                        <div  class="card-body">
                       <form name="editcourse" method="post">
<?php
$sql=mysqli_query($con,"select * from course where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<p><b>Last Updated at</b> :<?php echo htmlentities($row['updationDate']);?></p>
   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" value="<?php echo htmlentities($row['courseCode']);?>" required />
  </div>
  <div class="form-group">
    <label for="course_id">Course id  </label>
    <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course id" value="<?php echo htmlentities($row['course_id']);?>" required />
  </div>
 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" value="<?php echo htmlentities($row['courseName']);?>" required />
  </div>
<?php } ?>
 <button type="submit" name="submit" class="btn btn-outline-info">Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>


  <?php include('includes/footer.php');?>

        </div>
 
</body>
</html>
<?php } ?>

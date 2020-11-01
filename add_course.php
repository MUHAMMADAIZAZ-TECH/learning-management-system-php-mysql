<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0) 
    {   
header('location:index.php');
}
else{
    
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$pincode=$_SESSION['pincode'];
$session=$_POST['session'];
$dept=$_POST['department'];
$course=$_POST['course'];
$sem=$_POST['sem'];
if($_SESSION['type']=="Teacher"){
    $ret=mysqli_query($con,"insert into teacher_course(teacherRegno,pincode,session,department,course,semester) values('$regno','$pincode','$session','$dept','$course','$sem')");
     header("location:add_course.php");
    

}
else{ 
    if($_SESSION['type']=="Student"){
    $ret=mysqli_query($con,"insert into courseenrolls(studentRegno,pincode,session,department,course,semester) values('$regno','$pincode','$session','$dept','$course','$sem')");
    header("location:add_course.php");
   
}
}
if($ret)
{
$_SESSION['message']="Course added Successfully !!";
exit;
}
else
{
  $_SESSION['message']="Error : Not Enroll";
  exit;
}
header("location:add_course.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | Add Course </title>
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
                    <div >
                        <h1>Course Add </h1>
                    </div>
            
                    <div class="card">
                        <div  class="card-header " >
                     Course Add
                        </div>
                        <div style="color:green;align:center;"><?php echo htmlentities($_SESSION['message']);?><?php echo htmlentities($_SESSION['message']="");
                        unset($_SESSION['message']);?></div>
<?php 
 if($_SESSION['type']=="Teacher"){
    $sql=mysqli_query($con,"select * from teachers where Regno='".$_SESSION['login']."'");
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
    {
        $name=$row['Name'];
        $regno=$row['Regno'];
          }
}
else{ 
    if($_SESSION['type']=="Student"){
        $sql=mysqli_query($con,"select * from students where Regno='".$_SESSION['login']."'");
        while($row=mysqli_fetch_array($sql))
        {
            $name=$row['Name'];
            $regno=$row['Regno'];
             }
    }
    
}
?>

                        <div>
                       <form name="dept" method="post" enctype="multipart/form-data">
                       <div style="padding:10px 10px 10px 10px;">
   <div class="form-group">
    <label for="name">Name  </label>
    <input type="text" class="form-control" name="name" value="<?php echo $name;?>" readonly />
  </div>


 <div class="form-group">
    <label for="regno">Reg No   </label>
    <input type="text" class="form-control" name="regno" value="<?php echo $regno;?>"  placeholder="Reg no" readonly />
    
  </div> 
<div class="form-group">
    <label for="Department">Department  </label>
    <select class="form-control" name="department" required="required">
   <option value="">Select Depertment</option>   
   <?php 
$sql=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>" ><?php echo htmlentities($row['department']);?></option>
<?php } ?>

    </select> 
  </div> 
<div class="form-group">
    <label for="Session">Session  </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select session</option>   
   <?php 
$sql=mysqli_query($con,"select * from session");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>" ><?php echo htmlentities($row['session']);?></option>
<?php } ?>

    </select> 
  </div> 

<div class="form-group">
    <label for="Semester">Semester  </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>   
   <?php 
$sql=mysqli_query($con,"select * from semester ");
while($row=mysqli_fetch_array($sql))
{
    
?><option value="<?php echo htmlentities($row['id']);?>" ><?php echo htmlentities($row['semester']);?></option>
<?php  } ?>

    </select> 
  </div>


<div class="form-group">
    <label for="Course"> Select Course  </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <?php 
$sql=mysqli_query($con,"select * from course where pincode='".$_SESSION['pincode']."'");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['courseName']); ?></option>
<?php } ?>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div>




 <button type="submit" name="submit"  class="btn btn-outline-info">Enroll</button>
</div>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>




<?php include('includes/footer.php');?>
        </div>
  
<script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check.php",
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

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

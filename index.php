<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $_SESSION['regid']=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM user WHERE user_id='".$_SESSION['regid']."' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['login']=$_POST['regno'];
$_SESSION['type']=$num['type'];
if($_SESSION['type']=="Student"){
  $query1=mysqli_query($con,"SELECT * FROM students WHERE Regno='".$_SESSION['regid']."'");
  while($row=mysqli_fetch_array($query1))
  {
$_SESSION['name']=$row['Name'];
$_SESSION['regid']=$row['Regno'];
}
if(!empty($_SESSION['name'])){
  $extra="Myhome.php";//
  $uip=$_SERVER['REMOTE_ADDR'];
  $status=1;
  $log=mysqli_query($con,"insert into userlog(Regno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");
  exit();
}
else {if(empty($_SESSION['name'])){
  $extra="create-profile.php";//
  $uip=$_SERVER['REMOTE_ADDR'];
  $status=1;
  $log=mysqli_query($con,"insert into userlog(Regno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");
  exit();
}
}
  
}

else{
  if($_SESSION['type']=="Teacher"){

    $query2=mysqli_query($con,"SELECT * FROM teachers WHERE Regno='".$_SESSION['regid']."'");
  while($row=mysqli_fetch_array($query2))
  {
$_SESSION['name']=$row['Name'];
$_SESSION['regid']=$row['Regno'];
}
if(!empty($_SESSION['name'])){
  $extra="Myhome.php";//
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(Regno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else {if(empty($_SESSION['name'])){
  $extra="create-profile.php";//
  $uip=$_SERVER['REMOTE_ADDR'];
  $status=1;
  $log=mysqli_query($con,"insert into userlog(Regno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");
  exit();
}
}
 
  }
}
}
else{
  $_SESSION['message']="registration no or password incorrect";
  $extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
       <title>LMS | Learning Management System</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="style1.css">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="css/bootstrap.min.css" >
       <link rel="stylesheet" href="css/bootstrap.css" >
       <link rel="stylesheet" type="text/css" href="style1.css">
       <script src="js/jquery.min.js" ></script>
  <script src="js/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
      </head>

    <body class="b_pic">
    
            <div class="container-fluid">
            <div class="row">
	
		<div class="col-lg-8">
			<h2 style="margin-top:35px; color:#fff !important; font-family: Impact !important"  > LEARNING MANAGEMENT SYSTEM </h2>
		</div>
    <div class="col-lg-4"> 
                             
        <form name="student" method="post" id="loginform">
        <div class="form-row">
        <div class="form-group col-md-4">
                 <input type="username" name="regno" class="form-control"  placeholder="Reg No" required>
                       </div>
                       <div class="form-group col-md-4">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
              
                       </div>
                       <div class="form-group col-md-4">
                       <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log In </button>&nbsp;      </form> 
      	
                       </div>
                  
               </div>
         
            
	</div>
                        <div class="row">  
                     
                        <?php
           if(isset($_SESSION['message'])){
             echo "<div id='error_msg'>".$_SESSION['message']."</div>";
             unset($_SESSION['message']);
           }
           ?>              
            <div class="col-lg-2"></div>   
                           
                       <div class="col-lg-8 ">
                        <div class="text">
<h3 >Wellcome to the LMS abc university portal  </h3>  
<p>LMS abc university Portal is useful learning management system yet simple to understand. Class room teaching is geared up by e-learning portal called Learning Management Systems (LMS) which is easy to understand & use, reliable and able to accommodate academic needs.</p>    
<p>It offers to its instructors & students an extensive platform to learn and flourish. The best is brought online to make the learning process more efficient and effective. The online learning includes functionalities like courses management, file management, user management, user communication, online grading system, offline/online assignment submission and much more.</p>
<p>LMS provides a convenient access to important information related to the different subjects running through the semester. Faculty can create their own courses in which they can manage their course materials and related documents. An overview of course proceedings can be seen with a quick look and the whole semester activities like quiz, assignments and exams.</p>
<p>The system improves continuously with the valuable user’s feedback which is the backbone of the learning system. The innovative learning technology will improve the quality of the academia.</p>
</div>
</div>
<div class="col-lg-2"></div>   
                      
</div>
</div>
            
 <?php include('includes/footer.php');?>
                    
               
          
                  </body>
         </html>
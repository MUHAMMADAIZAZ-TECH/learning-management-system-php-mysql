<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="admin-home.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
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

    <title>Admin Login</title>
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
           
    <div class="row header">
    <div class="col-lg-10">
            <h2 style="font-size:40px; margin-top:35px; color:#fff !important; font-family: Impact !important "  > LEARNING MANAGEMENT SYSTEM ADMIN PANEL </h2>
        </div>
    <div class="col-lg-2">
            </div>
    </div>
     <div class="row ">
                <div class="col-lg-12 menucolor">
                <h3 style="color:aliceblue; !important; font-family: Impact !important"  >
                    PLEASE ENTER TO LOGIN</h3>
                          <hr color="aliceblue">
               
                     </div>
                    </div>
               <div class="row">
                   <div class="col-lg-12 menucolor">
                         <span style="color:aliceblue;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
           
                   </div>
               </div>         
           
            <div class="row b_pic">
          
                <div class="col-lg-6 contentarea">
                     <form name="admin" method="post" id="loginform">
                     
                     <label>Enter Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-outline-info">Log Me In </button>
                         </form>
                </div>
               
                <div class="col-lg-6">
                               <div class="text">
<h3 >Wellcome to the LMS abc university portal  </h3>  
<p>LMS abc university Portal is useful learning management system yet simple to understand. Class room teaching is geared up by e-learning portal called Learning Management Systems (LMS) which is easy to understand & use, reliable and able to accommodate academic needs.</p>    
<p>It offers to its instructors & students an extensive platform to learn and flourish. The best is brought online to make the learning process more efficient and effective. The online learning includes functionalities like courses management, file management, user management, user communication, online grading system, offline/online assignment submission and much more.</p>
<p>LMS provides a convenient access to important information related to the different subjects running through the semester. Faculty can create their own courses in which they can manage their course materials and related documents. An overview of course proceedings can be seen with a quick look and the whole semester activities like quiz, assignments and exams.</p>
<p>The system improves continuously with the valuable user’s feedback which is the backbone of the learning system. The innovative learning technology will improve the quality of the academia.</p>
</div>
                                    </div>

            </div>
        

    <?php include('includes/footer.php');?>
    </div>
 
</body>
</html>

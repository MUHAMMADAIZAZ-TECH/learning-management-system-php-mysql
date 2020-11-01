<?php
session_start();
error_reporting(0);
include("includes/config.php");

if(isset($_POST['submit']))
{
    $user_id=$_SESSION['login'];
    $username=$_POST['username'];
    $photo=$_FILES['photo']['name'];
    $email=$_POST['email'];
    $add=$_POST['address'];
    $phno=$_POST['phoneno'];
    $gender=$_POST['gender'];
   if($_SESSION['type']=="Student"){
  
move_uploaded_file($_FILES["photo"]["tmp_name"],"admin/photo/".$_FILES["photo"]["name"]);
 echo $photo;
       $query1=mysqli_query($con,"insert into students (Regno,studentPhoto,Name,email,address,phoneno,gender) values ('$user_id','$photo','$username','$email','$add','$phno','$gender')");
     
      if($query1){
        $_SESSION['message']="Profile Successfully created";
       $extra="site-news.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
        
      }
      else{
        $_SESSION['message']="Profile not created";
        
      }
      }
      else{
        if($_SESSION['type']=="Teacher"){
         
move_uploaded_file($_FILES["photo"]["tmp_name"],"admin/photo/".$_FILES["photo"]["name"]);
  
            $query2=mysqli_query($con,"insert into teachers (Regno,teacherPhoto,Name,email,address,phoneno,gender) values ('$user_id','$photo','$username','$email','$add','$phno','$gender')");  
            echo $query2;
            if($query2){
              $_SESSION['message']="Profile Successfully created";
             $extra="site-news.php";
              $host  = $_SERVER['HTTP_HOST'];
              $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
              header("location:http://$host$uri/$extra");
              exit();
              
            }
            else{
              $_SESSION['message']="Profile not created";
              
            }
        }
        }
 }

?>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
       <title>LMS | Create profile</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     
       <link rel="stylesheet" href="css/bootstrap.min.css" >
       <link rel="stylesheet" href="css/bootstrap.css" >
       <link rel="stylesheet" type="text/css" href="style1.css">
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


      </head>

    <body class="b_pic">
    
            <div class="container-fluid">
            <div class="row ">
			<div class="col-lg-10">
			<h2 style="margin-top:35px; color:#fff !important; font-family: Impact !important"  > LEARNING MANAGEMENT SYSTEM </h2>
		</div>
    <div class="col-lg-3">   
        	</div>
  </div>
   <div class="row">
                      <div class="col-lg-12 ">
                    <h3 style="color:aliceblue; !important; font-family: Impact !important"  >
                    CREATE PROFILE</h3>
                          <hr color="aliceblue">
                     </div>
                    </div>
                        <div class="row "> 
                                <div class="col-lg-1"></div>
                            <div class="col-lg-10 contentarea">              
                            <form action="create-profile.php" method="post" >
                                    
           <?php
           if(isset($_SESSION['message'])){
             echo "<div id='error_msg'>".$_SESSION['message']."</div>";
             unset($_SESSION['message']);
           }
           ?>  
           <div class="form-row">
<div class="form-group  col-md-6">
<img id="blah" src="admin/studentphoto/noimage.png"  width="200" height="200" alt="your image" />
    
    <label for="photo">Upload Profile Picture  </label>
    <input type="file" name="photo"  onchange="readURL(this);" />
   </div>
    <div class="form-group col-md-6">
    
    <label for="user_name" >User name</label>
<input type="user_name" class="form-control" name="username" placeholder="user_name">
<label for="inputAddress" >Address</label>
<input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
<label for="inputEmail4" >Email</label>
<input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
<label for="phone_no">phone_no</label>
<input type="phone_no" class="form-control" name="phoneno" placeholder="phone_no">                                                                                                                                                                

     </div>                               
  </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-2">
                                             <select id="gender" name="gender" class="form-control" >
                                                <option selected>male</option>
                                                <option>female</option>
                                              </select>   
                                          </div>
                                       <div class="form-group col-md-4">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" id="gridCheck">
                                           <label class="form-check-label" for="gridCheck" >
                                             Check me out
                                           </label>
                                         </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                 
                                       <button type="reset" class="btn btn-outline-primary" name="reset"> reset</button>
                                       <button type="submit" class="btn btn-outline-info" name="submit">Create</button>
                                       </div>
                                   
                                       </div>
                                      </form>

                                </div>
                                <div class="col-lg-1"></div>
                               </div>


 <?php include('includes/footer.php');?>
                       
                </div>
            
          <script>
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
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
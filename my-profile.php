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
  $name=$_POST['name'];
$photo=$_FILES["photo"]["name"];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phoneno'];
  if($_SESSION['type']=="Student"){

move_uploaded_file($_FILES["photo"]["tmp_name"],"admin/photo/".$_FILES["photo"]["name"]);
$ret=mysqli_query($con,"update students set Name='$name',studentPhoto='$photo' email='$email' ,address='$address',phoneno='$phone' where Regno='".$_SESSION['login']."'");
if($ret)
{
$_SESSION['message']="Record updated Successfully !!";
}
else
{
  $_SESSION['message']="Error : Record not update";
}
}
else{ if($_SESSION['type']=="Teacher"){
  $photo=$_FILES["photo"]["name"];
  move_uploaded_file($_FILES["photo"]["tmp_name"],"admin/photo/".$_FILES["photo"]["name"]);
  $ret=mysqli_query($con,"update teachers set Name='$name',teacherPhoto='$photo',email='$email' ,address='$address',phoneno='$phone' where Regno='".$_SESSION['login']."'");
  if($ret)
  {
  $_SESSION['message']="Record updated Successfully !!";
  }
  else
  {
    $_SESSION['message']="Error : Record not update";
  }
  }
  
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
    <title>LMS | My Profile</title>
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
  <h1 >my profile  </h1>
              
                        <div class="card">
                        <div  class="card-header " >
                          My Profile Settings
                        </div>
                        <div style="color:green;align:center;"><?php echo htmlentities($_SESSION['message']);?><?php echo htmlentities($_SESSION['message']="");?></div>
<?php  
if($_SESSION['type']=="Student"){
 
$sql=mysqli_query($con,"select * from students where Regno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
  $name=$row['Name'];
  $regno=$row['Regno'];
  $photo=$row['studentPhoto'];
  $email=$row['email'];
  $address=$row['address'];
  $phone=$row['phoneno'];
  $gender=$row['gender'];
            
} 
        }
        else{ 
          if($_SESSION['type']=="Teacher"){
            $sql=mysqli_query($con,"select * from teachers where Regno='".$_SESSION['login']."'");
            $cnt=1;
            while($row=mysqli_fetch_array($sql))
            { 
            $name=$row['Name'];
            $regno=$row['Regno'];          
            $photo=$row['teacherPhoto'];
            $email=$row['email'];
            $address=$row['address'];
            $phone=$row['phoneno'];
            $gender=$row['gender'];
            }
          }
        }
        ?>

                        <div class="card-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
                      <div class="form-row" style="padding:10px 10px 10px 10px;">
   <div class="form-group col-lg-6">
    <label for="name">Name  </label>
    <input type="text" class="form-control" name="name" value="<?php echo $name;?>"  />
    <label for="regno"> Reg No   </label>
    <input type="text" class="form-control" name="regno" value="<?php echo $regno;?>"  placeholder="Reg no" readonly />
    <label for="name">Email  </label>
    <input type="text" class="form-control" name="email" value="<?php echo $email;?>"  />
    <label for="name">Address  </label>
    <input type="text" class="form-control" name="address" value="<?php echo $address;?>"  />
    <label for="name">Phone no </label>
    <input type="text" class="form-control" name="phoneno" value="<?php echo $phone;?>"  />
 <button type="submit" name="submit" id="submit" class="btn btn-outline-info">Update</button>
  </div>  
  <div class="form-group col-lg-6">
    <label for="photo"> Photo  </label>
   <?php if($photo==""){ ?>
    <img id="blah" src="admin/photo/noimage.png"  width="200" height="200" alt="your image" />
 <?php } else {?>
   <img id="blah" src="admin/photo/<?php echo $photo;?>" width="200" height="200">
   <?php } ?>
    <label for="Photo">Upload New Photo  </label>
    <input type="file" class="form-control"  onchange="readURL(this);" name="photo"  value="<?php echo $photo;?>" />
       </div>  
   
</div>  
</form>
                            </div>
                            </div>
              
                    </div>
                
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
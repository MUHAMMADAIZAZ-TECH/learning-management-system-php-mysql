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
  $regid=intval($_GET['id']);
$name=$_POST['name'];
$photo=$_FILES["photo"]["name"];
$email=$_POST['email'];
$address=$_POST['Address'];
$pno=$_POST['phoneno'];
if($_SESSION['type']=="Student"){

  move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);
  $ret=mysqli_query($con,"update students set Name='$name',studentPhoto='$photo' ,email='$email',address='$address',phoneno='$pno' where Regno='$regid'");
  if($ret)
  {
  $_SESSION['msg']="Student Record updated Successfully !!";
  }
  else
  {
    $_SESSION['msg']="Error : Student Record not update";
  }
}
else{
  if($_SESSION['type']=="Teacher"){
    move_uploaded_file($_FILES["photo"]["tmp_name"],"teacherphoto/".$_FILES["photo"]["name"]);
    $ret=mysqli_query($con,"update teachers set Name='$name',teacherPhoto='$photo',email='$email',address='$address',phoneno='$pno'  where Regno='$regid'");
    if($ret)
    {
    $_SESSION['msg']="teacher Record updated Successfully !!";
    }
    else
    {
      $_SESSION['msg']="Error : teacher Record not update";
    }
    
  }

}
}
if($_SESSION['type']=="Student")
      {
        $regid=intval($_GET['id']);
        $sql=mysqli_query($con,"select * from students where Regno='$regid'");

      }
      else{
          if($_SESSION['type']=="Teacher"){
            $regid=intval($_GET['id']);
            $sql=mysqli_query($con,"select * from teachers where Regno='$regid'");
    
          }
      } 
    
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit <?php echo $_SESSION['type']; ?> Profile</title>
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
                  <div><h1  >Mannage <?php echo $_SESSION['type']; ?> profile
                          </h1></div>  
                   
                          <div class="card">
                        <div  class="card-header">
                         Mannage <?php echo $_SESSION['type']; ?> profile
                        </div >
                        <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></div>
<?php 
$regid=intval($_GET['id']);

$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div  class="card-body">
                       <form name="pro_edit" method="post" enctype="multipart/form-data">
  

 <div class="form-group">
    <label for="regno"><?php echo $_SESSION['type']; ?> Reg No   </label>
    <input type="text" class="form-control" id="regno" name="regno" value="<?php echo $row['Regno'];}?>" placeholder="<?php echo $_SESSION['type']; Regno ?> " readonly />
    
  </div>
  <div class="form-group">
    <label for="name"><?php echo $_SESSION['type']; ?>Name  </label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['Name'];?>"  />
  </div> 
  <?php if($_SESSION['type']=="Teacher"){?>
    <div class="form-group">
    <label for="teacherphoto">Teacher Photo  </label>
   <?php if($row['teacherPhoto']==""){ ?>
   <img src="teacherphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="teacherphoto/<?php echo htmlentities($row['teacherPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
<div class="form-group">
    <label for="teacherphoto">Upload New Photo  </label>
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['teacherPhoto']);?>" />
  </div>
 <?php }
 else{?>
 
<div class="form-group">
    <label for="studentPhoto">Student Photo  </label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
<div class="form-group">
    <label for="studentphoto">Upload New Photo  </label>
    
    <input type="file" class="form-control" name="photo"  value="<?php echo htmlentities($row['studentPhoto']);?>" />
  </div>

  <?php } ?>
  
  <div class="form-group">
    <label for="name">email  </label>
    <input type="text" class="form-control" name="email" value="<?php echo htmlentities($row['email']);?>"  />
  </div> <div class="form-group">
    <label for="name">Address  </label>
    <input type="text" class="form-control" name="Address" value="<?php echo htmlentities($row['address']);?>"  />
  </div> <div class="form-group">
    <label for="name">phone no </label>
    <input type="text" class="form-control" name="phoneno" value="<?php echo htmlentities($row['phoneno']);?>"  />
  </div>
 <button type="submit" name="submit" id="submit" class="btn btn-outline-info">Update</button>
</form>
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
  
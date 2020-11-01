
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0) 
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
    if($_SESSION['type']=="Student" or $_SESSION['type']=="Teacher"){
  
$sql=mysqli_query($con,"SELECT * FROM  course where pincode='".trim($_POST['pincode'])."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$_SESSION['pincode']=$_POST['pincode'];
header("location:add_course.php");
exit;
}
else
{
$_SESSION['message']="Error :Wrong Pincode. Please Enter a Valid Pincode !!";
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
    <title>LMS | Pincode Verification</title>
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
  <div class="col-lg-6">
      <div>
  <h1 >Pincode Verification</h1>
        </div>         
                       <div class="card">
                        <div  class="card-header">
                           Pincode Verification
                        </div>
                        <div style="color:green;align:center;"><?php echo $_SESSION['msg'];?><?php echo htmlentities($_SESSION['msg']="");?></div>


                        <div class="card-body">
                       <form name="pincodeverify" method="post">
                       <div class="form-row" style="padding:10px 10px 10px 10px;">
   <div class="form-group col-lg-6">
    <label for="pincode">Enter Pincode</label>
    <input type="password" class="form-control" name="pincode" placeholder="Pincode" required />
        </div >
    <div class="form-group col-lg-6" style="margin:5px 5px 5px 5px;">
  <button type="submit" name="submit" class="btn btn-outline-info">Verify</button>
                           </div>
   


</div>
</form>
                            </div>
                            </div>
                    </div>
         <div class="col-lg-3">
        </div>         
                </div>
        

    
  <?php include('includes/footer.php');?>
    <div>


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

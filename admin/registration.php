<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
    
if(isset($_POST['submit']))
{
$id=$_POST['regno'];
$password=md5($_POST['password']);
$type=$_SESSION['type'];
$sql="insert into user(user_id,password,type) values('$id','$password','$type')";
$ret=mysqli_query($con,$sql);
if($ret)
{
$_SESSION['msg']=" Registered Successfully !!";
header("location:registration.php");
exit;
}
else
{
  $_SESSION['msg']="Error : Not Register";
  header("location:registration.php");
  exit;
  
}

}
if($_GET['type']=="Student")
{
  $_SESSION['type']="Student";
}
else{
    if($_GET['type']=="Teacher"){
        $_SESSION['type']="Teacher";
    }
}
if(!empty($_POST["regno"])) {
    $regno= $_POST["regno"];
    
        $result =mysqli_query($con,"SELECT user_id FROM user WHERE user_id='$regno'");
        $count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> This Regno Already Registered.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 exit;
} 
exit;
}
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | <?php echo $_SESSION['type']; ?> Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
  <!-- LOGO HEADER END-->

        <div class="container-fluid ">
          <?php include('includes/header.php');?>
  
                <div class="row" >
                    <?php include('includes/sidebar.php');?>
       
                    <div class="col-lg-9">
                      <h1 ><?php echo $_SESSION['type'];?> Registration  </h1>

                      <div class="card">
                        <div class="card-header">
                            <?php $_SESSION['type']?> Registration
                        </div>
                        <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></div>
                        <div class="card-body">
                       <form name="dept" method="post">
                       <div class="form-group">
    <label for="regno"> <?php echo $_SESSION['type'];?> id  </label>
    <input type="text" class="form-control" id="regno" name="regno" onBlur="userAvailability()" placeholder="<?php echo $_SESSION['type'];?> id " required />
     <span id="user-availability-status1" style="font-size:12px;">
  </div>


<div class="form-group">
    <label for="password"><?php echo $_SESSION['type']; ?> Password  </label>
    <input type="password" class="form-control" value="lms@123" name="password" readonly />
  </div>   
 <button type="submit" name="submit" id="submit" class="btn btn-outline-info">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>

 <?php include('includes/footer.php');?>
        </div>
<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "registration.php",
data:'regno='+$("#regno").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


</body>
</html>
<?php } ?>

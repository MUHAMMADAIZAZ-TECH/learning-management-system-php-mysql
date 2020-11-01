<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0) 
    {   
header('location:index.php');
}
else{


?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/2000/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | My home</title>
  
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
                  <div class="row">
                  <?php 
                 include('includes/menubar.php');

     
         ?>
    <div class="col-lg-9 " >
   <div> <h1 >Site News  </h1></div>
   
    <div id="display_comment">
                        
                        </div>
                
    
   </div>
       
</div>




<?php include('includes/footer.php');?>
        </div>
  
        <script>
$(document).ready(function(){

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

});
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

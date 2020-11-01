<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
 function fill_course($con)  
 {   
     
    if($_SESSION['type']=="Student"){
        $output = '';  
        $sql = "select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,courseenrolls.enrollDate as edate ,semester.semester as sem from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department join semester on semester.id=courseenrolls.semester  where courseenrolls.studentRegno='".$_SESSION['login']."'"; 
        $result = mysqli_query($con, $sql);  
        while($row = mysqli_fetch_array($result))  
        {  
             $output .= '<a href="#"><li class="li_id" value="'.$row["cid"].'">'.$row["courname"].'</li></a>';  
               
            }    
     }
      else{ 
          if($_SESSION['type']=="Teacher"){
        $output = '';  
        $sql ="select teacher_course.course as cid, course.courseName as courname,session.session as session,department.department as dept,teacher_course.enrollDate as edate ,semester.semester as sem from teacher_course join course on course.id=teacher_course.course join session on session.id=teacher_course.session join department on department.id=teacher_course.department join semester on semester.id=teacher_course.semester  where teacher_course.teacherRegno='".$_SESSION['login']."'";
        $result = mysqli_query($con, $sql);  
        while($row = mysqli_fetch_array($result))  
        {  
             $output .= '<a href="#"><li class="li_id" value="'.$row["cid"].'">'.$row["courname"].'</li></a>';  
        }    
     }
    }
      return $output; 
      return $output;  
 }  
 function fill_lectures($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM lectures";  
      $result = mysqli_query($con, $sql);  
      if($result=''){
      while($row = mysqli_fetch_array($result))  
      {  
          
           $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["lecture"].'';  
           $output .= '<div style="float:right;">'; ?>
           <a href="admin/lectures/<?php echo $row["lecture"] ?> " >
           click here to download  </a><h6> at <?php echo $row ["time"];  ?></h6></div>
           <h6>uploaded by   <?php echo $row ["uploadedby"];?>  </h6><?php 
           $output .=     '</div>';  
           $output .=     '</div>';  
      }  
    }
      return $output;  
 }  
 if(isset($_REQUEST['del']))
      {
        
          $sql = "SELECT * FROM lectures WHERE id='".$_GET['id']."'";
         $result=mysqli_query($con,$sql);
         while($row = mysqli_fetch_array($result)){
$filename=$row['lecture'];
if(!empty($filename)){

    unlink("admin/lectures/".$filename);
    mysqli_query($con,"delete from lectures where id = '".$_GET['id']."'");
          
    header("location:lecture.php");
     exit;
}
else {
    echo "<script>alert('unable to delete file'); </script>";
}
         }
                
      }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0" >
       <title>LMS | Lectures</title>
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
<div class="col-lg-3">
<nav class="d-none d-md-block bg-light contentarea sidebar" >
<div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Navigation <span class="sr-only">(current)</span>
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="Myhome.php">
                <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  My home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  My Courses
                </a>
                 <div id="submenu" >
                    <ul style="list-style:none;">
            <?php echo fill_course($con);?>  
            <?php 
    if($_SESSION['type']=="Teacher"){?>
        <button type="button" class="list-group-item list-group-item-action">Upload new file</button>
        <form enctype="multipart/form-data" method="POST" action="load_data.php">
upload file: <input type="file" name="file" >
<input type="submit" name="upload" value="upload" onclick="return ness();">
</form>
<script type="text/javascript">
function ness(){
alert("file succesfully uploaded");
}
</script>

   <?php }
       ?>
             </ul>
                  </div>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="pincode-verification.php">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                  Enrollments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="my-profile.php">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 My Profile Settings
                </a>
              </li>
            </ul>
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link" href="Myhome.php">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Site News
                </a>
              </li>
             
            </ul>
         
         
          </div>
        </nav>   </div>
       
<div class="col-lg-9" >
<div><h1 >Lectures </h1></div>
  <div id="show_lectures">                 
  <?php echo fill_lectures($con);?>  
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
<script>  
 $(document).ready(function(){  
      $('.li_id').click(function(){  
           var course_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{course_id:course_id},  
                success:function(data){  
                     $('#show_lectures').html(data);    
                }  
           });  
      });  
 });  
 </script>  
 <script>
$(document).ready(function(){
  $("#submenu").hide();
    $("#link").click(function(){
       $("#submenu").toggle();
       });

});
</script>
<?php } ?>
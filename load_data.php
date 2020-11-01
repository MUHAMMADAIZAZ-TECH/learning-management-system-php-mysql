<?php
session_start();  
include('includes/config.php');
error_reporting(0);

 if(isset($_POST["course_id"]))  
 {
   
  $course_id=mysql_real_escape_string($_POST['course_id']);
$_SESSION['course_id']=$course_id;
      if($_POST["course_id"] != '')  
      {  
           $sql = "SELECT * FROM lectures WHERE course_id = '".$_POST["course_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM lectures";  
      }  
      $result = mysqli_query($con, $sql);
  
      while($row = mysqli_fetch_array($result))  
      { ?> 
        
          <div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">
          <?php echo $row ["lecture"];?>  
          <div style="float:right;">
          <a href="admin/lectures/<?php echo $row["lecture"] ?> " >
          click here to download  </a><h6> at <?php echo $row ["time"];  ?></h6></div>
          <h6>uploaded by   <?php echo $row ["uploadedby"];?>  </h6>
         <?php if($_SESSION['type']=="Teacher"){?>
        
          <a href="lecture.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" >
          <button type="button" name="dlt_file" class="btn btn-outline-danger">delete</button></a>
        <?php }?> 
        
        </div> 
    <?php  }  
   

 }
 if(isset($_POST["cours_id"]))  
 {
   
  $course_id=mysql_real_escape_string($_POST['cours_id']);
$_SESSION['cours_id']=$course_id;
      if($_POST["cours_id"] != '')  
      {  
           $sql = "SELECT * FROM course_announcement WHERE id = '".$_POST["cours_id"]."' ORDER BY id DESC ";  
      }  
      else  
      {  
           $sql = "SELECT * FROM course_announcement ORDER BY id DESC ";  
      }  
      $result = mysqli_query($con, $sql);
  
      while($row = mysqli_fetch_array($result))  
      {  
        ?>    
             <div class="card">
              <div  class="card-header">
             by  <b> <?php echo $row ["teachername"];?> </b> 
        on <i><?php echo $row ["time"];  ?></i></div>
          <div class="card-text"><p>    
          <?php echo $row ["announcement"];?> </p> </div>
         <?php 
         if($_SESSION['type']=="Teacher"){?>
          <div align="right">   
          <a href="announcements.php?id=<?php echo $row['a_id']?>&delete=delete" onClick="return confirm('Are you sure you want to delete?')" >
          <button type="button" name="dlt_file" class="btn btn-outline-danger">delete</button></a>
          </div>
         <?php } 
         ?>
              
        </div> 
    <?php
      }  
   
 }  
    if(isset($_POST["upload"])){

    
      $teachername=$_SESSION['name'];
      $file=$_FILES["file"]["name"];
      $tmp_name=$_FILES["file"]["tmp_name"];
      $path="admin/lectures/".$file;
      $file1=explode(".",$file);
      $ext=$file1[1];
      $allowed=array("doc","docx","pdf","ppt");
      if(in_array($ext,$allowed)){
        
        move_uploaded_file($tmp_name,$path);
        $sql="insert into lectures (course_id,lecture,uploadedby) values(".$_SESSION['course_id'].",'$file','$teachername')"; 
        mysqli_query($con, $sql);
        header("location:lecture.php");
        exit;
      }
   

    
  } 
  if(isset($_POST["ann"])){
    $text=mysql_real_escape_string($_POST['text']);
    $teachername=$_SESSION['name'];    
       $sql="insert into course_announcement (id,announcement,teachername) values(".$_SESSION['cours_id'].",'$text','$teachername')"; 
      mysqli_query($con, $sql);
      header("location:announcements.php");
      exit; 
}
  
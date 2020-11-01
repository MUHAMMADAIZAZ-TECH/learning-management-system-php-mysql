<?php 
include('includes/config.php');
session_start();
if(!empty($_POST["cid"])) {
        $cid= $_SESSION["pincode"]; 
        if($_SESSION['type']=="Student"){
            $result =mysqli_query($con,"SELECT * FROM courseenrolls WHERE pincode='$cid' and studentRegno='".$_SESSION['login']."'");
        }
        else{ 
            if($_SESSION['type']=="Teacher"){
                $result =mysqli_query($con,"SELECT * FROM teacher_course WHERE pincode='$cid' and teacherRegno='".$_SESSION['regid']."'");
                }	
        }
            $count=mysqli_num_rows($result);
    if($count>0)
    {
    echo "<span style='color:red'> Already Applied for this course.</span>";
     echo "<script>$('#submit').prop('disabled',true);</script>";
     exit;
    } 
    else{
    echo "<span style='color:green'> You can Apply for this course.</span>";
     echo "<script>$('#submit').prop('disabled',true);</script>";
        
    }
    exit;
    }
   ?>
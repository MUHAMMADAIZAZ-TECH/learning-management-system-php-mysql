<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
 function fill_course($con,$semester_id)  
 {  
      $output = '';  
      $sql = "SELECT * FROM course where course_id='$semester_id'";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<a class="nav-link"  href="#" ><li class="li_id" value="'.$row["id"].'">'.$row["courseName"].'</li></a>';  
      }  
      
      return $output;  
 }                  
      
      if(isset($_REQUEST['delete']))
      {
        $id = (int)$_GET['id'];
        if(!empty($id)){
            mysqli_query($con,"DELETE from course_announcement WHERE a_id= $id");
          
            header("location:announcements.php");
             exit;  
        }
        else{
            echo "<script>alert('unable to delete this field'); </script>";
        }
            
      }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0" >
       <title>LMS | ADMIN Announcments</title>
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
    <div class="container-fluid">
        <?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
   

<div class="row">

   <div class="col-lg-3 sidecolor">
                   <ul class="sidebar navbar-nav">
                   <li class="nav-item active">
          <a class="nav-link" href="#">
          NAVIGATION </a>
        </li>
                         <li class="nav-item active">
          <a class="nav-link" href="admin-home.php">
          MY HOME </a>
        </li>
   
       
        <li>
            <ul  style="list-style: none;">
        <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapseOne"  aria-expanded="false" aria-controls="collapseOne" >
        semester 1
        </li>
    <div id="collapseOne" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;" >
      <?php echo fill_course($con,'1');?>
                            
      </ul>
      </div>
    </div>
        <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        semester 2
        </li>
    <div id="collapseTwo" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
     <?php echo fill_course($con,'2');?>                   
     </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
        semester 3
        </li>
    <div id="collapsethree" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'3');?>
                            
      </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
        semester 4
        </li>
    <div id="collapsefour" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'4');?>
                            
      </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
        semester 5
        </li>
    <div id="collapsefive" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'5');?>
                            
      </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
        semester 6
        </li>
    <div id="collapsesix" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'6');?>
                            
      </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
        semester 7
        </li>
    <div id="collapseseven" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'7');?>
                            
      </ul>
      </div>
    </div>
    <li class="collapsed nav-link " data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
        semester 8
        </li>
    <div id="collapseeight" class="collapse">
      <div class="card-body">
      <ul style="list-style: none;">
      <?php echo fill_course($con,'8');?>
                            
      </ul>
      
      </div>
    </div>
    
    </ul>
    
        </li>
      </ul>

                  
                 
    
       
</div>
    <div class="col-lg-9">
       <div>    <h1 >Announcements </h1></div>
     <div>             
    <form action="load_datat.php" method="post">
               <div class="form-group">
               <label for="announcement">Create new announcement:</label>
              <textarea class="form-control" rows="5" id="announcement" name="text"></textarea>
               </div>
             <button type="submit" name="ann" class="btn btn-outline-info" >Create</button>
              </form> 
              </div>   
              <div id="show_announcement"></div>
   </div>
       
               
          
            
</div>
<?php include('includes/footer.php');?>
</div>

    </body>
</html>
<script>  
 $(document).ready(function(){  
      $('.li_id').click(function(){  
           var cours_id = $(this).val();  
           $.ajax({  
                url:"load_datat.php",  
                method:"POST",  
                data:{cours_id:cours_id},  
                success:function(data){  
                     $('#show_announcement').html(data);  
                }  
           });  
      });  
 });  
 </script>  
<?php } ?>
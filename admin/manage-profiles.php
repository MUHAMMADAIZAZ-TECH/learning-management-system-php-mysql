<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from students where Regno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Student record deleted !!";
      }
      if(isset($_GET['delt']))
      {
              mysqli_query($con,"delete from teachers where Regno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="teacher record deleted !!";
      }
      if($_GET['type']=="Student")
      {
          $sql=mysqli_query($con,"select * from students");
             
        $_SESSION['type']="Student";
      }
      else{
          if($_GET['type']=="Teacher"){
              $sql=mysqli_query($con,"select * from teachers");
            
              $_SESSION['type']="Teacher";
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
    <title>Admin | Manage <?php echo $_SESSION['type']; ?></title>
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

    
        <div class="container-fluid">
          <?php include('includes/header.php');?>
 
                <div class="row" >
                  <?php include('includes/sidebar.php');?>
       
                <div class="col-lg-9">
               <div>   <h1 >Manage <?php echo $_SESSION['type']; ?>  </h1> <div>
   <div style="color:red;align:center;" ><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></div>
              
                      <div class="card">
                        <div class="card-header">
                                Manage <?php echo $_SESSION['type']; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Reg No </th>
 <th><?php echo $_SESSION['type']; ?> Name </th>
                                            <th> address </th>
                                            <th> email </th>
                                            <th> phone no </th>
                                             <th>Reg Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
    {
    ?>
    
    
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($row['Regno']);?></td>
                                            <td><?php echo htmlentities($row['Name']);?></td>
                                              <td><?php echo htmlentities($row['address']);?></td>
                                                <td><?php echo htmlentities($row['email']);?></td>
                                                <td><?php echo htmlentities($row['phoneno']);?></td>
                                                <td><?php echo htmlentities($row['creationdate']);?></td>
                                                <td>
                                                <a href="edit-profile.php?id=<?php echo htmlentities($row['Regno']);?>">
    <button class="btn btn-outline-primary">Edit</button> </a>                                        
    <a href="manage-profiles.php?id=<?php echo htmlentities($row['Regno']);?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                <button class="btn btn-outline-danger">Delete</button>
    </a>
                                            </td>
                                            </tr>
    <?php 
    $cnt++;
    }
 ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

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
  $department=$_POST['department'];
$ret=mysqli_query($con,"insert into department(department) values('$department')");
if($ret)
{
$_SESSION['message']="Department Created Successfully !!";
}
else
{
  $_SESSION['message']="Error : Department not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from department where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Department deleted !!";
      }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LMS | ADMIN department</title>
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

               <div class="row">
               <?php include('includes/sidebar.php');?>
       
                     <div class="col-lg-9">
                 <div> <h1 >Department  </h1> </div>   
                
                    <div class="card">
                        <div  class="card-header">
                            Department 
                        </div>
                        <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['message']);?><?php echo htmlentities($_SESSION['message']="");?></div>


                        <div class="card-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="department">Add Department  </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="department" required />
  </div>
 <button type="submit" name="submit" class="btn btn-outline-info">ADD</button>
</form>
                            </div>
                            </div>
                            <div style="color:green;align:center;" ><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></div>
                  
                  <div class="card">
                          <div  class="card-header">
                                       Manage Department
                          </div>
                      
                          <div  class="card-body">
                              <div class="table-responsive table-bordered">
                                  <table class="table">
                                      <thead class="thead-dark">
                                          <tr>
                                              <th>#</th>
                                              <th>department</th>
                                              <th>Creation Date</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
  <?php
  $sql=mysqli_query($con,"select * from department");
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
  
  
                                          <tr>
                                              <td><?php echo $cnt;?></td>
                                              <td><?php echo htmlentities($row['department']);?></td>
                                              <td><?php echo htmlentities($row['creationDate']);?></td>
                                              <td>
    <a href="department.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                              <button class="btn btn-outline-danger">Delete</button>
  </a>
                                              </td>
                                          </tr>
  <?php 
  $cnt++;
  } ?>
  
                                          
                                      </tbody>
                                  </table>
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


	<div class="row shadow-lg p-3 mb-5 rounded">
		
		<div class="col-lg-10">
			<h2 style=" font-size:40px; margin-top:35px; color:#fff !important; font-family: Impact !important"  > LEARNING MANAGEMENT SYSTEM </h2>
		</div>
    <div class="col-lg-2">

	 <li class="dropdown " style="list-style: none;">
	 <?php  
if($_SESSION['type']=="Student"){
 
$sql=mysqli_query($con,"select * from students where Regno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
  $photo=$row['studentPhoto'];
  $name=$row['Name'];
            
} 
        }
        else{ 
          if($_SESSION['type']=="Teacher"){
            $sql=mysqli_query($con,"select * from teachers where Regno='".$_SESSION['login']."'");
            $cnt=1;
            while($row=mysqli_fetch_array($sql))
            { 
			$photo=$row['teacherPhoto'];
			$name=$row['Name'];
  
            }
          }
        }
        ?>
            <a href="#" class="nav-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<?php if($photo==""){ ?>
    <img id="blah" src="admin/photo/noimage.png"  width="200" height="200" alt="your image" />
 <?php } else {?>
	<img src="admin/photo/<?php echo $photo;?>" width="40" height="40"class="user-image" alt="User Image">
              <?php } ?>
             </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="admin/photo/<?php echo $photo;?>" height="100" width="100" class="img-circle" alt="User Image">

                <p>
                  Wellcome
                  <small>Member of Portal</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change-password.php" class="btn btn-default btn-flat">Profile Settings</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">log out</a>
                </div>
              </li>
            </ul>
          </li>
			</div>
	</div>
	
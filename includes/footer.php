<div class="row shadow-lg p-3 mb-5 rounded">
   <div class="col-lg-4">
  </div>
  
   <div class="col-lg-4">
       <p style="color:#fff;"><a>All Rights Reserved by ABC University</a></p>
  </div>
  <div class="col-lg-4">
  <?php 
	if($_SESSION['login']!="")
{ ?>
	<strong>Welcome: </strong><?php echo htmlentities($_SESSION['name']);?>
                    &nbsp;&nbsp;

                  <br>  <strong>Last Login:<?php 
        $ret=mysqli_query($con,"SELECT  * from userlog where Regno='".$_SESSION["login"]."' order by id desc limit 1,1");
                    $row=mysqli_fetch_array($ret);
                    ?> at <?php echo $row['loginTime'];?></strong>
			

  <?php }?>
  </div>
  
                              </div>
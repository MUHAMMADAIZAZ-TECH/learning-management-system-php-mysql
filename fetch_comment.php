<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=lms', 'root', '');

$query = "
SELECT * FROM tbl_comment 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="card">
  <div class="card-header ">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <p><div class="card-text">'.$row["comment"].'</div></p>
 </div>
 ';
}

echo $output;

?>


<?php
$conn = new mysqli("localhost","root","","itpromo_track");

$sql="UPDATE notify SET status=1 WHERE status=0";	
$result=mysqli_query($conn, $sql);

$sql="select * from notify ORDER BY id DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["subject"] . "</div>" . 
	"<div class='notification-comment'>" . $row["comment"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itpromo_track";

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {
    die("Connetion failed:" . mysqli_connect_error('Could not connected to the DB'));
}

$member_idcard = $_POST['member_idcard'];
$member_username = $_POST['member_username'];
$member_fullname = $_POST['member_fullname'];
$member_password = $_POST['member_password'];
$member_email = $_POST['member_email'];
$member_pos = $_POST['member_pos'];
$member_gender = $_POST['member_gender'];

$sql = "INSERT INTO member(member_idcard,member_username,member_fullname,member_password,member_email,member_pos,member_gender,admin_id)values('$member_idcard','$member_username','$member_fullname','$member_password','$member_email','$member_pos','$member_gender','1')";

if ($rs = $db->query($sql)) {
    $db->close();

    echo "<script>alert('You are member Now But!  you are not activated by Administrator!' )</script>";

    echo "<script>window.open('../admin/accept_member.php','_self')</script>";
} else {
    echo $db->error;
    $db->close();
}

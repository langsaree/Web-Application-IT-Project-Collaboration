<?php
session_start();
$member_id = $_SESSION['id'];

if (isset($_GET['id'])) {
    require '../menu/connect.php';
    $id = $_GET['id'];

    $comment = $_POST['comment'];

    $sql = "UPDATE committeegroup SET comment='$comment'   WHERE group_id = '$id' and  member_id= '$member_id'";
    if ($db->query($sql)) {
        $db->close();
        header("Location:committee_request.php");
    } else {
        echo $db->error;
        $db->close();
    }
}

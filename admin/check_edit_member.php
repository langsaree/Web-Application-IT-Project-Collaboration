<?php

if (empty($submit)) {

    include "../menu/function.php";
    require '../menu/connect.php';

    $member_id = $_POST['member_id'];
    $member_idcard = $_POST['member_idcard'];
    $member_fullname = $_POST['member_fullname'];
    $member_phone = $_POST['member_phone'];
    $member_email = $_POST['member_email'];
    $member_username = $_POST['member_username'];

    $sql = "UPDATE  member SET member_id = '$member_id', member_idcard = '$member_idcard'
 ,member_fullname  = '$member_fullname',
member_phone = '$member_phone',
member_email = '$member_email',
member_username='$member_username'

WHERE member_id = '$member_id'";

    if ($db->query($sql)) {
        $db->close();

        echo "<script>alert('Edit Success');window.location = \"all_member.php\";</script>";

    } else {
        echo $db->error;
        $db->close();
    }
} else {
    echo "Function is not executed!";
}

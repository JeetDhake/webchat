<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $file = $_FILES['img'];

    $filename = $_FILES['img']['name'];
    $filetmpname = $_FILES['img']['tmp_name'];
    $filesize = $_FILES['img']['size'] / (1024 * 1024);
    $fileerror = $_FILES['img']['error'];
    $filetype = $_FILES['img']['type'];

    $fileextention = explode('.', $filename);
    $fileactext = strtolower(end($fileextention));

    // $allowed = array('jpg', 'png', 'jpeg');

    // if (in_array($fileactext, $allowed)) {
    if ($fileerror === 0) {
        if ($filesize < 50) {
            $filenewname = uniqid('', true) . "." . $fileactext;
            $filedestination = 'uploads/' . $filenewname;

            if (move_uploaded_file($filetmpname, $filedestination)) {

                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, imgs) 
                                    VALUES ('{$incoming_id}', '{$outgoing_id}', '{$filenewname}')");
            }
            //header("location: ");
        } else {
            echo "file size too big";
        }
    } else {
        echo "error uploading file";
    }
    // } else {
    //     echo "file type not supported";
    // }

} else {
    header("login.php");
}

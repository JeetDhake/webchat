<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $file = $_FILES['doc'];

    $filename = $_FILES['doc']['name'];
    $filetmpname = $_FILES['doc']['tmp_name'];
    $filesize = $_FILES['doc']['size'] / (1024 * 1024);
    $fileerror = $_FILES['doc']['error'];
    $filetype = $_FILES['doc']['type'];

    $fileextention = explode('.', $filename);
    $fileactext = strtolower(end($fileextention));

    // $allowed = array('pdf','doc');

    // if (in_array($fileactext, $allowed)) {
    if ($fileerror === 0) {
        if ($filesize < 50) {
            $filenewname = uniqid('', true) . "." . $fileactext;
            $filedestination = 'uploads/' . $filenewname;

            if (move_uploaded_file($filetmpname, $filedestination)) {

                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, doc) 
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

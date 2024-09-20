<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $file = $_FILES['aud'];

    $filename = $_FILES['aud']['name'];
    $filetmpname = $_FILES['aud']['tmp_name'];
    $filesize = $_FILES['aud']['size'] / (1024 * 1024);
    $fileerror = $_FILES['aud']['error'];
    $filetype = $_FILES['aud']['type'];

    $fileextention = explode('.', $filename);
    $fileactext = strtolower(end($fileextention));

    // $allowed = array('mp3', 'wav');

    // if (in_array($fileactext, $allowed)) {
    if ($fileerror === 0) {
        if ($filesize < 50) {
            $filenewname = uniqid('', true) . "." . $fileactext;
            $filedestination = 'uploads/' . $filenewname;

            if (move_uploaded_file($filetmpname, $filedestination)) {

                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, aud) 
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

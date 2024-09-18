<?php
    $conn = mysqli_connect("localhost", "root", "", "chat");
    if(!$conn){
        echo "connection error" . mysqli_connect_error();
    }
?>
<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $output = "";

    $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
                 WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR
                        (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                if (!empty($row['msg'])) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                }
                if (!empty($row['imgs'])) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">
<img src="uploads/'.$row['imgs'].'" alt="img" class="shr-img">
                                    </div>
                                </div>';
                }
                if (!empty($row['aud'])) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">

        <div class="controls" onclick="play(\'' . $row['aud'] . '\', \'audio\')">
            <i class="fa-solid fa-play"></i>
            <span>00:00 / 00:00</span>
            <div class="barx"></div>
            <i class="fa-solid fa-volume-high"></i>
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
                                    </div>
                                </div>';
                }
                if (!empty($row['vid'])) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">
<div class="vidbx">
    <div class="cntr" onclick="play(\'' . $row['vid'] . '\', \'video\')">
        <i class="fa-regular fa-circle-play fa-xl"></i>
    </div>
    <div class="tols">
        <div class="sd">
            <i class="fa-regular fa-circle-play"></i>
            <span>00:00 / 00:00</span>
            <i class="fa-solid fa-volume-high"></i>
        </div>
        <div class="sd">
            <i class="fa-solid fa-expand"></i>
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </div>
</div>                                    
                                    </div>
                                </div>';
                }
                if (!empty($row['doc'])) {
                    $output .= '<div class="chat outgoing">
                                    <div class="detail">

                                <div class="document">
                                    <i class="fa-solid fa-file fa-xl"></i>
                                    <span class="doc-name">Document</span>
                                    <a href="dloadfil.php?file='.$row['doc'].'">
                                        <i class="fa-regular fa-circle-down fa-xl"></i>
                                    </a>
                                </div>
                                                        
                                    </div>
                                </div>';
                }
            } else {
                if (!empty($row['msg'])) {
                    $output .= '<div class="chat incoming">
                                    <img src="img/' . $row['img'] . '" class="imgx" alt="">
                                    <div class="detail">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                }
                if (!empty($row['imgs'])) {
                    $output .= '<div class="chat incoming">
                                    <img src="img/' . $row['img'] . '" alt="" class="imgx">
                                    <div class="detail">
<img src="uploads/'.$row['imgs'].'" alt="img" class="shr-img">
                                    </div>
                                </div>';
                }
                if (!empty($row['aud'])) {
                    $output .= '<div class="chat incoming">
                                    <img src="img/' . $row['img'] . '" alt="" class="imgx">
                                    <div class="detail">
        <div class="controls" onclick="play(\'' . $row['aud'] . '\', \'audio\')">
            <i class="fa-solid fa-play"></i>
            <span>00:00 / 00:00</span>
            <div class="barx"></div>
            <i class="fa-solid fa-volume-high"></i>
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>                                        
                                    </div>
                                </div>';
                }
                if (!empty($row['vid'])) {
                    $output .= '<div class="chat incoming">
                                    <img src="img/' . $row['img'] . '" alt="" class="imgx">
                                    <div class="detail">
<div class="vidbx">
    <div class="cntr" onclick="play(\'' . $row['vid'] . '\', \'video\')">
        <i class="fa-regular fa-circle-play fa-xl"></i>
    </div>
    <div class="tols">
        <div class="sd">
            <i class="fa-regular fa-circle-play"></i>
            <span>00:00 / 00:00</span>
            <i class="fa-solid fa-volume-high"></i>
        </div>
        <div class="sd">
            <i class="fa-solid fa-expand"></i>
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </div>
</div>      
                                    </div>
                                </div>';
                }
                if (!empty($row['doc'])) {
                    $output .= '<div class="chat incoming">
                                    <img src="img/' . $row['img'] . '" alt="" class="imgx">
                                    <div class="detail">
                                        <div class="document">
                                            <i class="fa-solid fa-file fa-xl"></i>
                                            <span class="doc-name">Document</span>
                                            <a href="dloadfil.php?file='.$row['doc'].'">
                                                <i class="fa-regular fa-circle-down fa-xl"></i>
                                            </a>
                                        </div> 
                                    </div>
                                </div>';
                }
            }
        }
        echo $output;
    }
} else {
    header("login.php");
}

// <audio controls>
// <source src="uploads/'.$row['aud'].'">
// </audio>

// <video controls width="200">
//         <source src="uploads/'.$row['vid'].'">
// </video>
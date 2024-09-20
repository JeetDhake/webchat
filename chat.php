<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>chat</title>
</head>

<body>

    <div class="wrapper">
        <section class="chat-area">

            <header>
                <?php
                include_once "config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $rowx = mysqli_fetch_assoc($sql);
                }
                ?>

                <a href="users.php" class="back"><i class="fas fa-arrow-left"></i></a>
                <img src="img/<?php echo $rowx['img']; ?>" class="imgx" alt="">
                <div class="detail">
                    <span><?php echo $rowx['fname'] . " " . $rowx['lname'] ?></span>
                    <p><?php echo $rowx['status']; ?></p>
                </div>

            </header>

            <div class="chat-box">

            </div>

            <div class="option">
                <div class="icon" onclick="upload_from('docf')">
                    <i class="fa-solid fa-file-invoice fa-lg"></i>
                </div>
                <div class="icon" onclick="upload_from('vidf')">
                    <i class="fa-regular fa-file-video fa-lg"></i>
                </div>
                <div class="icon" onclick="upload_from('audf')">
                    <i class="fa-solid fa-headphones-simple fa-lg"></i>
                </div>
                <div class="icon" onclick="upload_from('imgf')">
                    <i class="fa-solid fa-camera-retro fa-lg"></i>
                </div>
            </div>

            <form action="" class="typing-area" autocomplete="off">
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>

                <input type="text" name="message" class="inputf" placeholder="Type a message">
                <button onclick="" class="share"><i class="fa-solid fa-arrow-up-from-bracket fa-lg"></i></button>
                <button class="btn"><i class="fab fa-telegram-plane"></i></button>

            </form>

        </section>
    </div>

    <div class="player" id="player">
        <div class="hdr" onclick="clsply()"><i class="fa-solid fa-xmark"></i></div>
        <div class="yer" id="yer">

        </div>
    </div>


    <div class="abs" id="imgf">
        <form action="" class="sub1" enctype="multipart/form-data">
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <div class="field img">
                <label for="">Image</label>
                <label for="img" id="drop0">
                    <input type="file" name="img" id="img" accept="image/*" hidden>

                    <div id="img-view">

                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Drag and Drop<br>click here to Upload File</p>
                        <span>max: 50mb</span>
                    </div>
                </label>
            </div>
            <div class="field btnx">
                <button class="imgbtn">Upload File</button>
            </div>
        </form>
    </div>
    <div class="abs" id="audf">
        <form action="" class="sub2" enctype="multipart/form-data">
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <div class="field img">
                <label for="">Audio</label>
                <label for="aud" id="drop1">
                    <input type="file" name="aud" id="aud" accept="audio/*" hidden>

                    <div id="img-view1">

                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Drag and Drop<br>click here to Upload File</p>
                        <span>max: 50mb</span>
                    </div>
                </label>
            </div>
            <div class="field btnx">
                <button class="audbtn">Upload File</button>
            </div>
        </form>
    </div>
    <div class="abs" id="vidf">
        <form action="" class="sub3" enctype="multipart/form-data">
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <div class="field img">
                <label for="">Video</label>
                <label for="vid" id="drop2">
                    <input type="file" name="vid" id="vid" accept="video/*" hidden>

                    <div id="img-view2">

                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Drag and Drop<br>click here to Upload File</p>
                        <span>max: 50mb</span>
                    </div>
                </label>
            </div>
            <div class="field btnx">
                <button class="vidbtn">Upload File</button>
            </div>
        </form>
    </div>
    <div class="abs" id="docf">
        <form action="" class="sub4" enctype="multipart/form-data">
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <div class="field img">
                <label for="">Document</label>
                <label for="doc" id="drop3">
                    <input type="file" name="doc" id="doc" accept=".pdf,.doc,.docx,.txt" hidden>

                    <div id="img-view3">

                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Drag and Drop<br>click here to Upload File</p>
                        <p>max: 50mb</p>
                    </div>
                </label>
            </div>
            <div class="field btnx">
                <button class="docbtn">Upload File</button>
            </div>
        </form>
    </div>
    <script src="chat.js"></script>
    <script src="upload.js"></script>
    <script src="player.js"></script>
</body>

</html>
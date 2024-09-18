<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <title>chat</title>
</head>
<body>

<div class="wrapper">
    <section class="signup">
        <header>
            Real-time chat application
        </header>
        <form action="" enctype="multipart/form-data">
            <div class="error">
                
            </div>
            <div class="user-detail">
                <div class="f">
                <div class="field">
                    <label for="">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter your Name" required>
                </div>
                <div class="field">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter your Surename" required>
                </div>
                </div>
                <div class="field">
                    <label for="">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email Address" required>
                </div>
                <div class="field">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your Password" required>
                    <i class="fas fa-eye"></i>
                </div>
                
                <div class="field img" >
                    <label for="">Profile Image</label>
                    <label for="img" id="drop">
                        <input type="file" name="img" id="img" hidden>
                    
                        <div id="img-view">
                            
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <p>Drag and Drop<br>click here to Upload Image</p>
                        </div>
                    </label>
                </div>

                <div class="field btn">
                    <input type="submit" value="Register to Chat" name="" id="">
                </div>
            </div>
        </form>
        <div class="link">
            Already signed up? <a href="login.php">Login Now</a>
        </div>
    </section>
</div>
<script src="peye.js"></script>
<script src="signup.js"></script>
    
</body>
</html>
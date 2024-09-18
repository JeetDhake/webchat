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

    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>chat</title>
</head>
<body>

<div class="wrapper">
    <section class="login">
        <header>
            Real-time chat application
        </header>
        <form action="" enctype="">
            <div class="error">
                
            </div>
            <div class="user-detail">
                
                <div class="field">
                    <label for="">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email Address">
                </div>
                <div class="field">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your Password">
                    <i class="fas fa-eye"></i>
                </div>
                

                <div class="field btn">
                    <input type="submit" value="Register to Chat" name="" id="">
                </div>
            </div>
        </form>
        <div class="link">
            New to chat? <a href="signin.php">Signup Now</a>
        </div>
    </section>
</div>

<script src="peyei.js"></script>  
<script src="login.js"></script>
</body>

</html>
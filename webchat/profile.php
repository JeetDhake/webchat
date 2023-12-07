<?php

session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="fonts/remixicon.css">
</head>

<body>    
    <span class="main_bg"></span>
    <div class="container">      
        <header>
        <?php
            include_once "config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <div class="brandLogo">
                <figure><p>WEB-CHAT</p></figure>
                <span>User Settings</span>
                <a href="logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Log Out</a>
            </div>
        </header>


    
        <section class="userProfile card">
            <div class="profile">
                <figure><img src="img/<?php echo $row['img']; ?>" alt="profile" width="250px" height="250px"></figure>
            </div>
        </section>


        <section class="work_skills card">

       
            <div class="work">
                <h1 class="heading">Login Detail</h1>
                <div class="primary">
                    <h1>User Email</h1>
                    <span>Active</span>
                    <p><?php echo $row['email']; ?></p>
                </div>

                <div class="secondary">
                    <h1>Password</h1>
                    <span>Active</span>
                    <p><?php echo $row['password']; ?></p>
                </div>
            </div>

           
            <div class="skills">
                <h1 class="heading">Bio-graphy</h1>
                <ul>
                    <li style="--i:0">Available</li>
                    <li style="--i:1">In a meeting</li>
                    <li style="--i:2">Busy</li>
                    
                    <li style="--i:3">Urgent calls</li>
                    <li style="--i:4">sleeping</li>
                </ul>
            </div>
        </section>


        
        <section class="userDetails card">
            <div class="userName">
            <h1 class='name'><?php echo $row['fname']." ". $row['lname'] ?></h1>

                <div class="map">
                    <i class="ri-map-pin-fill ri"></i>
                    <span>city name</span>
                </div>
                <p>Active user</p>
            </div>

            <div class="rank">
                <h1 class="heading">Account</h1>
                <span>Normal User</span>
                
            </div>

            <div class="btns">
                <ul>

                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="#">Edit details</a>
                    </li>

                    
                </ul>
            </div>
        </section>


       
        <section class="timeline_about card">
            <div class="tabs">
                <ul>

                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>Other Settings</span>
                    </li>
                </ul>
            </div>

            <div class="contact_Info">
                <h1 class="label"><i class="fa-solid fa-file-invoice" style="color: #0009;"></i> Account</h1>
                <ul>
                <li class='phone'>
                    
                    <span class='info'>Phone: 1234567890</span>
                    </li>

                    

                    <li class='email'>
                    
                    <span class='info'>email: $email</span>
                    </li>
                <li class='site'>
                            <h1 class='label'><i class="fa-solid fa-lock" style="color: #0009;"></i> Privacy :</h1>
                            <span class='info'>Block user, delete account<br></span>
                            
                            <h1 class='label'><i class="fa-solid fa-user" style="color: #0009;"></i> Avatar :</h1>
                            <span class='info'>Change theme, edit profile<br></span>
                            
                            <h1 class='label'><i class="fa-solid fa-message" style="color: #0009;"></i> Chats :</h1>
                            <span class='info'>Chat history, group, messages<br></span>
                            
                            <h1 class='label'><i class="fa-solid fa-circle-question" style="color: #0009;"></i> Help :</h1>
                            <span class='info'>Help center. contact us, privacy policy<br></span>
                </li>
                </ul>
            </div>
               
        </section>
    </div>

</body>

</html>
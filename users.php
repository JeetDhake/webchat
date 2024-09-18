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

    <link rel="stylesheet" href="style/users.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <title>chat</title>
</head>

<body>

    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once "config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="img/<?php echo $row['img']; ?>" alt="">
                    <div class="detail">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <div>
                    <a href=""><i class="fa-solid fa-gear fa-lg"></i></a>
                    <a href="logout.php?logout_id=<?php echo $row['unique_id'] ?>">
                        <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                    </a>
                </div>

            </header>

            <div class="search">
                <span class="text">Search Available Users</span>

                <input type="text" placeholder="Enter username to search">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="userlist">

            </div>
        </section>
    </div>
    <script src="users.js"></script>
</body>

</html>
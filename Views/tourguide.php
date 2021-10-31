<?php
session_start();
include ('header.php');
require_once('../Model/usersmodel.php');
if(isset($_SESSION['flag']))
{
    $conn = getConnection();
    $email = $_SESSION['email'];
    $sql = "select * from users where email='$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tourguide.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>

<!-- // if($_SESSION['flag'] = true;){ -->


 <body>

    <main>
        <div class="main-container">
            <div class="color">
                <div class="profile-pic">
                    <div class="top-pic">
                        <img src="images/pro.jpg" alt="">
                        <p><?= $row['username'] ?></p>
                        <p><?php  
                        echo $_SESSION['email'];
                        ?></p>
                    </div>
                    <div class="list">
                        <li> <a href="">My Profile </a> </li>
                        <li> <a href="">Recent Guide </a> </li>
                        <li> <a href="">Total Guide </a> </li>
                        <li> <a href="">Edit Profile </a> </li>
                        <li> <a href="">Tour Packege </a> </li>
                        <button id="logout-button"><a href="logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
            <div class="right-top">
                <div class="top-section">
                    <h1>My profile</h1>

                </div>
                <div class="right-middle">
                    <div class="">
                        <h1>Profile Details:</h1>
                        <div class="Guide-Data">
                            <p>Id: <?= $row['id'] ?></p>
                            <p>Name: <?= $row['username'] ?></p>
                            <p>Email: <?= $row['email'] ?></p>
                            <p>Phone: 0097897493</p>

                        </div>
                       
                        <div class="guide">
                            <h1 id="guide-p">Packege Guide Price</h1>
                            <div class="bottom-setion">
                                <div class="order">
                                    <h1>Packege</h1>
                                    <p>Packege Guide: <span class="packge-name">500</span> </p>
                                </div>
                                <div class="order">
                                    <h1>Recents Guide</h1>
                                    <p>Recet Order Packege: <span class="packge-name">Sylet</span></p>
                                </div>
                                <div class="order">
                                    <h1>Guide Packege</h1>
                                    <!-- <p>Recet Order Packege: <span class="packge-name">Sylet</span></p> -->
                                </div>



                            </div>
                        </div>


                    </div>



                </div>

            </div>

        </div>
        <!-- rifht site -->



    </main>
</body>

</html>
<?php }else{
    header('location: Login.php');
} ?>
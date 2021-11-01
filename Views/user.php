<?php
session_start();
require_once('../Model/usersmodel.php');
include ('header.php');
if(isset($_SESSION['flag'])){

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
    <link rel="stylesheet" href="user.css">
    <title>UserProfile</title>
</head>

<body>
    <main>
        <div class="main-container">
            <div class="color">
                <div class="profile-pic">
                    <div class="top-pic">
                        <img src="../Resources/images/pro.jpg" alt="">
                        <p><?= $row['username'] ?></p>
                        <p><?php  
                        echo $_SESSION['email'];
                        ?>
                        </p>
                    </div>
                    <div class="list">
                        <li> <a href="">My Profile </a> </li>
                        <li> <a href="">Recent Order </a> </li>
                        <li> <a href="">Recent Tour </a> </li>
                        <li> <a href="">Edit Profile </a> </li>
                        <button id="logout-button"><a href="logout.php">Logout</a></button>

                    </div>
                </div>
            </div>
            <div class="right-top">
                <div class="top-section">
                    <h1>tour hobe.com user profile</h1>

                </div>
                <div class="right-middle">
                    <div class="">
                        <h1 id="profile-name">Profile Details:</h1>
                        <table id="tddata">
                            <th>Name</th>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <tr>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>0097897493</td>
                                <td><?= $row['userpassword'] ?></td>
                            </tr>
                        </table>
                        <div class="">
                            <div class="bottomtop-setion">
                                <div class="order">
                                    <h1>Travel History</h1>
                                    <p>Last Packege: <span class="packge-name">Sajek</span> </p>
                                </div>
                                <div class="order">
                                    <h1>Recents Travel</h1>
                                    <p>Recet Order Packege: <span class="packge-name">Sylet</span></p>
                                </div>
                            </div>

                            <div class="bottom">
                                <div class="order">
                                    <h1>Tour Guide </h1>
                                    <p>Last Packege: <span class="packge-name">Sajek</span> </p>
                                </div>
                                <div class="order">
                                    <h1>Cancel Tour</h1>
                                    <!-- <p>Recet Order Packege: <span class="packge-name">Sylet</span></p> -->
                                </div>
                            </div>
                        </div>



                    </div>



                </div>

            </div>

        </div>
        <!-- rifht site -->
        <div class="">


        </div>


    </main>
</body>

</html>
<?php }else{
    header('location: Login.php');
} ?>
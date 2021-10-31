<?php
session_start();
if(isset($_SESSION['flag'])){
    unset($_SESSION['flag']);
    unset($_SESSION['email']);
    header('location: Login.php');
}
// }else{
//     header('location: Login.php');
// }
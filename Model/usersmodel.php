<?php
require_once('db.php');

function insertUser($userinfo){
    $conn = getConnection();
    $sql = "insert into users values('','{$userinfo['username']}','{$userinfo['email']}','{$userinfo['userpassword']}','{$userinfo['confirmpassword']}','{$userinfo['usertype']}')";
    $row = mysqli_query($conn,$sql);
    if($row){
        return true;
    }else{
          return false;
      }
 
}

function validateUser($email,$password)
{
    $conn = getConnection();
    $sql = "select * from users where email='$email' and userpassword='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(count($row) > 0){
        return true;
    }else{
        return false;
    }
}

?>
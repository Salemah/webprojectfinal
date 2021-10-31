<?php
include('../controllers/signupjson.php');

?>


<?php
session_start();
require_once('../Model/usersmodel.php');

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertypes'];


    if (empty($email))
    {
       $mailerror ='please enter your email';
   }

   if (empty($username))
   {
      $unameerror ='please enter your username';
  }
  if (empty($userpassword)) 
  {
      $passworderror='please enter your password';
  }

  


    function passwordMatching($userpassword, $confirmpassword){
        if($userpassword == $confirmpassword){
            return true;
        }else{
            return false;
        }
    }
    include('../views/Signup.php');

  ?>

  <?php

if(empty( $unameerror)&&empty( $mailerror)&&empty( $cnpassworderror) )
{
        if(passwordMatching($userpassword, $confirmpassword) == true){
            $conn = getConnection();
                $userinfo = [
                    'username' => $username,
                    'email' => $email,
                    'userpassword' => $userpassword,
                    'confirmpassword' => $confirmpassword,
                    'usertype' => $usertype
                ];
            
                $status = insertUser($userinfo);
                if($status){
                    header('location: ../Views/Login.php');
                }else{
                    echo "failed to insert!";
                       }
            
        }else{
                echo "password and confirm password doesn't match";
            }
        
        


    }
    else{
        return false;
    } 

}else{
    echo "invalid Request!";
}


?>
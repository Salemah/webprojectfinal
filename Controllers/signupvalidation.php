<?php
session_start();
require_once('../Model/usersmodel.php');

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertypes'];


   function nameValidation($username){
        if($username == ""){
            echo "Name Field Can't be Empty";
        }else{
            if(strlen($username) >= 3){
                return $username;
        
            }else{
                echo "Name should be greater or  equal than three char";
                echo "</br>";
            }
        }
    }

    function mailValidation($email){
        if($email == ""){
            echo "Mail field is required";
            echo "</br>";
    
        }else{
            return $email;
    
            }
        }


    function passwordValidation($userpassword){
        if($userpassword == ""){
                echo "password can't be empty";
            }else{
                if(strlen($userpassword) >= 4){
                   return $userpassword;
                   
                }else{
                    echo "Password not less than 8 char!";
                }
            }
        
    }

    function passwordMatching($userpassword, $confirmpassword){
        if($userpassword == $confirmpassword){
            return true;
        }else{
            return false;
        }
    }


    if(mailValidation($email) && nameValidation($username) && passwordValidation($userpassword) && passwordMatching($userpassword,$confirmpassword)){
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

<?php
include('../controllers/loginjson.php');

?>

<?php

require_once('../Model/usersmodel.php');
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == ""){
		echo "Enter email";
	}else{
		if($password == ""){
			echo "please, Enter Password";
		}else{
		    
    $conn = getConnection();
    $sql = "select * from users where email='$email' and userpassword='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(count($row) > 0){
        if($row["usertype"]=="customer")
            {   
                 
                  $_SESSION['email'] = $email;
                  
          header("location: ../Views/user.php");
	
	        }elseif($row["usertype"]=="admin")
            {
                  $_SESSION['flag'] = true;
                  $_SESSION['email'] = $email;
                  header("location: ../Views/admin.php");

            }elseif($row["usertype"]=="manager")
            {
                $_SESSION['flag'] = true;
                  $_SESSION['email'] = $email;
                  header("location: ../Views/manager.php");
                
            }elseif($row["usertype"]=="tourguide")
            {
                  $_SESSION['flag'] = true;
                  $_SESSION['email'] = $email;
                  header("location: ../Views/tourguide.php");
            }
    }else{
        // echo "Invalid";
        return false;
    }
		}

	}
}else{
    echo "invalid";
}

?>
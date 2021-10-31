<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertypes'];



if(file_exists('../controllers/signup.json'))  

     {  

          $current_data = file_get_contents('../controllers/signup.json');  

          $array_data = json_decode($current_data, true);  

          $extra = array(  

            'email'       =>     $_POST['email'],
            'userpassword' =>    $_POST['userpassword'],
            'confirmpassword' => $_POST['confirmpassword'],
            'username'   =>     $_POST['username'],
            'usertypes'   =>     $_POST['usertypes'],
);  

          $array_data[] = $extra;  

          $final_data = json_encode($array_data);  

          if(file_put_contents('../controllers/signup.json', $final_data))  

          {  

               $message = "<label class='text-success'>Sign up sucessfully</p>";  

          }  

     }  

     else  

     {  

          $error = 'JSON File not exits';

       }  



?>
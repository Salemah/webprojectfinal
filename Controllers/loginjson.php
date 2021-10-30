<?php

$username = $_POST['username'];

$userpassword = $_POST['userpassword'];



if(file_exists('login.json'))  

     {
         $current_data = file_get_contents('login.json');  
          $array_data = json_decode($current_data, true);  
          $extra = array(  
            'username'       =>     $_POST['username'],
            'userpassword'   =>     $_POST['userpassword'],
 );  

          $array_data[] = $extra;  

          $final_data = json_encode($array_data);  

          if(file_put_contents('login.json', $final_data))  

          {  

               $message = "<label class='text-success'>Sign up sucessfully</p>";  

          }  

     }  

     else  

     {  

          $error = 'JSON File not exits';

       }  



?>
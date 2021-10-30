<?php

  $email = $_POST['email'];

  $password = $_POST['password'];



if(file_exists('../controllers/login.json'))  

     {  

          $current_data = file_get_contents('../controllers/login.json');  

          $array_data = json_decode($current_data, true);  

          $extra = array(  

            'email'       =>     $_POST['email'],

            'password'   =>     $_POST['password'],

     

          );  

          $array_data[] = $extra;  

          $final_data = json_encode($array_data);  

          if(file_put_contents('../controllers/login.json', $final_data))  

          {  

               $message = "<label class='text-success'>Sign up sucessfully</p>";  

          }  

     }  

     else  

     {  

          $error = 'JSON File not exits';

       }  



?>
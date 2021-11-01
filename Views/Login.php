<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Login.css"> -->
    <link rel="stylesheet" href="Login.css">
    
    <title>Login</title>
</head>

<body>
    <section  class="cxv" >
     
         <div class="login-body">
            <div class="right-half">
                <form action="../Controllers/logcheck.php" method="POST">
                    <!-- <img id="logo" src="../Resources/images/7.jpg" alt=""><br> -->
                <input class="inp" type="text" name="email" id="" placeholder="Email"><br>
                <input class="inp" type="password" name="password" id="" placeholder="Password"><br>
                <input type="checkbox" name="" id="check-box"> Remember Me
                <a href="" id="Forgot-pass">Forgotten Password?</a><br>
                <input id="sign-in-button" name="login"  type="submit" value="login">
    
          
                <p class="sign-up-link">Don't Have an account..? <a href="Signup.php" class="Sign-Up">Sign Up</a> here</p>
            </form>
            </div>
         </div>
        

    </section>

</body>

</html>
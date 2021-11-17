<?php
include_once './includes/header.php';

if (isset($_SESSION['userId'])) {
    header('location: ./admin/home.php');
}

if (isset($_POST['submit'])) {
    if (!str_contains($_POST['email'], '@')) {
        header('location: ./index.php?m=Invalid email');
        exit;
    }
    $current_data = file_get_contents('./data/user.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value) {
        if ($value['email'] == $_POST['email']) {
            if ($value['password'] == $_POST['password']) {
                $_SESSION['userId'] = $value['id'];
                header('location: ./admin/home.php');
                exit;
            } else {
                header('location: ./index.php?m=Incorrect password');
                exit;
            }
        }
    }
    header('location: ./index.php?m=Email not found');
}

?>
<h1>Admin Panel - Login</h1>

<form id="loginform" action="#" method="post">
    <input required placeholder="Email" type="text" name="email"><br>
    <input required placeholder="Password" type="password" name="password"><br>
    <a style="font-size: 24px; margin-right: 59px;" href="./admin/register.php">Create an account</a>
    <input type="submit" value="Login" name="submit">
    <p style="color: red; font-size: 30px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>
</form>

<?php
include_once './includes/footer.php';

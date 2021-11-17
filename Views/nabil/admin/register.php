<?php
include_once '../includes/header.php';

if (isset($_SESSION['userId']))
    header('location: ./home.php');

if (isset($_POST['submit'])) {
    if (!str_contains($_POST['email'], '@')) {
        header('location: ./register.php?m=Invalid email');
        exit;
    }
    if (strlen($_POST['password']) < 6) {
        header('location: ./register.php?m=Password too short');
        exit;
    }
    if ($_POST['password'] != $_POST['password2']) {
        header('location: ./register.php?m=Passwords do not match');
        exit;
    }

    $current_data = file_get_contents('../data/user.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value) {
        if ($value['email'] == $_POST['email']) {
            header('location: ./register.php?m=Mail already in use');
            exit;
        }
    }

    $data = array(
        'id' => count(($array_data)) + 1,
        'name'               =>     $_POST['name'],
        'contact'               =>     $_POST['contact'],
        'email'               =>     $_POST['email'],
        'password'               =>     $_POST['password'],
        'address'               =>     $_POST['address'],
    );
    array_push($array_data, $data);
    file_put_contents('../data/user.json', json_encode($array_data));
    $_SESSION['userId'] = $data['id'];
    header('location: ./home.php');
}
?>

<h1 style="margin: 20px;">Admin Panel - Registration</h1>

<form id="regform" action="#" method="post">
    <input required placeholder="Admin name" type="text" name="name"><br>
    <input required placeholder="Email" type="text" name="email"><br>
    <input required placeholder="Contact number" type="text" name="contact"><br>
    <input required placeholder="Address" type="text" name="address"><br>
    <input required placeholder="Password" type="password" name="password"><br>
    <input required placeholder="Password (again)" type="password" name="password2"><br>
    <a style="font-size: 24px; margin-right: 30px;" href="../">Already have an account?</a>
    <input type="submit" value="register" name="submit">
    <p style="color: red; font-size: 30px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>
</form>

<?php
include_once '../includes/footer.php';

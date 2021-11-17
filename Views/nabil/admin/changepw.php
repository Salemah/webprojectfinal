<?php
include_once '../includes/header.php';

if (!isset($_SESSION['userId'])) {
    header('location: ../index.php?m=Login to continue');
    exit;
}

$id = $_SESSION['userId'];
if (isset($_POST['update'])) {
    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password !== $password2) {
        header('location: ./changepw.php?m=Passwords do not match');
        exit;
    }
    $current_data = file_get_contents('../data/user.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value) {
        if ($value['id'] == $id) {
            if ($value['password'] == $oldpassword) {
                $value['password'] = $password2;
                file_put_contents('../data/user.json', json_encode($array_data));
                header('location: ./changepw.php?m=Password updated');
                exit;
            } else
                header('location: ./changepw.php?m=Incorrect current password');
        }
    }
}

?>
<h1>Update password</h1>

<form id="loginform" action="#" method="post">
    <input required placeholder="Current password" type="password" name="oldpassword"><br>
    <input required placeholder="New password" type="password" name="password"><br>
    <input required placeholder="New password (again)" type="password" name="password2"><br>
    <input type="submit" value="Update" name="update">
    <p style="color: red; font-size: 30px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>
</form>

<?php
include_once '../includes/footer.php';

<?php
include_once '../includes/header.php';

if (!isset($_SESSION['userId'])) {
    header('location: ../index.php?m=Login to continue');
    exit;
}

$id = $_SESSION['userId'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $current_data = file_get_contents('../data/user.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value)
        if ($value['id'] == $_SESSION['userId']) {
            $data = array(
                'id' => $id,
                'name'               =>     $_POST['name'],
                'contact'               =>     $_POST['contact'],
                'email'               =>     $value['email'],
                'password'               =>     $value['password'],
                'address'               =>     $_POST['address'],
            );
            $array_data[$key] = $data;
            break;
        }
    file_put_contents('../data/user.json', json_encode($array_data));
    header('location: ./home.php?m=Profile updated');
    exit;
}

$user;
$current_data = file_get_contents('../data/user.json');
$array_data = json_decode($current_data, true);
foreach ($array_data as $key => $value)
    if ($value['id'] == $_SESSION['userId'])
        $user = $value;

$name = $user['name'];
$contact = $user['contact'];
$email = $user['email'];
$address = $user['address'];
?>

<h1>Admin profile</h1>

<form style="margin-top: 20px;" id="updateform" action="#" method="post">
    <input value="<?php echo $name ?>" required placeholder="Employee name" type="text" name="name"><br>
    <input value="<?php echo $contact ?>" required placeholder="Contact number" type="text" name="contact"><br>
    <input value="<?php echo $email ?>" disabled required placeholder="Email" type="text" name="email"><br>
    <input value="<?php echo $address ?>" required placeholder="Address" type="text" name="address"><br>
    <div><input type="submit" name="submit" value="Update"></div>
</form>
<a style="font-size: 30px; text-decoration: none;" href="./changepw.php">Change password</a>
<p style="color: red; font-size: 20px; margin-top 15px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>

<?php
include_once '../includes/footer.php';

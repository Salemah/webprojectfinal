<?php
include_once '../includes/header.php';

if (!isset($_SESSION['userId'])) {
    header('location: ../index.php?m=Login to continue');
    exit;
}

$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $current_data = file_get_contents('../data/packages.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value)
        if ($value['id'] == $id) {
            $data = array(
                'id' => $id,
                'title'               =>     $_POST['title'],
                'price'               =>     $_POST['price'],
                'duration'               =>     $_POST['duration']
            );
            $array_data[$key] = $data;
            break;
        }
    file_put_contents('../data/packages.json', json_encode($array_data));
    header('location: ../admin/home.php?m=Tour info updated');
    exit;
}

if (isset($_POST['delete'])) {
    $current_data = file_get_contents('../data/packages.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $key => $value)
        if ($value['id'] == $id)
            unset($array_data[$key]);
    file_put_contents('../data/packages.json', json_encode($array_data));
    header('location: ../admin/home.php?m=Tour info deleted');
}

$package;
$current_data = file_get_contents('../data/packages.json');
$array_data = json_decode($current_data, true);
foreach ($array_data as $key => $value)
    if ($value['id'] == $id)
        $package = $value;
?>

<h1>Update or delete tour package</h1>

<form style="margin-top: 20px;" id="updateform" action="#" method="post">
    <input value="<?php echo $package['title'] ?>" required placeholder="Package title" type="text" name="title"><br>
    <input value="<?php echo $package['price'] ?>" required placeholder="Price" type="number" name="price"><br>
    <input value="<?php echo $package['duration'] ?>" required placeholder="Duration" type="text" name="duration"><br>
    <div><input type="submit" name="submit" value="Update"></div>
</form>
<form id="deleteform" action="#" method="post">
    <input name="delete" type="submit" value="Delete">
</form>
<p style="color: red; font-size: 20px; margin-top 15px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>

<?php
include_once '../includes/footer.php';

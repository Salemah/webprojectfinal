<?php
include_once '../includes/header.php';

if (!isset($_SESSION['userId'])) {
    header('location: ../index.php?m=Login to continue');
    exit;
}

if (isset($_POST['submit'])) {
    $current_data = file_get_contents('../data/packages.json');
    $array_data = json_decode($current_data, true);
    $data = array(
        'id' => count(($array_data)) + 1,
        'title'               =>     $_POST['title'],
        'price'               =>     $_POST['price'],
        'duration'               =>     $_POST['duration']
    );
    array_push($array_data, $data);
    file_put_contents('../data/packages.json', json_encode($array_data));
    header('location: ../admin/home.php?m=New tour info added');
    exit;
}

?>

<h1>Add new tour package info</h1>

<form style="margin-top: 20px;" id="insertform" action="#" method="post">
    <input required placeholder="Package title" type="text" name="title"><br>
    <input required placeholder="Price" type="number" name="price"><br>
    <input required placeholder="Duration" type="text" name="duration"><br>
    <div><input type="submit" name="submit" value="Add"></div>
</form>
<p style="color: red; font-size: 20px; margin-top 15px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>

<?php
include_once '../includes/footer.php';

<?php

$id = $_POST['user_id'];

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];
$image = $_POST['image'];

// echo "$username <br> $password <br> $email <br> $role <br> $id";

$file = file_get_contents('users.json');
$users = json_decode($file, true);

$users[$id]['username'] = $username;
$users[$id]['password'] = $password;
$users[$id]['email'] = $email;

if ($image != null) {
$users[$id]['image'] = 'assets/image/' . $image;
}

$jsonFile = fopen('users.json', 'w');
fwrite($jsonFile, json_encode($users, JSON_PRETTY_PRINT));
fclose($jsonFile);

header("location: ../profile.php");
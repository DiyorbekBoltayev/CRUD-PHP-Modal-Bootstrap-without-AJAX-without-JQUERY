<?php
require_once 'connect.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' limit 1";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0) {
        $sql="INSERT INTO users (name,email,password) values ('$name','$email','$password')";
        mysqli_query($conn,$sql);
    }
}

header("location:index.php?message=User-created-successfully");

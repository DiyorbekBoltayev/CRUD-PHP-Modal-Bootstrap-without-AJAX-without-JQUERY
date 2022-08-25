<?php
require_once 'connect.php';
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "delete from users where id='$id' ";
    if (mysqli_query($conn, $sql)) {
        header("location:index.php?message=User-deleted-successfully");
    } else {
        header("location:index.php?message=Error");

    }
}

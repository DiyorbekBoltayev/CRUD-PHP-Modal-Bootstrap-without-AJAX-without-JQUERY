<?php
require_once 'connect.php';
if(isset($_POST['name_edit'])){
    $id=$_POST['id_edit'];
    $name=$_POST['name_edit'];
    $email=$_POST['email_edit'];
    $currentpassword=md5($_POST['password_current']);
    $newpassword=md5($_POST['password_new']);
    $sql="select * from users where id=$id limit 1";
    $result=mysqli_query($conn,$sql)->fetch_assoc();
    if($result['password'] != $currentpassword){
        header("location:index.php?message=Password-is-incorrect");
    }else{
        $sql="select * from users where email='$email' limit 1";
        $result=mysqli_query($conn,$sql);
        if($result->num_rows != 0){
            $row=$result->fetch_assoc();
            if($row['id'] != $id){
                header("location:index.php?message=This-email-already-used");

            }else{
                $sql="update  users  set name='$name',email='$email',password='$newpassword' where id='$id'";
                mysqli_query($conn,$sql);
                header("location:index.php?message=User-edited-successfully");
            }
        }
    }


}

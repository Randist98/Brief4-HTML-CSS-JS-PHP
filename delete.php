<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `user` where id=$id";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:landing_page.php');
    } else {
        die(mysqli_error($con));
    }
}
<?php
require "../inc/env.php";
$id= $_GET['id'];
$query= "SELECT status from banners where id= '$id'";
$response= mysqli_query($conn, $query);
$banner= mysqli_fetch_assoc($response);

if($banner['status']==1){
   $query= "UPDATE banners SET status='0' WHERE id='$id'";
}else{
    $query= "UPDATE banners SET status='1' WHERE id='$id'";
}
$response=mysqli_query($conn,$query);
var_dump($response);
if($response){
    header("location:../backened/allBanner.php");
}
?>
<?php
$connect = mysqli_connect('localhost','root','','store') or die("Db Fail to Connect");

$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM product where p_id='$id'");

if($query){

    echo"<script>alert('Successfully Deleted')</script>";
    echo"<script>window.open('index.php','_self')</script>";
}
else{
    echo"<script>alert('Fail to Delete')</script>";
}

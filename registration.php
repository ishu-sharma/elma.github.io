<?php

session_start();
$con=mysqli_connect("localhost","root");
if($con==true){
    echo "";
}else{
    echo "Connection Failed";
}

mysqli_select_db($con,"productdb");

$name = $_POST['name'];
$password = $_POST['pass'];

$check = " select * from user where name='$name' && pass='$password' ";
$result=mysqli_query($con,$check);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Data Already Exist";
}else{
    $inst = " insert into user(name, pass) values('$name', '$password') ";
    mysqli_query($con,$inst);
    echo "Signup Successfull.";
    header("location:login-form.php");
} 

?>
<?php
session_start();
session_destroy();
header('location:login-form.php');
echo "<script>alert("You Are Logged Out");</script>";

?>
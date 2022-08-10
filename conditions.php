<?php include("functions.php");

if (isset($_POST['action'])&&$_POST['action']=="login") {
    login();
}
<?php include("functions.php");

if (isset($_POST['action'])&&$_POST['action']=="login") {
    login();
}
if (isset($_POST['action'])&&$_POST['action']=="addingInter"){
    adding();
}
if (isset($_POST['action'])&&$_POST['action']=="addingType"){
    addingType();
}
<?php
//check if login is success or not
session_start();
if(!isset($_SESSION["login_status"])){
    echo "Illegal attemp by skipping Login";
    die;
}


if($_SESSION["login_status"]==false){
    echo "Unauthorized Access";
    die;
}
if($_SESSION['usertype']!="Customer"){
    echo "Forbidden Access";
    die;
}
?>
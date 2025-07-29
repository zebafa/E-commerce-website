<?php
$pid = $_GET['pid'];
include "authguard.php";
include "../shared/connection.php";

mysqli_query($conn, "INSERT INTO cart(userid, pid) VALUES($_SESSION[userid], $pid)");
echo $pid;

header("location:viewcart.php");
?>
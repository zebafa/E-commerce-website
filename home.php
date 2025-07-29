<html>
<head>
    <style>
        .pdt {
            background-color: bisque;
            display: inline-block;
            margin: 10px;
            padding: 10px;
            width: 300px;
            height: fit-content;
            vertical-align: top;
        }
        .pdt-img {
            width: 100%;
            height: 73%;
        }
        .name {
            font-size: 24px;
            font-weight: bold;
            color: blueviolet;
        }
        .price {
            font-size: 25px;
            font-weight: bolder;
        }
        .price::after {
            content: "Rs";
            font-size: 12px;
        }
    </style>
</html>

<?php
include "authguard.php";
include "../shared/connection.php";
include "menu.html";

$sql_result = mysqli_query($conn, "select * from product");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='pdt'>
        <div class='name'>{$dbrow['name']}</div>
        <div class='price'>{$dbrow['price']}</div>
        <img class='pdt-img' src='{$dbrow['impath']}' alt='{$dbrow['name']}'>
        <div>{$dbrow['detail']}</div>
        <div class='text-center'>
            <a href='addcart.php?pid={$dbrow['pid']}'>
                <button class='btn btn-warning'>Add to cart</button>
            </a>
        </div>
    </div>";
}
?>


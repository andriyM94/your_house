<!-- функціонал для зміни даних про об'єкт -->
<?php

include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }

$sql ="UPDATE `objects` SET `title` = '".$_POST["title"]."', `description` = '".$_POST["description"]."', `price_rent` = '".$_POST["price_rent"]."', `price_buy` = '".$_POST["price_buy"]."' WHERE `objects`.`id` = " . $_POST["id"];

if (mysqli_query($connect, $sql)) {
  if ($user_in["type"] == "client") {
        header("location: /pages/client_cabinet.php");
    } else {
        header("location: /pages/investor_cabinet.php");
    } 
} else {
    echo "error";
}
?>
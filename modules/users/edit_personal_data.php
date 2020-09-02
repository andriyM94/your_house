<!-- функціонал для зміни персональних даних користувача -->
<?php

include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }

$sql ="UPDATE `users` SET `first_name` = '".$_POST["first_name"]."', `second_name` = '".$_POST["second_name"]."', `phone` = '".$_POST["phone"]."' WHERE `users`.`id` = " . $user_in["id"];
if (mysqli_query($connect, $sql)) {
    // вибираємо нашого користувача
    $sql = "SELECT * FROM `users` WHERE `id` = " . $user_in["id"];
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($result);
    // перезаписуємо кукі з новими даними користувача
    setcookie("user", "", 0 , "/");
    setcookie("user", serialize($user), time()+60*60, "/");
    // перенаправляємо назад в кабінет
    if ($user_in["type"] == "client") {
        header("location: /pages/client_cabinet.php");
    } else {
        header("location: /pages/investor_cabinet.php");
    }
} else {
    echo "error";
}
?>
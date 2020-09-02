<!-- функціонал авторизації користувача -->
<?php
// база даних
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if (isset($_POST["user_name"]) && isset($_POST["password"])) {
    $sql = "SELECT * FROM `users` WHERE `user_name` = '".$_POST["user_name"]."' AND `password` = '".$_POST["password"]."'";
    $resultat = mysqli_query($connect, $sql);
    $col_res = mysqli_num_rows($resultat);
   
    if ($col_res == 1) {
        $user = mysqli_fetch_assoc($resultat);
        // створюємо кукі з даними користувача на 1 годину
        setcookie("user", serialize($user), time()+60*60, "/");
        // направляємо на голловну сторінку
        header("Location: /");
    } else {
        header("Location: /");
    }
}

?>
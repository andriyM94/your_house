<!-- функціонал для зняття об'кта з оренди -->
<?php

    include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
    
    if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }

    $sql = "UPDATE `objects` SET `status` = 'not_rented', `id_user_rented` = '0' WHERE `objects`.`id` = ".$_GET['id_object'];
    if (mysqli_query($connect, $sql)) {
        header("Location: /pages/client_cabinet.php");
    } else {
        echo "error";
    }
?>
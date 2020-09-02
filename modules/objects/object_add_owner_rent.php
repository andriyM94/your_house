<!-- функціонал добавлення об'єкта в оренду -->
<?php

    include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

    if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }

    //  запит на зміну статусу об'єкта на орендований
    $sql = "UPDATE `objects` SET `status` = 'rented', `id_user_rented` = '".$user_in["id"]."' WHERE `objects`.`id` = ".$_GET['id_object'];
    if (mysqli_query($connect, $sql) ) {
        header("location: /");
    } else {
        echo "error";
    }
    
    

?>
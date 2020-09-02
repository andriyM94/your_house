<!-- функціонал при натисканні на кнопку покупки об'єкта -->
<?php
    // база
    include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

    if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }
    // запит на добавлення нового власника з об'єктом
    $sql = "INSERT INTO `object_owner` (`id_owner`, `id_object`) VALUES ('".$user_in['id']."', '".$_GET['id_object']."')";
    
    // запит на заміну типа власника вибраного об'єкта
    if ($user_in["type"] == "client") {
       $second_sql = "UPDATE `objects` SET `owner_by` = 'client', `status` = 'not_rented', `id_user_rented` = '0' WHERE `objects`.`id` = ".$_GET['id_object'];
    } else {
        $second_sql = "UPDATE `objects` SET `owner_by` = 'investor' WHERE `objects`.`id` = ".$_GET['id_object'];
    }

    // запит на видалення власника за бази даних в якого ми викупили об'єкт
    $delete_last_owner = "DELETE FROM `object_owner` WHERE `object_owner`.`id_object` = " . $_GET['id_object'];
    
    // виконнання всіх запитів і перенаправлення на головну сторінку
    if (mysqli_query($connect, $delete_last_owner) && mysqli_query($connect, $sql) && mysqli_query($connect, $second_sql)) {
        header("location: /");
    } else {
        echo "error";
    }
?>
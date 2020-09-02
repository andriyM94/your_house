<!-- добавлення нового об'єкту в базу -->
<?php
// база даних
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if (isset($_COOKIE["user"])) {
    $user_in = unserialize($_COOKIE["user"]);
}

$sql = "INSERT INTO `objects` ( `title`, `type`, `description`, `images`, `adress`, `price_rent`, `price_buy`, `owner_by`, `status`) VALUES ( '".$_POST["title"]."', '".$_POST["type"]."', '".$_POST["description"]."', '../images/objects/first_image.png', '".$_POST["adress"]."', '".$_POST["price_rent"]."', '".$_POST["price_buy"]."', 'investor', '');";
    
if (mysqli_query($connect, $sql)) {
    // визначажмо ід об'єкта який ми добвили
    $sql = "SELECT MAX(`id`) FROM `objects`";
    $result = mysqli_query($connect, $sql);
    $last_id = mysqli_fetch_assoc($result);
    $id_object =$last_id["MAX(`id`)"];

    // добавляємо власника з об'єктом в базу
    $sql_new = "INSERT INTO `object_owner` (`id_owner`, `id_object`) VALUES ('".$user_in['id']."', '".$id_object."')";
    mysqli_query($connect, $sql_new);

    if ($user_in["type"] == "client") {
        header("location: /pages/client_cabinet.php");
    } else {
        header("location: /pages/investor_cabinet.php");
    }
} else {
    echo "error";
}
?>
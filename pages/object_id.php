<!-- сторінка вибраного об'єкта -->
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your HOUSE</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style_header.css">
    <link rel="stylesheet" type="text/css" href="../css/style_content.css">
    <link rel="stylesheet" type="text/css" href="../css/style_inv_cab.css">
    <link rel="stylesheet" type="text/css" href="../css/style_object_id.css">
    <link rel="stylesheet" type="text/css" href="../css/style_modal_edit_object_data.css">
    
    <link rel="icon" href="data:;base64,=">
</head>
<body>
    <!-- Підключення хедера -->
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/parts_of_site/header.php"; ?>

    <div class="content">
        <?php
        // вибирамо об'єкт
        $sql = "SELECT * FROM `objects` WHERE `id` = " . $_GET["id"];
        $object = mysqli_fetch_assoc(mysqli_query($connect, $sql));      
        ?>
        <div id="object_info">
            <h2><?php echo  $object["title"]?></h2>
            <img src="<?php echo $object["images"]?>" alt="qqqq">
            <h3>Тип об'єкта: <?php echo  $object["type"]?></h3>
            <h3>Адреса: <?php echo  $object["adress"]?></h3>
            <?php
                if ($user_in["type"] == "client") {
                    ?>
                    <span>Оренда - <?php echo  $object["price_rent"]?> грн/міс.</span>
                    <?php
                }
                if ($user_in["type"] == "investor") {
                    // якщо користувач інвестор то показуємо кнопку зміни данних об'єкта
                    // і якщо він власник даного об'єкта
                    $sql = "SELECT * FROM `object_owner` WHERE `id_object` = " . $_GET["id"]." AND `id_owner` = " . $user_in["id"];
                    $col_rows_res = mysqli_num_rows(mysqli_query($connect, $sql));
                    if ($col_rows_res == 1) {
                        ?>
                        <button id="btn_edit_object">Edit data object</button>
                        <?php
                    }
                }
            ?>
            <span>Покупка - <?php echo  $object["price_buy"]?> грн.</span>
        </div>

        <div id="owner_info">
            <?php
                // знаходимо ід власника об'єкта
                $sql = "SELECT * FROM `object_owner` WHERE `id_object` = " . $_GET["id"];
                $id_owner = mysqli_fetch_assoc(mysqli_query($connect, $sql));
                if ($id_owner != null) {
                    // вибараємо дані про власника
                    $new_sql = "SELECT * FROM `users` WHERE `id` = " . $id_owner["id_owner"];
                    $owner = mysqli_fetch_assoc(mysqli_query($connect, $new_sql));
                    ?>
                        <h2> Власник: <?php echo  $owner["first_name"]?></h2>
                        <img src="<?php echo $user_in["photo"];?>" alt="qqqq">
                        <h3>Contacts:</h3>
                        <h3><?php echo  $owner["phone"]?></h3>
                        <h3><?php echo  $owner["email"]?></h3>    
                    <?php
                } else {
                    echo "<h2>Власник: сервіс Your House</h2>";
                }
            ?>     
        </div>
        
        <!-- блок з кнопками оренди та покупки -->
        <div id="btn_object_id" >
        <?php
            if ($user_in["type"] == "client") {// перевіряємо чи користувач клієнт
                $sql = "SELECT * FROM `object_owner` WHERE `id_owner` = ".$user_in['id']." AND `id_object` = ".$object['id'];
                $col_rows = mysqli_num_rows(mysqli_query($connect, $sql));
                /* якщо власність у клієнта то кнопки не активні */
                if ($col_rows == 1) { 
                    echo "<a href='/modules/objects/object_add_owner_rent.php?id_object=".$object['id']."'><button id='rent_object' disabled>Rent</button></a>";
                    echo "<a href='/modules/objects/object_add_owner_by.php?id_object=".$object['id']."'><button id='by_object' disabled>Buy</button></a>";
                } else {
                    /* якщо власність не у клієнта то перевіряємо чи клієнт вже орендує даний об'єкт */
                    if ($object["status"] == "rented") {
                        //  якщо орендує то кнопка оренди неактивна
                        echo "<a href='/modules/objects/object_add_owner_rent.php?id_object=".$object['id']."'><button id='rent_object' disabled>Rent</button></a>";
                    } else {
                        // якщо не оренду то кнопка оренди активна
                        echo "<a href='/modules/objects/object_add_owner_rent.php?id_object=".$object['id']."'><button id='rent_object'>Rent</button></a>";
                    }
                    // якщо клієнт не власник то кнопка покупки активна
                    echo "<a href='/modules/objects/object_add_owner_by.php?id_object=".$object['id']."'><button id='by_object'>Buy</button></a>";
                }
            } else {// якщо користувач інвестор
                $new_sql = "SELECT * FROM `object_owner` WHERE `id_owner` = ".$user_in['id']." AND `id_object` = ".$object['id'];
                $new_col_rows = mysqli_num_rows(mysqli_query($connect, $new_sql));
                if ($new_col_rows == 1){
                    // якщо об'єкт у власності інвестора то кнопка покупки неактивна
                    echo "<a href='/modules/objects/object_add_owner_by.php?id_object=".$object['id']."'><button id='by_object' disabled>Buy</button></a>";
                } else {
                    // якщо об'єкт не у власності інвестора то кнопка покупки активна
                    echo "<a href='/modules/objects/object_add_owner_by.php?id_object=".$object['id']."'><button id='by_object'>Buy</button></a>";
                }
                
            }
        ?>
        </div>
    </div>

    <!-- підключаємо модальне вікно зміни даних про об'єкт якщо користувач інвестор -->
    <?php 
    if ($user_in["type"] == "investor") {
        include $_SERVER["DOCUMENT_ROOT"] . "/modules/modal_window/edit_object_data_window.php"; 
    }
    ?>

    <!-- підключення скріптів -->
    <script type="text/javascript" src="../js/modal_window/edit_data.js"></script> 
</body>
</html>
<!-- головна сторінка -->

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
    <link rel="stylesheet" type="text/css" href="css/style_header.css">
    <link rel="stylesheet" type="text/css" href="css/style_modal_log_in.css">
    <link rel="stylesheet" type="text/css" href="css/style_home_content.css">
    <link rel="stylesheet" type="text/css" href="css/style_content.css">

    
    <link rel="icon" href="data:;base64,=">
</head>
<body>
    <!-- Підключення хедера -->
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/parts_of_site/header.php"; ?>

    <?php 
        // Перевіряєми чи користуач авторизований
        if (!isset($user_in)) {
            /* Підключення контента коли користувач не авторизований */
            include $_SERVER["DOCUMENT_ROOT"] . "/parts_of_site/home_content.php";
            /* Підключення модального вікна для входу/реєстрації користувачів */
            include $_SERVER["DOCUMENT_ROOT"] . "/modules/modal_window/log_in_window.php";
        } else {
            /* Підключення контента коли користувач авторизований */
            include $_SERVER["DOCUMENT_ROOT"] . "/parts_of_site/main_content.php";
        }
    ?>
    <!-- підключення скріптів -->
    <script type="text/javascript" src="js/modal_window/log_in.js"></script>
    <script type="text/javascript" src="js/objects/open_object.js"></script>
</body>
</html>
<!-- сторінка кабінету клієнта -->
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
    <link rel="stylesheet" type="text/css" href="../css/style_client_cabinet.css">
    <link rel="stylesheet" type="text/css" href="../css/style_modal_edit_personal_data.css">
    
    <link rel="icon" href="data:;base64,=">
</head>
<body>
    <!-- Підключення хедера -->
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/parts_of_site/header.php"; ?>

    <div class="content" id="cab_content">
        <div id="client_owner">
            <img src="<?php echo $user_in["photo"];?>" alt="1">
            <h2><?php echo $user_in["first_name"] . " " . $user_in["second_name"] ?></h2>
            <button id="btn_edit_data">Edit personal data</button>
        </div>

        <div id="object_in_owner">
            <table class="flexy">
                <caption>Об'єкти які знаходяться у власності або в оренді користувача</caption>
                <thead>
                    <tr>
                        <th class="list_id">Id</th>
                        <th class="list_title">Title</th>
                        <th class="list_type">Type owner</th>
                        <th class="list_option">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- підключення списку об'єктів клієнта -->
                    <?php
                        include $_SERVER["DOCUMENT_ROOT"] . "/modules/objects/object_list_client.php";  
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- підключення модального вікна зміни персональних даних користувача -->
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/modules/modal_window/edit_personal_data_window.php"; ?>
    <!-- підключення скріптів -->
    <script type="text/javascript" src="../js/objects/open_object.js"></script>
    <script type="text/javascript" src="../js/modal_window/edit_data.js"></script>
</body>
</html>
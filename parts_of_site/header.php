<!-- шапка сайта з логотипом та меню -->
<?php
    if (isset($_COOKIE["user"])) {
        $user_in = unserialize($_COOKIE["user"]);
    }
?>

<div id="header" >
    <div id="logo_title">
        <a href="/">
            <img src="../images/header/un_logo2.gif" alt="" id="logo_site">
            <span id="title_site">Your <b>HOUSE</b></span>
        </a>
    </div>
    <div id="nav_panel">
        <?php
        if (isset($user_in)) {
            // в залежності від типа користувача різні посилання на особистий кабінет
            if ($user_in["type"] == "investor") {
                ?>
                <img src="../images/header/un_investor.gif" alt="">
                <span id="name_user"><?php echo $user_in["first_name"];?></span>
                <a href="../pages/investor_cabinet.php">
                    <span>Personal cabinet</span>
                </a>
                <?php
            } else {
                ?>
                <img src="../images/header/un_client.gif" alt="">
                <span id="name_user"><?php echo $user_in["first_name"];?></span>
                <a href="../pages/client_cabinet.php">
                    <span>Personal cabinet</span>
                </a>
                <?php
            }
            ?>
            <a href="../modules/users/log_out.php">
                <img src="" alt="">
                <span>LogOut</span>
            </a>
            <?php
        } else {
            ?>
            <a href="#" id="btn_click_log_in">
                <img src="" alt="">
                <span>LogIn</span>
            </a>
            <?php
        }
        ?>
    </div>
</div>
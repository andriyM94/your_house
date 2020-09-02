<!-- функціонал реєстрації користувача -->
<?php
// база даних
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

// якщо користувач не вибрав що він інвестор автоматично йому присвоюється значення клінт
if (!isset($_POST["type"])) {
	$_POST["type"] = "client";
}
// перевіряємо чи користувач з такими даними є в базі
$sql = "SELECT * FROM `users` WHERE `user_name` = '".$_POST["user_name"]."' OR `email` = '".$_POST["email"]."'";
$result = mysqli_query($connect, $sql);
$col = mysqli_num_rows($result);

if ($col != 1) {
	if (isset($_POST["email"]) && isset($_POST["password"])) {

		$sql = "INSERT INTO `users` ( `user_name`, `email`, `password`, `type` , `photo`) VALUES ( '" . $_POST["user_name"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["type"] . "', '../images/users/user.png');";
		
		if (mysqli_query($connect, $sql)) {
			header("Location: /");
		} else {
			// якщо сталася помилка вивести її на екран
			echo "<h2> Помилка: </h2>" . mysqly_error($connect);
		}
	}
} else {
	echo "Такий користувач вже існує";
}

?>
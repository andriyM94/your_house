<!-- файл підключення до бази данних -->
<?php 
	// дані для підключення до бази даних
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "your_house";

    // mysqli_connect підключення до бази даних 
    if ($connect = mysqli_connect( $server, $username, $password, $dbname)) {
        // mysqli_set_charset - задаємо котировку для клієнта
        mysqli_set_charset($connect, 'utf8'); // якщо вдало підключилися
    } else {
        echo "ERROR"; // якщо помилка при підклюенні
    }
  
?>
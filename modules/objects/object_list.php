 <!-- блок виводу об'єктів з бази даних  -->
<?php
    // вибираємо всі об'єкти які не орендовані
    $sql = "SELECT * FROM `objects` WHERE `status` != 'rented'"; 
    $result = mysqli_query($connect, $sql);
    $col_rows = mysqli_num_rows($result);
    
    // виводимо їх 
    for ($i = 0; $i < $col_rows ; $i++) { 
        $object = mysqli_fetch_assoc($result);

        // перевіряємо чи даний об'єкт не знаходиться у власності користувача
        $new_sql = "SELECT * FROM `object_owner` WHERE `id_object` = " . $object["id"] . " AND `id_owner` = " . $user_in["id"];
        $new_result = mysqli_query($connect, $new_sql);
        $new_col_rows = mysqli_num_rows($new_result);
        if ($new_col_rows == 0){
            // якщо користувач не клієнт то виводимо об'єкт 
            if($object["owner_by"] != "client") {
            ?>
                <tr data-id=<?php echo $object["id"]?> onclick="openObjectId(this, <?php echo $object['id']?>)">
                    <td class="list_id"><?php echo $object["id"]?></td>
                    <td class="list_img">
                        <img src="<?php echo $object["images"]?>" alt="">
                    </td>
                    <td class="list_title"><?php echo $object["title"]?></td>
                    <td class="list_description"><?php echo $object["description"]?></td>
                </tr>
            <?php   
            }
        }
    }
?>

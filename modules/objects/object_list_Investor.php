 <!-- блок виводу об'єктів якіми володіє інместор -->
 <?php
  
    $sql = "SELECT * FROM `object_owner` WHERE `id_owner` = " . $user_in["id"];
    $result = mysqli_query($connect, $sql);
    $col_rows = mysqli_num_rows($result);

    for ($i = 0; $i < $col_rows ; $i++) { 
        
        $number_object = mysqli_fetch_assoc($result);
       
        $new_sql = "SELECT * FROM `objects` WHERE `id` = " . $number_object["id_object"];
        $new_result = mysqli_query($connect, $new_sql);
        $object = mysqli_fetch_assoc($new_result);
        ?>
        <tr data-id=<?php echo $object["id"]?> onclick="openObjectId(this, <?php echo $object['id']?>)">
            <td class="list_id"><?php echo $object["id"]?></td>
            <td class="list_title"><?php echo $object["title"]?></td>
            <td class="list_type"><?php echo $object["type"]?></td>
            <td class="list_img">
                <img src="<?php echo $object["images"]?>" alt="">
            </td>
            <td class="list_status">
                <?php 
                    if ($object["status"] == "") {
                        echo "Новий об'єкт";
                    } else {
                        echo $object["status"];
                    } 
                ?>
            </td>
        </tr>
        <?php    
    }
?>

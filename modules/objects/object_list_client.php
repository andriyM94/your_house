 <!-- блок виводу об'єктів для клієнта -->
 <?php
    
    // виводимо об'єкти які у власності у клієнта
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
        <td class="list_type"><?php ?>Bought</td>
        <td class="list_option">
            <?php 
                if ($object["owner_by"] != "client") {
                    ?>
                        <a href="/modules/objects/object_nobility_from_rent.php?id_object=<?php echo $object["id"];?>"><button class="btn">Зняти з оренди</button></a>
                    <?php
                } else {
                    echo "Власна нерухомість";
                }
            ?>
        </td>
    </tr>
    <?php    
    }

    // виводимо об'єкти які клієнт орендує
    $sql = "SELECT * FROM `objects` WHERE `id_user_rented` = " . $user_in["id"];
    $result = mysqli_query($connect, $sql);
    $col_rows = mysqli_num_rows($result);

    for ($i = 0; $i < $col_rows ; $i++) { 
        
        $object_rented = mysqli_fetch_assoc($result);        
    ?>
    <tr data-id=<?php echo $object_rented["id"]?> onclick="openObjectId(this, <?php echo $object_rented['id']?>)">
        <td class="list_id"><?php echo $object_rented["id"]?></td>
        <td class="list_title"><?php echo $object_rented["title"]?></td>
        <td class="list_type">Rented</td>
        <td class="list_option">
            <?php 
                if ($object_rented["owner_by"] != "client") {
                    ?>
                        <a href="/modules/objects/object_nobility_from_rent.php?id_object=<?php echo $object_rented["id"];?>"><button >Зняти з оренди</button></a>
                    <?php
                } else {
                    echo "Власна нерухомість";
                }
            ?>
        </td>
    </tr>
    <?php    
    }
?>

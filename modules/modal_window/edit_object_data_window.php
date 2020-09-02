<!-- блок модального вікна зміни даних про об'єкт -->
<?php
    $sql = "SELECT * FROM `objects` WHERE `id` = ". $_GET["id"];
    $result = mysqli_query($connect, $sql);
    $object = mysqli_fetch_assoc($result);
?>

<div class="hero modal" id="edit_data_object">
  <div class="form-box">
    <div class="close">
        <img id="btn_close_edit_object" src="../../images/modal_window/close_button.png" alt="">
    </div>

    <form id="edit_personal_data" class="input-group" action="../modules/objects/object_edit_data.php" method="POST">
        <label> Заголовок</label>  
        <input type="text" class="input-field" placeholder="" required name="title" value="<?php echo $object["title"];?>">
        <label> Опис</label>  
        <input type="text" class="input-field" placeholder="" required name="description" value="<?php echo $object["description"];?>">
        <label> Ціна оренди</label>  
        <input type="text" class="input-field" placeholder="" required name="price_rent" value="<?php echo $object["price_rent"];?>">
        <label> Ціна покупки</label>  
        <input type="text" class="input-field" placeholder="" required name="price_buy" value="<?php echo $object["price_buy"];?>">
        <button class="submit-btn" type="submit" name="id" value=<?php echo $object["id"];?>>Edit data</button>
    </form>
  </div>
</div>
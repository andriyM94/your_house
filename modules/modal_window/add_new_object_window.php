<!-- блок модального вікна добавлення нового об'єкта в базу данних -->
<div class="hero modal" id="add_object">
  <div class="form-box">
    <div class="close">
        <img id="btn_close_add_object" src="../../images/modal_window/close_button.png" alt="">
    </div>

    <form id="edit_personal_data" class="input-group" action="../modules/objects/object_add_new.php" method="POST">
        <input type="text" class="input-field" placeholder="Заголовок" required name="title" value="">
        <input type="text" class="input-field" placeholder="Опис" required name="description" value="">
        <input type="text" class="input-field" placeholder="Адреса" required name="adress" value="">
        <input type="text" class="input-field" placeholder="Ціна оренди" required name="price_rent" value="">
        <input type="text" class="input-field" placeholder="Ціна покупки" required name="price_buy" value="">
        <input id="apartment" type="radio" class="input-field" placeholder=""  name="type" checked value="apartment"><lable for="apartment" class="name_chek one">Apartament</lable>
        <input id="house" type="radio" class="input-field" placeholder=""  name="type" value="house"><lable for="house" class="name_chek two">House</lable>
        <button class="submit-btn" type="submit">ADD new object</button>
    </form>
  </div>
</div>
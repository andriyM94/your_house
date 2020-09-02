<!-- модальне вікно зміни персональних даних клієнта -->
<div class="hero modal" id="edit_data">
  <div class="form-box">
    <div class="close">
        <img id="btn_close" src="../../images/modal_window/close_button.png" alt="">
    </div>

    <form id="edit_personal_data" class="input-group" action="../modules/users/edit_personal_data.php" method="POST">
        <label> Ім'я</label>  
        <input type="text" class="input-field" placeholder="" required name="first_name" value="<?php echo $user_in["first_name"];?>">
        <label> Призвіще</label>  
        <input type="text" class="input-field" placeholder="" required name="second_name" value="<?php echo $user_in["second_name"];?>">
        <label> Телефон</label>  
        <input type="text" class="input-field" placeholder="" required name="phone" value="<?php echo $user_in["phone"];?>">
        <button class="submit-btn" type="submit">Edit data</button>
    </form>
  </div>
</div>
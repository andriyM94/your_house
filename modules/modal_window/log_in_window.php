<!-- модальне вікно авторизції/реєстрації клієнта -->

<div class="hero modal" id="log_in_modal">
  <div class="form-box">
    <div class="close">
        <img id="btn_close" src="../../images/modal_window/close_button.png" alt="">
    </div>
    <div class="button-box">
      <div id="btn"></div>
      <button type="button" class="toggle-btn" onclick="login()">Log In</button>
      <button type="button" class="toggle-btn" onclick="register()">Register</button>
    </div>

    <!-- Авторизація клієнта -->
    <form id="login" class="input-group" action="../modules/users/log_in.php" method="POST">
      <input type="text" class="input-field" placeholder="Username" required name="user_name">
      <input type="password" class="input-field" placeholder="Password" required name="password">
      <button class="submit-btn" type="submit">Log In</button>
    </form>

    <!-- Реєстрація клієнта -->
    <form id="register" class="input-group" action="../modules/users/registration.php" method="POST">
      <input type="text" class="input-field" placeholder="Username" required name="user_name">
      <input type="email" class="input-field" placeholder="Email" required name="email">
      <input type="password" class="input-field" placeholder="Password" required name="password">
      <input type="checkbox" class="check-box" name="type" value="investor"><span>I am investor</span>
      <button class="submit-btn" type="submit">Register</button>
    </form>
  </div>
</div>
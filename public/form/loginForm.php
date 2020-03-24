<form method="post" class="form-logining page__form-logining font-color show--block">
    <div class="box-mail form-logining__box-mail">
        <label for="inputEmail">Enter your email</label>
        <input
                name="email"
                id="inputEmail"
                type="email"
                class="box-mail__input-mail style-input"
                placeholder="arya@westeros.com"
            <?php if (isset($_POST['email'])): ?>
                value='<?= $_POST['email'] ?>'
            <? endif; ?>
                required
        />
        <p id="errorEmail" class="error"
            <?php if (isset($_SESSION['errorEmail'])): ?>
                style="visibility: visible"
                <? unset($_SESSION['errorEmail']);
            endif; ?>
        >Your mail does not match the template! Correct the mail.</p>
    </div>
    <div class="form-logining__box-pass">
        <label for="inputPassword">Choose secure password</label>
        <p>Must be at least 8 characters</p>
        <input
                name="password"
                id="inputPassword"
                type="password"
                class="box-mail__input-pass style-input"
                placeholder="password"
                required
                minlength="8"
                maxlength="16"
            <?php if (isset($_POST['password'])): ?>
                value='<?= $_POST['password'] ?>'
            <? endif; ?>
        />
        <p id="errorPass" class="error"
            <?php if (isset($_SESSION['errorPass'])): ?>
                style="visibility: visible"
                <?php unset($_SESSION['errorPass']);
            endif; ?>
        >Your password is less than 8 characters. Correct the password.</p>
    </div>
    <div class="form-logining__check-box">
        <input name="checkbox" id="checkbox" type="checkbox" class="checkbox"/>
        <label for="checkbox">Remember me</label>
    </div>
    <div class="form-logining__button">
        <input type="submit" name="loginButton" id="buttonLoginForm" value="Sing Up">
    </div>
    <p class="error"
        <?php if (isset($_SESSION['userFound'])): ?>
            style="visibility: visible"
            <?php unset($_SESSION['userFound']);
        endif; ?>
    >The user with this mail is already registered in the database.</p>
</form>
<script src="public/js/loginForm.js"></script>

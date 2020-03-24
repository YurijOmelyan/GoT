<form method="post" class="form-save page__form-save font-color">
    <div class="form-save__message">
        <p>You've successfully joined the game.</p>
        <p>Tell us more about yourself.</p>
    </div>
    <div class="form-save__username">
        <label for="inputUserName">Who are you?</label>
        <p>Alpha-numeric username</p>
        <input
                name="userName"
                id="inputUserName"
                type="text"
                class="style-input"
                placeholder="arya"
                pattern="\w+"
                maxlength="20"
                required
            <?php if (isset($_POST['userName'])) : ?>
                value="<?= $_POST['userName']; ?>"
            <? endif; ?>
        />
        <p id="errorUserName" class="error"
            <?php if (isset($_SESSION['errorUserName'])) : ?>
                style="visibility: visible"
                <? unset($_SESSION['errorUserName']);
            endif; ?>
        >Your username does not match the pattern. Correct the username.
        </p>
    </div>
    <div class="form-save__house">
        <label for="selectHouse">Your Great House</label>
        <select id="selectHouse" class="select-house style-input" name="house">
            <option value="0" selected>Select House
                <?php getSelect(); ?>
        </select>
        <p id="errorSelectHouse" class="error"
            <?php if (isset($_SESSION['errorSelectHouse'])) : ?>
                style="visibility: visible"
                <? unset($_SESSION['errorSelectHouse']);
            endif; ?>
        >You have not chosen a home. Choose a house.
        </p>
    </div>
    <div>
        <label for="textareaAboutMe">Your preferences, hobbies, wishes, etc.</label>
        <textarea
                name="aboutMe"
                id="textareaAboutMe"
                class="about-me style-input"
                cols="30"
                rows="10"
                placeholder="I have a long TOKILL list..."
                required
        ><?php if (isset($_POST['aboutMe'])) {
                echo $_POST['aboutMe'];
            } ?></textarea>
        <p id="errorAboutMe" class="error"
            <?php if (isset($_SESSION['errorAboutMe'])) : ?>
                style="visibility: visible"
                <? unset($_SESSION['errorAboutMe']);
            endif; ?>
        >Indicate your hobby.</p>
    </div>
    <div class="form-save__button">
        <input type="submit" name="profileButton" value="Save">
    </div>
    <?php if (isset($_SESSION['success'])) : ?>
        <p>Your data has been saved successfully.</p>
        <?
        unset($_SESSION);
        session_destroy();
    endif; ?>
</form>
<script src="public/js/profileForm.js"></script>
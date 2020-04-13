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
                value=""
                required
        />
        <p id="errorUserName" class="error"
        >Your username does not match the pattern. Correct the username.
        </p>
    </div>
    <div id="boxSelect" class="form-save__house">
        <label for="selectHouse">Your Great House</label>
        <p id="errorSelectHouse" class="error">You have not chosen a home. Choose a house.</p>
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
        ></textarea>
        <p id="errorAboutMe" class="error">Indicate your hobby.</p>
    </div>
    <div class="form-save__button">
        <input type="submit" name="profileButton" value="Save">
    </div>
    <p id="successMessage" class="hide--message">Your data has been saved successfully.</p>
</form>
<script src="../public/js/profile/profileForm.js"></script>

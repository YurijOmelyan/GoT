const doc = document;

$(document).ready(function () {
    $(function () {
        $("select")
            .selectBoxIt({
                autoWidth: false,
                showFirstOption: false,
                showEffect: "fadeIn",
                showEffectSpeed: 400,
                hideEffect: "fadeOut",
                hideEffectSpeed: 400
            })
            .change(function () {
                $(".flexslider").flexslider(this.value - 1);
            });
    });
});

/** check textarea */
const aboutMe = doc.getElementById("textareaAboutMe");
let clickAboutMe = false;
aboutMe.addEventListener("input", function(event) {
    if (clickAboutMe) {
        validateData(aboutMe);
        hideOrShowMessage(errorAboutMe, !aboutMe.checkValidity());
    } else {
        aboutMe.onblur = () => {
            clickAboutMe = true;
            validateData(aboutMe);
            hideOrShowMessage(errorAboutMe, !aboutMe.checkValidity());
        };
    }
});

/** checking select house*/
const selectHouse = doc.getElementById("selectHouse");
selectHouse.addEventListener("change", function(event) {
    if (selectHouse.selectedIndex > 0) {
        validData(selectHouse);
    }
    defaultData(selectHouse);
    hideOrShowMessage(errorSelectHouse, selectHouse.selectedIndex === 0);
});

/** checking username */
let clickUserName = false;
const userName = doc.getElementById("inputUserName");
userName.addEventListener("input", function(event) {
    if (clickUserName) {
        validateData(userName);
        hideOrShowMessage(errorUserName, !userName.checkValidity());
    } else {
        userName.onblur = () => {
            clickUserName = true;
            validateData(userName);
            hideOrShowMessage(errorUserName, !userName.checkValidity());
        };
    }
});


const doc = document;
/** button Form Logining */
doc.getElementById("buttonLoginForm").onclick = () => {
    let test = email.checkValidity() && pass.checkValidity();
    hideOrShowMessage(errorEmail, !email.checkValidity());
    hideOrShowMessage(errorPass, !pass.checkValidity());
};

/**checking mail*/
let clickEmail = false;
const email = doc.getElementById("inputEmail");
email.addEventListener("input",      function(event) {
    if (clickEmail) {
        validateData(email);
        hideOrShowMessage(errorEmail, !email.checkValidity());
    } else {
        email.onblur = () => {
            clickEmail = true;
            validateData(email);
            hideOrShowMessage(errorEmail, !email.checkValidity());
        };
    }
});

/**password verification */
let clickPass = false;
const pass = doc.getElementById("inputPassword");
pass.addEventListener("input", function(event) {
    if (clickPass) {
        validateData(pass);
        hideOrShowMessage(errorPass, !pass.checkValidity());
    } else {
        pass.onblur = () => {
            clickPass = true;
            validateData(pass);
            hideOrShowMessage(errorPass, !pass.checkValidity());
        };
    }
});


const doc = document;

/** button Form Save */
doc.getElementById("buttonFormSave").onclick = () => {
  const test =
    userName.checkValidity() &&
    selectHouse.selectedIndex > 0 &&
    aboutMe.checkValidity();

  hideOrShowMessage(errorUserName, !userName.checkValidity());
  hideOrShowMessage(errorSelectHouse, selectHouse.selectedIndex === 0);
  hideOrShowMessage(errorAboutMe, !aboutMe.checkValidity());
  if (!test) {
    return;
  }
};

function hideOrShowMessage(el, check) {
  if (check) {
    el.classList.remove("hide--message");
    el.classList.add("show--message");
  } else {
    el.classList.remove("show--message");
    el.classList.add("hide--message");
  }
}

/** button Form Logining */
doc.getElementById("buttonFormLogining").onclick = () => {
  let test = email.checkValidity() && pass.checkValidity();
  hideOrShowMessage(errorEmail, !email.checkValidity());
  hideOrShowMessage(errorPass, !pass.checkValidity());
  if (!test) {
    return;
  }

  doc.querySelector(".form-logining").classList.remove("show--block");
  doc.querySelector(".form-logining").classList.add("hide--block");

  doc.querySelector(".form-save").classList.remove("hide--block");
  doc.querySelector(".form-save").classList.add("show--block");
};

/** check textarea */
const aboutMe = doc.getElementById("textareaAboutMe");
let clickAboutMe = false;
aboutMe.addEventListener("input", function(event) {
  if (clickAboutMe) {
    validateData(aboutMe);
  } else {
    aboutMe.onblur = () => {
      clickAboutMe = true;
      validateData(aboutMe);
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
});

/** checking username */
let clickUserName = false;
const userName = doc.getElementById("inputUserName");
userName.addEventListener("input", function(event) {
  if (clickUserName) {
    validateData(userName);
  } else {
    userName.onblur = () => {
      clickUserName = true;
      validateData(userName);
    };
  }
});

/**checking mail*/
let clickEmail = false;
const email = doc.getElementById("inputEmail");
email.addEventListener("input", function(event) {
  if (clickEmail) {
    validateData(email);
  } else {
    email.onblur = () => {
      clickEmail = true;
      validateData(email);
    };
  }
});

/**password verification */
let clickPass = false;
const pass = doc.getElementById("inputPassword");
pass.addEventListener("input", function(event) {
  if (clickPass) {
    validateData(pass);
  } else {
    pass.onblur = () => {
      clickPass = true;
      validateData(pass);
    };
  }
});

/**we will check the data entered into the element */
function validateData(elem) {
  if (elem.validity.valueMissing) {
    elem.classList.remove("valid--data");
    elem.classList.remove("invalid--data");
    return;
  }
  if (elem.checkValidity()) {
    elem.classList.add("valid--data");
    elem.classList.remove("invalid--data");
  } else {
    elem.classList.remove("valid--data");
    elem.classList.add("invalid--data");
  }
}

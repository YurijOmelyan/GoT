/*const doc = document;

$(document).ready(function() {
  $(function() {
    $(".flexslider").flexslider({
      slideshowSpeed: 5000,
      directionNav: false,
      controlNav: false
    });
    $("select")
      .selectBoxIt({
        autoWidth: false,
        showFirstOption: false,
        showEffect: "fadeIn",
        showEffectSpeed: 400,
        hideEffect: "fadeOut",
        hideEffectSpeed: 400
      })
      .change(function() {
        $(".flexslider").flexslider(this.value - 1);
      });
  });
});

/** button Form Save */
/*doc.getElementById("buttonFormSave").onclick = () => {
  const selectHouseBoxIt = doc
    .getElementById("selectHouseSelectBoxItText")
    .getAttribute("data-val");
  const test =
    userName.checkValidity() && selectHouseBoxIt > 0 && aboutMe.checkValidity();

  hideOrShowMessage(errorUserName, !userName.checkValidity());
  hideOrShowMessage(errorSelectHouse, selectHouseBoxIt == 0);
  hideOrShowMessage(errorAboutMe, !aboutMe.checkValidity());
  if (!test) {
    return;
  }
};
*/
/*function hideOrShowMessage(el, check) {
  const hideMessage = "hide--message";
  const showMessage = "show--message";

  if (check) {
    el.classList.remove(hideMessage);
    el.classList.add(showMessage);
  } else {
    el.classList.remove(showMessage);
    el.classList.add(hideMessage);
  }
}

/** button Form Logining */
/*doc.getElementById("buttonFormLogining").onclick = () => {
  let test = email.checkValidity() && pass.checkValidity();
  hideOrShowMessage(errorEmail, !email.checkValidity());
  hideOrShowMessage(errorPass, !pass.checkValidity());
  if (!test) {
    return;
  }

  const showBlock = "show--block";
  const hideBlock = "hide--block";

  const formLogining = ".form-logining";
  doc.querySelector(formLogining).classList.remove(showBlock);
  doc.querySelector(formLogining).classList.add(hideBlock);

  const formSave = ".form-save";
  doc.querySelector(formSave).classList.remove(hideBlock);
  doc.querySelector(formSave).classList.add(showBlock);
};

/** check textarea */
/*const aboutMe = doc.getElementById("textareaAboutMe");
let clickAboutMe = false;
aboutMe.addEventListener("input", function(event) {
  console.log(aboutMe.checkValidity());
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
/*const selectHouse = doc.getElementById("selectHouse");
selectHouse.addEventListener("change", function(event) {
  if (selectHouse.selectedIndex > 0) {
    validData(selectHouse);
  }
  defaultData(selectHouse);
  hideOrShowMessage(errorSelectHouse, selectHouse.selectedIndex === 0);
});

/** checking username */
/*let clickUserName = false;
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

/**checking mail*/
/*let clickEmail = false;
const email = doc.getElementById("inputEmail");
email.addEventListener("input", function(event) {
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
/*let clickPass = false;
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

/**we will check the data entered into the element */
/*function validateData(elem) {
  const validData = "valid--data";
  const invalidData = "invalid--data";

  if (elem.validity.valueMissing) {
    elem.classList.remove(validData);
    elem.classList.remove(invalidData);
    return;
  }
  if (elem.checkValidity()) {
    elem.classList.add(validData);
    elem.classList.remove(invalidData);
  } else {
    elem.classList.remove(validData);
    elem.classList.add(invalidData);
  }
}
*/
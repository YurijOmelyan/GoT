const doc = document;

/** button Form Save */
doc.getElementById("buttonFormSave").onclick = () => {
  let test = userName.checkValidity() && selectHouse.selectedIndex > 0;

  errorUserName.style.visibility = !userName.checkValidity()
    ? "visible"
    : "hidden";

  console.log(selectHouse.selectedIndex);
  errorSelectHouse.style.visibility =
    selectHouse.selectedIndex === 0 ? "visible" : "hidden";

  if (!test) {
    return;
  }
};

/** button Form Logining */
doc.getElementById("buttonFormLogining").onclick = () => {
  let test = email.checkValidity() && pass.checkValidity();

  errorEmail.style.visibility = !email.checkValidity() ? "visible" : "hidden";
  errorPass.style.visibility = !pass.checkValidity() ? "visible" : "hidden";

  if (!test) {
    return;
  }
  doc.querySelector(".form-logining").style.display = "none";
  doc.querySelector(".form-save").style.display = "flex";
};

/** checking select house*/
let clickSelectHouse = false;
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
    defaultData(elem);
    return;
  }
  if (elem.checkValidity()) {
    validData(elem);
  } else {
    invalidData(elem);
  }
}
/**set initial styles */
function defaultData(elem) {
  elem.style.cssText = `
  border-right:none;
  border-left:none;
  border-top:none;
  `;
}
/**change element styles in case of correct data */
function validData(elem) {
  elem.style.cssText = `
  border-right:1px solid green;
  border-left:1px solid green;
  border-top:1px solid green;
  `;
}
/**change element styles in case of incorrect data */
function invalidData(elem) {
  elem.style.cssText = `
  border-right:1px solid red;
  border-left:1px solid red;
  border-top:1px solid red;
  `;
}

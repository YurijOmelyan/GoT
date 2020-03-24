function hideOrShowMessage(el, check) {
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
/**we will check the data entered into the element */
function validateData(elem) {
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
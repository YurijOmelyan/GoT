const hideMessage = "hide--message";
const showMessage = "show--message";
const validData = "valid--data";
const invalidData = "invalid--data";
const listElementsProfileForm = new Map([
    ['userName', ['#inputUserName', '#errorUserName']],
    ['aboutMe', ['#textareaAboutMe', '#errorAboutMe']],
    ['house', ['#selectHouse', '#errorSelectHouse']]
]);

const listElementsAuthForm = new Map([
    ['mail', ['#inputEmail', '#errorEmail']],
    ['pass', ['#inputPassword', '#errorPass']]
]);

const select = '#boxSelect label';
const successMessage = '#successMessage';

class DomElement {
    constructor(element, flag, elementError) {
        this.element = element;
        this.flag = flag;
        this.elementError = elementError;
    }
}


function setEventListener(listElement) {
    for (let key of listElement.keys()) {
        let arr = listElement.get(key);
        let object = new DomElement(getElement(arr[0]), false, getElement(arr[1]))
        setEventListenerElement(object);
    }
}

function getElement(selector) {
    return doc.querySelector(selector);
}


function setEventListenerElement(obj) {
    let element = obj.element;
    let elementError = obj.elementError;
    element.addEventListener("input", function (event) {
        if (obj.flag) {
            validateData(element);
            hideOrShowMessage(elementError, !element.checkValidity());
        } else {
            element.onblur = () => {
                obj.flag = true;
                validateData(element);
                hideOrShowMessage(elementError, !element.checkValidity());
            };
        }
    });

}

function hideOrShowMessage(el, check) {

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


function showError(element, errorContainer, obj, key) {
    $(element).addClass(invalidData);
    $(errorContainer).removeClass(hideMessage).addClass(showMessage);
    $(errorContainer).html(obj[key]);
}

function hideError(element, errorContainer) {
    $(errorContainer).addClass(hideMessage).removeClass(showMessage);
    $(element).removeClass(invalidData);
}

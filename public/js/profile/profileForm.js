
$(doc).ready(function () {
    /*
    * load the select
    * */
    $.post(PATH_MAIN_CONTROLLER, {'component': 'select'}).done(function (res) {
        $(select).after(res);
        setEventListener(listElementsProfileForm);
    });

    $('form').submit(function (e) {

        e.preventDefault();
        const userName = listElementsProfileForm.get('userName')[0];
        const aboutMe = listElementsProfileForm.get('aboutMe')[0];
        const selectValue = listElementsProfileForm.get('house')[0];

        const
            data = {
                'profile': 'data',
                'data': {
                    'userName': $(userName).val(),
                    'aboutMe': $(aboutMe).val(),
                    'house': $(selectValue).val()
                }
            };

        $.post(PATH_MAIN_CONTROLLER, data).done(function (res) {
            let obj = JSON.parse(res);
            let isErrorInDataForm = false;
            for (let key of listElementsProfileForm.keys()) {
                let arr = listElementsProfileForm.get(key);
                if (key in obj) {
                    showError(arr[0], arr[1], obj, key)
                    isErrorInDataForm = true;
                } else {
                    hideError(arr[0], arr[1]);
                }
            }
            if (!isErrorInDataForm && 'form' in obj) {
                getForm({'form': obj['form']});
            }

            if (!isErrorInDataForm && 'result' in obj && obj['result'] === 'successfully') {
                $(successMessage).removeClass(hideMessage).addClass(showMessage);
            }
        })
    });


});


$(doc).ready(function () {
    $('form').submit(function (e) {


        e.preventDefault();
        const mail = '#inputEmail';
        const pass = '#inputPassword';

        const data = {
            'authorization': 'user',
            'user': {
                'mail': $(mail).val(),
                'pass': $(pass).val()
            }
        };

        $.post(PATH_MAIN_CONTROLLER, data).done(function (res) {
            let obj = JSON.parse(res);
            let isErrorInDataForm = false;
            for (let key of listElementsAuthForm.keys()) {
                let arr = listElementsAuthForm.get(key);
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
        })
    });
    setEventListener(listElementsAuthForm);
});

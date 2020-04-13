const PATH_MAIN_CONTROLLER = 'mainController.php';
const slider = '#slider';
const form = '#form';
const doc = document;

$(doc).ready(function () {

    /*
    * load the slider
    * */
    $.post(PATH_MAIN_CONTROLLER, {'component': 'slider'}).done(function (res) {
        $(slider).html(res);
    });

    /*
    * load authorization form
    * */
    let data = {'form': 'authForm'};
    getForm(data);

});

function getForm(data) {
    $.post(PATH_MAIN_CONTROLLER, data).done(function (res) {
        let obj = JSON.parse(res);
        if ('form' in obj) {
            $(form).html(obj['form']);
        }
    });
}

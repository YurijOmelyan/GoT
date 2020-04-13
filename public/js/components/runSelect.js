$(doc).ready(function () {
    $(function () {
        $("select").selectBoxIt({
            autoWidth: false,
            showFirstOption: false,
            showEffect: "fadeIn",
            showEffectSpeed: 400,
            hideEffect: "fadeOut",
            hideEffectSpeed: 400
        }).change(function () {
            $(".flexslider").flexslider(this.value - 1);
        });
    });
});

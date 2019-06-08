$(function () {
    $("#date").bootstrapMaterialDatePicker({
        weekStart: 0,
        lang: "ja",
        time: false,
        format: "YYYY-M-D",
        minDate: moment() // 本日以降
    });
    $("#deadline").bootstrapMaterialDatePicker({
        weekStart: 0,
        lang: "ja",
        time: false,
        format: "YYYY-M-D"
    });
});

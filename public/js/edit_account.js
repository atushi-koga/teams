$(function () {
    var $pass = $('#pass');
    var $pass_input = $pass.find('input');
    var $pass_conf = $('#pass-conf');
    var $pass_conf_input = $pass_conf.find('input');
    $('input[name=change_pass]').on('change', function () {
        console.log($(this).prop('checked'));
        if ($(this).prop('checked')) {
            $pass.removeClass('d-none');
            $pass_input.prop('disabled', false);
            $pass_conf.removeClass('d-none');
            $pass_conf_input.prop('disabled', false);
        } else {
            $pass.addClass('d-none');
            $pass_input.prop('disabled', true);
            $pass_conf.addClass('d-none');
            $pass_conf_input.prop('disabled', true);
        }
    });
});

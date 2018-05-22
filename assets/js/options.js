$(document).ready(function() {

    $checkbox_button = $('#_customize-input-noa_header_button_control');

    $checkbox_button.change(function() {
        console.log($(this).checked);
    });
});
jQuery(document).ready(function () {
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    jQuery('#event-start').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    jQuery('#event-end').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    jQuery('#registration-start').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    jQuery('#registration-end').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });
});
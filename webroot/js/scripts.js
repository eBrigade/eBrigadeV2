// ---------------------------------------------------------------------------------------------GENERAL

// datepicker jquery
function date(selector, range, def) {
    $(selector).datepicker({
        dayNamesMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
        monthNamesShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec"],
        dateFormat: "yy-mm-dd",
        defaultDate: def,
        firstDay: 1,
        changeMonth: true,
        changeYear: true,
        beforeShow: function(input, inst) {
            $(document).off('focusin.bs.modal');
        },
        onClose:function(){
            $(document).on('focusin.bs.modal');
        },
        yearRange: range
    });
}

// modal
function modal(selector, controller) {
    $(selector).click(function () {
        $('.my-modal-cont').load(controller, function () {
            $('#myModal').modal({show: true});
        });
    });
}

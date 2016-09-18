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
            $('#myModal').modal({show: false});
        });
    });
}

// autocomplete ville
var options_ac = {
    url: window.location.origin + "/files/cities.json",

    getValue: function(element) {
        return element.zipcode + ' | ' + element.city.toUpperCase();
    },
    list: {
        onSelectItemEvent: function() {
            var index = $("#ville").getSelectedItemData().id;
            $("#city-id").val(index).trigger("change");
        },
        maxNumberOfElements: 100,
        match: {
            enabled: true
        }
    },
    theme: "square"
};

// collapse
function expand(div, footer, classe) {
    $(div).click(function () {
        $(footer).toggleClass(classe);
        if ($(footer).hasClass(classe)) {
            $(div).html('<i class="glyphicon glyphicon-chevron-down"></i> TOUT VOIR  <i class="glyphicon glyphicon-chevron-down"></i>');
        }
        else {
            $(div).html('<i class="glyphicon glyphicon-chevron-up"></i> REDUIRE  <i class="glyphicon glyphicon-chevron-up"></i>');
        }
    });
}
//default values
var p2 = 0.25;
var e1 = 0.25;
var e2 = 0.25;

//on change events
$('#public-headcount').keyup(function () {
    p1 = $(this).val();
    calculris();
});

$('#operation-activity-id').on('change', function () {
    var p2cases = [0.25, 0.30, 0.35, 0.40, 0.40];
    p2 = p2cases[$(this).val() - 1];
    calculris();
});

$('#operation-environment-id').on('change', function () {
    var e1cases = [0.25, 0.30, 0.35, 0.40];
    e1 = e1cases[$(this).val() - 1];
    calculris();
});

$('#operation-delay-id').on('change', function () {
    var e2cases = [0.25, 0.30, 0.35, 0.40];
    e2 = e2cases[$(this).val() - 1];
    calculris();
});



//function to calculate RIS
function calculris() {


    if (p1 <= 100000) {
        p = p1;
    } else if (p1 > 100000) {
        p = 100000 + ((p1 - 100000) / 2);
    }
    i = p2 + e1 + e2;
    ris = i * (p / 1000);
    $('#public-ris').val(ris.toFixed(2));
    $('#ris').val(ris.toFixed(2));

    pub = $('#operation-type-id');
    switch (true) {
        case ris <= 0.25:
            pub.val(1);
            break;
        case 0.25 < ris && ris <= 1.125:
            pub.val(2);
            break;
        case 1.125 < ris && ris <= 12:
            pub.val(3);
            break;
        case 12 < ris && ris <= 36:
            pub.val(4);
            break;
        case 36 < ris:
            pub.val(5);
    }
}
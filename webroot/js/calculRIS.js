function calculris() {

    p1 = document.getElementById('public-headcount').value;
    ap2 = document.getElementById('operation-activity-id');
    var p2cases = [0.25, 0.30, 35, 0.40, 0.40];
    p2 = p2cases[ap2.options[ap2.selectedIndex].value + 1];
    console.log(p1);


    /*p2 = parseFloat(ap2.options[ap2.selectedIndex].value);*/
    ae1 = document.getElementById('operation_environment_id');
    e1 = parseFloat(ae1.options[ae1.selectedIndex].value);
    ae2 = document.getElementById('operation_delay_id');
    e2 = parseFloat(ae2.options[ae2.selectedIndex].value);
    pub = document.getElementById('operation_type_id');
    if (p1 <= 100000) {
        p = p1;
    } else if (p1 > 100000) {
        p = 100000 + ((p1 - 100000) / 2);
    }
    i = p2 + e1 + e2;
    ris = i * (p / 1000);
    document.getElementById('public_ris').value = ris;
    console.log(ris);
    switch (true) {
        case ris <= 0.25:
            pub.value = 'PAS DE DISPOSITIF';
            break;
        case 0.25 < ris & ris <= 1.125:
            pub.value = "POINT D'ALERTE ET DE PREMIER SECOURS";
            break;
        case 1.125 < ris & ris <= 12:
            pub.value = "DPS DE PETITE ENVERGURE";
            break;
        case 12 < ris & ris <= 36:
            pub.value = "DPS DE MOYENNE ENVERGURE";
            break;
        case 36 < ris:
            pub.value = "DPS DE GRANDE ENVERGURE";
    }
}
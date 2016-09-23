
    </div>
</div>

<script>
    //    $('#tbl').find('input:checkbox[id$="a_chkDelete"]').click(function() {
    //        var isChecked = $(this).prop("checked");
    //        var $selectedRow = $(this).parent("td").parent("tr");
    //
    //        if (isChecked) $selectedRow.css({
    //            "background-color": "#D4FFAA"
    //        });
    //        else $selectedRow.css({
    //            "background-color": ''
    //        });
    //    });


    $("#bt_user").click(function () {
        $('#user').removeClass('hidden');
        $('#event').addClass('hidden');
        $('#vehi').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $("#bt_event").click(function () {
        $('#event').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#vehi').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $("#bt_vehi").click(function () {
        $('#vehi').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#event').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $("#bt_mat").click(function () {
        $('#mat').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#event').addClass('hidden');
        $('#vehi').addClass('hidden');
    });

    if (window.location.href.indexOf("sort=Operations") > -1) {
        $('#user').addClass('hidden');
        $('#vehi').addClass('hidden');
        $('#mat').addClass('hidden');
        $('#event').removeClass('hidden');
    }
</script>

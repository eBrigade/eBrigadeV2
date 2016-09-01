
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<!--Autocomplete sur le champ ville-->
<script>
    var availableTags;
    $.get("<?= $this->Url->build('/files/city.txt'); ?>", function(data) {
        availableTags = data.split(',');
        $("[name=city_name]").autocomplete({source:availableTags})
    });
</script>
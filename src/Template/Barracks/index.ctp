<?= $this->Html->css('tree.css') ?>
<?= $this->Html->script('tree.js')?>

<h3><?= __('Toutes les Casernes') ?></h3>

<div class='easy-tree'>
<?php

function RecursiveCategories($array) {

    if (count($array)) {
            echo "\n
<ul class=''>\n";
foreach ($array as $vals) {
echo "
    <li id=\"".$vals['id']."\">         ".$vals['name'];
    if (count($vals['children'])) {
    RecursiveCategories($vals['children']);
    }
    echo "</li>\n";
}
echo "</ul>\n";
}
} ?>
<?= RecursiveCategories($categories) ?>
</div>




<script>
    (function ($) {
        function init() {
            $('.easy-tree').EasyTree({
                selectable: true,
                deletable: false,
                editable: false,
                addable: false,
                i18n: {

            }
        });
        }

        window.onload = init();
    })(jQuery)
</script>
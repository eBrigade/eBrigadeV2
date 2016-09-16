<h3><?= __('Toutes les Casernes') ?></h3>

<div class="col-md-12">
<?php

function RecursiveCategories($array) {

    if (count($array)) {
            echo "\n<ul class='tree'>\n";
foreach ($array as $vals) {
echo "<li id=\"".$vals['id']."\"><a href=\"".$vals['id']."\">".$vals['name']."</li></a>";
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
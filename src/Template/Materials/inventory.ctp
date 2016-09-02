<?php
    echo '<h1>' . $barrack->name . '</h1>';
    foreach($materials as $material){
        echo $material->name . ' : ' . $material->material_count;
        echo '<br>';
    }
?>
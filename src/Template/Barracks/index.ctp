<?= $this->Html->css('tree.css') ?>
<?= $this->Html->script('tree.js')?>
<div class='col-md-2'>

    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> Afficher par
                </a>
                </li>

                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>">Arborescence</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'filter']); ?>">Liste & filtres</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active"  ><a href="javascript:;"> Options
                </a>
                </li>

                <li id="bttoopen"><a href="javascript:;">Ouvrir l'arbre</a></li>
                <li id="bttoclose"><a href="javascript:;">Fermer l'arbre</a></li>
            </ul>
        </div>
    </div>



</div>
<div class='col-md-10'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('Vue arborescente des Casernes') ?>
       </div>
        <div class="panel-body panel-color">

    <div class='easy-tree'>
<?php

function RecursiveCategories($array) {

    if (count($array)) {
            echo "\n
<ul class=''>\n";
foreach ($array as $vals) {
echo "
    <li id=\"".$vals['id']."\">     ".$vals['name'];
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
</div></div>
</div>



<script>
    (function ($) {
        function init() {
            $('.easy-tree').EasyTree({
                selectable: false,
                deletable: false,
                editable: false,
                addable: false,
                i18n: {
            }
        });
        }

        window.onload = init();
    })(jQuery)

    function closeEasyTree(){
        var parent = $(".easy-tree").find('li.parent_li');
        var children = parent.find(' > ul > li');
        if (children.is(':visible')) {
            children.hide('fast');
            parent.children('span').find(
                    ' > span.glyphicon').addClass(
                    'glyphicon-plus-sign').removeClass(
                    'glyphicon-minus-sign');
        }
    }

    function openEasyTree(){
        var parent = $(".easy-tree").find('li.parent_li');
        var children = parent.find(' > ul > li');
        if (children.is(':hidden')) {
            children.show('fast');
            parent.children('span').find(
                    ' > span.glyphicon').removeClass(
                    'glyphicon-plus-sign').addClass(
                    'glyphicon-minus-sign');
        }
    }

    $( "#bttoclose" ).click(function() {
        closeEasyTree();
    });

    $( "#bttoopen" ).click(function() {
        openEasyTree();
    });

    $( ".url" ).click(function() {
       var link = $(this).closest('[id]').attr('id');
        location.href = 'barracks/view/' +link;
    });




</script>
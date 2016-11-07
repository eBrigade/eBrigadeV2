<?= $this->Html->css('tree.css') ?>
<?= $this->Html->script('tree.js')?>
<div class='col-md-3'>

    <div class="sidebar-nav ">
        <div class="navbar linkout" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active"  ><a href="javascript:;"> Options
                </a>
                </li>

                <li id="bttoopen"><a href="javascript:;">Ouvrir l'arbre</a></li>
                <li id="bttoclose"><a href="javascript:;">Fermer l'arbre</a></li>
            </ul>
        </div>
    </div>




    <div class="sidebar-nav ">
        <div class="navbar linkout" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> AFFICHER PAR
                </a></li >
                <li ><a id="index" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>"><i class="fa fa-list fa-lg " aria-hidden="true"></i> Liste </a></li>
                <li ><a id="annuaire" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire']); ?>"><i class="fa fa-table fa-lg " aria-hidden="true"></i> Fiche </a></li>
                <li ><a id="arbre" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'tree']); ?>"><i class="fa fa-tree fa-lg " aria-hidden="true"></i> Arborescence </a></li>
                <li ><a id="carte" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte']); ?>"><i class="fa fa-globe fa-lg " aria-hidden="true"></i> Carte</a></li>
            </ul>
        </div>
    </div>





</div>
<div class='col-md-9'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('Vue arborescente des Casernes') ?>
       </div>
        <div class="panel-body panel-color">

    <div class='easy-tree'>
<?php
function tree($array) {
            echo "<ul>";
        foreach ($array as $barrack) {
        echo "
        <li id=\"".$barrack['id']."\" data-name=\"".strtolower(str_replace(' ', '-', removeAccents($barrack['name'])))."\"> ".$barrack['name'];
            if ($barrack['children']) {
            tree($barrack['children']);
            }
            echo "
        </li>
        ";
        }
        echo "</ul>";

        }
        ?>


        <?= tree($categories) ?>
</div>
</div></div>
</div>


<?php
function removeAccents($keywords) {
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
  return str_replace($a, $b, $keywords);
}
?>

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
        var name = $(this).closest('[data-name]').attr('data-name');
        location.href = '../caserne/' + link + '-' + name ;
    });


    closeEasyTree();


        $('#arbre').append('<i class="fa fa-check-circle fa-lg action" aria-hidden="true"></i> ').css("font-weight","Bold");

</script>
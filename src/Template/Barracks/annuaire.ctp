<?php $cell = $this->cell('Barrack') ?>
<?= $cell ?>


<div class='col-md-9'>
    <div class="row">
        <?php foreach ($barracks as $barrack): ?>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= h($barrack->name) ?></h3>

                    <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>'),
                    ['controller' => 'barracks', 'action' => 'delete', $barrack->id],
                    [
                    'class' => 'btn btn-sm btn-danger pull-right mgblist upmarge',
                    'escape' => false,
                    'data-original-title' => 'Supprimer cette caserne',
                    'data-toggle' => 'tooltip',
                    'confirm' => __('Etes-vous sûr de vouloir supprimer cette caserne')
                    ]
                    ) ?>

                    <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'edit', $barrack->id,strtolower(str_replace(' ', '-', removeAccents($barrack->name)))]); ?>"
                       data-original-title="Editer cette caserne" data-toggle="tooltip" type="button"
                       class="btn btn-sm btn-warning pull-right upmarge"><i class="glyphicon glyphicon-edit"></i></a>

                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class=" col-md-12 col-lg-12 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td width="35%">Ville :</td>
                                    <td><?= $barrack->city->city.' ('.$barrack->city->zipcode.')' ?></td>
                                </tr>
                                <tr>
                                    <td>Adresse :</td>
                                    <td><?= h($barrack->address) ?><br>
                                        <?= h($barrack->address_complement) ? : '<br>' ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><?= h($barrack->email) ?></td>
                                </tr>
                                <td>Téléphone</td>
                                <td><?= h($barrack->phone) ?><br><br><?= h($barrack->fax) ?>
                                    <?= ($barrack->fax) ? '(fax)' : '<br>' ?>
                                </td>

                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view', $barrack->id ,strtolower(str_replace(' ', '-', removeAccents($barrack->name)))]); ?>"
                       class="btn btn-primary btn-sm " data-original-title="Voir la fiche détaillée"
                       data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i> DETAILS</a>
                    <a href="<?= $this->Url->build(['controller' => 'messages','action' => 'send','caserne', $barrack->id , 'prefix' => 'messagerie']); ?>"
                       class="btn btn-primary  btn-sm" data-original-title="Envoyer un message privé" data-toggle="tooltip"><i
                            class="glyphicon glyphicon-envelope"></i> MP</a>
                    <?php
            if (!empty($barrack->website_url)){
                    echo '<a href="http://'.$barrack->website_url .'" target="_blank"
                             class="btn btn-primary  btn-sm pull-right" data-original-title="Visitez le site"
                             data-toggle="tooltip"><i class="glyphicon glyphicon-link"></i> SITE WEB</a>' ;
                    } ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précedant')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>

    <?php
function removeAccents($keywords) {
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
  return str_replace($a, $b, $keywords);
}
?>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>

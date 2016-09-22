<body xmlns="http://www.w3.org/1999/html">
<div class="container-fluid clearfix">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                <li class="list-group-item">
                    A ce jour il manque toujours 2 équipiers
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    <p><b>Titre:</b> <?= $formation->title ?></p>
                </li>
                <li class="list-group-item">
                    <div class="row-fluid">
                        <b>Localisation</b>
                        <p>Carte:</p>
                        <p>Ville : <?= $formation->has('city') ? h($formation->city->city) : '' ?></p>
                        <p>Address : <?= $formation->address ?></p></div>

                    <div class="row-fluid">
                        <b>Date</b>
                        <p><?= $formation->formation_start->format('Y/m/d') ?> à <?= $formation->formation_end->format('Y/m/d') ?></p>
                        <p><?= $formation->formation_start->format('H/i') ?> à <?= $formation->formation_end->format('H/i') ?></p>
                    </div>

                    <div class="row-fluid">
                        <b>horraire</b>
                        <p><?= $formation->horraires ?></p>
                    </div>

                    <div class="row-fluid">
                        <b>Consignes générales</b>
                        <p><?= $formation->instruction ?></p>
                    </div>
                    <div class="row-fluid">
                        <b>Prix</b>
                        <p><?= $formation->price ?> €</p>
                    </div>
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                    <button type="submit" class="btn btn-info btn-sm">Ajouter un document</button>
                    Documents liés à la mission
                </li>
                <li class="list-group-item">
                    Lien vers les documents
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-8">
            <li class="list-group-item list-group-item-info haha">
                <div class="my-modal-base">
                    <div class="my-modal-cont"></div>
                </div>
                <div class="btn btn-info btn-sm" id="bt-aj-eq-for">Ajouter une Mission</div>
                Détails de la mission
            </li>
            </br>
            <?= $this->cell('Event',[$formation->id]) ?>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
<script>
    $('#bt-aj-eq-for').click(function () {
        var url = '<?= $this->Url->build(['controller' => 'Formations', 'action' => 'addevent', $formation->id]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });
</script>
</body>
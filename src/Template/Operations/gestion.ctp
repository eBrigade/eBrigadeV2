<div class="container-fluid clearfix">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                <li class="list-group-item">
                    <?= h($event->instructions) ?>
                </li>
                <li class="list-group-item">
                    A ce jour il manque toujours 2 équipiers
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    Foire à la Choucroute de Strasbourg
                </li>
                <li class="list-group-item">
                    <div class="row-fluid">
                        <b>Localisation</b>
                        <p>Une belle petite carte google de localisation ?</p></div>

                    <div class="row-fluid">
                        <b>Consignes générales</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>

                    <div class="row-fluid">
                        <b>Consignes pour équipes public</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid">
                        <b>Consignes pour équipes acteurs</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid">
                        <b>Enfin bref, toutes les infos du formulaires qui sont utiles</b>
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
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                    <button type="submit" class="btn btn-info btn-sm">Ajouter une équipe</button>
                    Détails de la mission
                </li>

                </li>
                <?php if (!empty($event->teams)): ?>

                    <?php foreach ($event->teams as $teams): ?>
                <li class="list-group-item">

                    <div class="btn-group">


                        <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                        <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link(__("Modifier les informations de l'équipe"), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?= $this->Html->link(__("Supprimer l'équipe et ses moyens"), ['controller' => 'Teams', 'action' => 'delete', $teams->id]) ?></li>
                            <li><a href="#">Vider la liste des équipiers</a></li>
                            <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <p><b>ID de l'équipe : <?= h($teams->id) ?></b></p>
                        <p><b>Nom de l'équipe : </b><?= h($teams->name) ?></p>
                        <p><b>Horaires : </b>de 8h à 12h</p>
                        <p><b>Lieu de rendez-vous : </b>Caserne de Raon-aux-Bois</p>
                        <p><b>Positionnement : </b>début de la course</p>
                        <p><b>Mission principale : </b>Public et Acteurs</p>
                        <p><b>Consignes : <?= h($teams->description) ?></b>Le Lorem Ipsum est simplement du faux texte
                            employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux
                            texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla
                            ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a
                            pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique,
                            sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la
                            vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par
                            son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid clearfix">

                        <ul class="list-group col-xs-6 col-sm-6 col-md-6">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Inscrire du personnel</button>
                                <span class="badge badge-danger">3/4</span>
                            </li>
                            <li class="list-group-item"><?= $this->Form->link($event) ?>

                                    <?php

                                    echo $this->Form->input('teams.users._ids', [$users]),
                                $this->Form->button(__('Submit'));
                                    ?>
                                    <?= $this->Form->end() ?>
                                </li>
                            <?php if (!empty($teams->users)): ?>

                                <?php foreach ($teams->users as $users): ?>
                                    <li class="list-group-item"><?= h($users->firstname) ?> <?= h($users->lastname) ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Affecter du matériel</button>
                                <span class="badge badge-danger">3</span>
                            </li>
                            <li class="list-group-item">Champ d'ajout et bouton</li>
                            <?php if (!empty($teams->materials)): ?>

                                <?php foreach ($teams->materials as $materials): ?>
                                    <li class="list-group-item">vehicle ID : <?= h($materials->id) ?></li>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </ul>

                        <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Affecter des véhicules</button>
                                <span class="badge badge-danger">2</span>
                            </li>
                            <li class="list-group-item">Champ d'ajout et bouton</li>
                            <?php if (!empty($teams->vehicles)): ?>

                                <?php foreach ($teams->vehicles as $vehicles): ?>
                                    <li class="list-group-item">vehicle ID : <?= h($vehicles->id) ?></li>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </ul>
                    </div>

                </li>
                <?php endforeach; ?>

                <?php endif; ?>

            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
<footer>
</footer>

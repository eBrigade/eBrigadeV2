<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="<?= $this->Url->image('logo.png') ?>"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">




                <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Gestion <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                            Evénements <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" class="dropdown-header">Evénements</li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Events','action' => 'index' , 'prefix' => false]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voir </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Events','action' => 'add' , 'prefix' => false]); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Créer  </a></li>
                                <li role="presentation" class="dropdown-header">Evénements d'Equipe</li>
                                <li><a href="<?= $this->Url->build(['controller' => 'EventsTeams','action' => 'index', 'prefix' => false ]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voir </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'EventsTeams','action' => 'add', 'prefix' => false ]); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Créer </a></li>
                                <li role="presentation" class="dropdown-header">A supprimer ou deplacer ?</li>
                                <li><?= $this->Html->link(__('List Event Equipments'), ['controller' => 'EventsEquipments', 'action' => 'index', 'prefix' => false]) ?></li>
                                <li><?= $this->Html->link(__('New Event Equipment'), ['controller' => 'EventsEquipments', 'action' => 'add', 'prefix' => false]) ?></li>
                                <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventsVehicles', 'action' => 'index', 'prefix' => false]) ?></li>
                                <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventsVehicles', 'action' => 'add', 'prefix' => false]) ?></li>
                            </ul>
                        </li>


                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                            Opérations<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'Operations','action' => 'index', 'prefix' => false ]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voir </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Operations','action' => 'add' , 'prefix' => false]); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Créer </a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'Formations','action' => 'index' , 'prefix' => false]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voir </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Formations','action' => 'add', 'prefix' => false ]); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Créer </a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Utilisateurs <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'index' , 'prefix' => false]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Parcourir la Liste </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'add', 'prefix' => false ]); ?>">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Créer un Compte </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Skills','action' => 'index' , 'prefix' => false]); ?>">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    Voir les Compétences  </a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"><span class="glyphicon glyphicon-wrench"></span> Matériel <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="<?= $this->Url->build(['controller' => 'Materials','action' => 'index', 'prefix' => false ]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voir le matériel</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Materials','action' => 'add', 'prefix' => false ]); ?>">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Ajouter du matériel</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'MaterialTypes','action' => 'index' , 'prefix' => false]); ?>">
                                    <i class="fa fa-folder-open-o" aria-hidden="true"></i> Type de matériel</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Materials','action' => 'add', 'prefix' => false ]); ?>">
                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Créer un type </a></li>
                                <li class="divider"></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'MaterialStocks','action' => 'index', 'prefix' => false ]); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Consulter le stock </a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'MaterialStocks','action' => 'add' , 'prefix' => false]); ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Emprunter du matériel </a></li>
                                <li class="divider"></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Orders','action' => 'index', 'prefix' => false ]); ?>">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Commander du matériel </a></li> </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"><i class="fa fa-ambulance" aria-hidden="true"></i> Casernes <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'Barracks','action' => 'add' , 'prefix' => false]); ?>"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Ajouter  une caserne</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Barracks','action' => 'gestionuser'  , 19, 'protection-civile-des-vosges', 'prefix' => false]); ?>"><i class="fa fa-cogs" aria-hidden="true"></i> Gestion des casernes</a></li>
                            </ul>
                        </li>
              </ul>
                </li>




                    <li><a href="<?= $this->Url->build(['controller' => 'Barracks','action' => 'index' , 'prefix' => false ]); ?>"><i class="fa fa-ambulance" aria-hidden="true"></i>
                        Casernes</a></li>

                <li><a href="<?= $this->Url->build(['controller' => 'Calendar','action' => 'index', 'prefix' => 'calendrier' ]); ?>"><span class="glyphicon glyphicon-calendar"></span> Calendrier</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search" id="searchbox">
                    <div class="input-group" >
                        <input  type="text" class="form-control searchbar" placeholder="Personnel, caserne, ...">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                    </div>
                </form>

                <?php $cell = $this->cell('Notifications');
                echo $cell; ?>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-envelope"></span></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Messages','action' => 'send' , 'prefix' => 'messagerie' ]); ?>"><span class="glyphicon glyphicon-pencil"></span> Ecrire un Mail</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Messages','action' => 'index' , 'prefix' => 'messagerie']); ?>"><span class="glyphicon glyphicon-inbox"></span> Reception </a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Messages','action' => 'dispatch' , 'prefix' => 'messagerie' ]); ?>"><span class="glyphicon glyphicon-send"></span> Envoyé</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-warning-sign"></span> Archivé</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Corbeille</a></li>
                    </ul>
                </li>

                <li class="dropdown">

                    <?php $cell = $this->cell('Login');
                    echo $cell; ?>

                </li>
            </ul>
        </div>
    </div>
</nav>








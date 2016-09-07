<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

$cakeDescription = 'Ebrigade';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('bootstrap-theme.css') ?>
        <?= $this->Html->css('styles.css') ?>

        <?= $this->Html->script('http://code.jquery.com/jquery.min.js') ?>
        <?= $this->Html->script('bootstrap.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ebrigade v2</a>
                </div>
                <ul class="nav navbar-nav">
                    <?= $this->element('navigation') ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?= $this->cell('Login') ?>
                </ul>
            </div>
        </nav>
        <?= $this->Flash->render() ?>

        <div class="container-fluid clearfix">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                        <li class="list-group-item">
                            Le rendez-vous est fixé à 10h00 à la caserne 8 routes d'Arches 88220 Raon-aux-Bois        
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
                                <b>Localisation</b><p>Une belle petite carte google de localisation ?</p></div> 

                            <div class="row-fluid">
                                <b>Consignes générales</b><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                            </div>  

                            <div class="row-fluid">
                                <b>Consignes pour équipes public</b><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                            </div> 
                            <div class="row-fluid">
                                <b>Consignes pour équipes acteurs</b><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                            </div> 
                            <div class="row-fluid">
                                <b>Enfin bref, toutes les infos du formulaires qui sont utiles</b>
                            </div> 
                        </li>                        

                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">Documents liés à la mission</li>
                        <li class="list-group-item">
                            Lien vers les documents        
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">Détails de la mission</li>
                        <li class="list-group-item">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Nom nouvelle équipe">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword3">Password</label>
                                    <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Nombre d'équipiers">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword3">Date et horaire de début</label>
                                    <input type="datetime" class="form-control" id="exampleInputPassword3" placeholder="Débute le à">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword3">Date et horaire de fin</label>
                                    <input type="datetime" class="form-control" id="exampleInputPassword3" placeholder="Termine le à">

                                </div>    

                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword3">Position de l'équipe</label>
                                    <input type="datetime" class="form-control" id="exampleInputPassword3" placeholder="Position de l'équipe">
                                </div>    
                                <br /><textarea class="form-control" rows="3" class="row">Consignes à l'équipe</textarea>
                                <button type="submit" class="btn btn-danger">Ajouter une équipe</button>
                            </form>
                        </li>
                        <li class="list-group-item">

                            <div class="btn-group">

                                <button type="button" class="btn btn-info">Equipe ALPHA 001 - de 8h à 22h30 - 4 équipiers</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Supprimer l'équipe et ses moyens</a></li>
                                    <li><a href="#">Vider la liste des équipiers</a></li>
                                    <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                                </ul>
                            </div>
                            <div class="row-fluid">
                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                            </div>
                            <div class="row-fluid clearfix">

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Personnel(s)</li>
                                    <li class="list-group-item">Champ d'ajout et bouton</li>
                                    <li class="list-group-item">Jean-Christophe</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>    

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Matériel</li>
                                    <li class="list-group-item">Champ d'ajout et bouton</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>   

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Véhicule(s)</li>
                                    <li class="list-group-item">VPSP 882 - AZ-852-FR</li>
                                    <li class="list-group-item">Jean-Christophe</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>   
                            </div>

                        </li>
                        <li class="list-group-item">

                            <div class="btn-group">

                                <button type="button" class="btn btn-info">Equipe BETA 001 - de 8h à 22h30 - 4 équipiers</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Supprimer l'équipe et ses moyens</a></li>
                                    <li><a href="#">Vider la liste des équipiers</a></li>
                                    <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                                </ul>
                            </div>
                            <div class="row-fluid">
                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                            </div>
                            <div class="row-fluid clearfix">

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Personnel(s)</li>
                                    <li class="list-group-item">Champ d'ajout et bouton</li>
                                    <li class="list-group-item">Jean-Christophe</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>    

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Matériel</li>
                                    <li class="list-group-item">Champ d'ajout et bouton</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>   

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">Véhicule(s)</li>
                                    <li class="list-group-item">VPSP 882 - AZ-852-FR</li>
                                    <li class="list-group-item">Jean-Christophe</li>
                                    <li class="list-group-item">Nicolas</li>
                                </ul>   
                            </div>

                        </li>
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
    </body>
</html>
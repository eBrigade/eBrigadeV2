<div class="row">
    <div class="col-sm-12 col-md-12 text-center">
        <h2>Profil de <?= h($user->login) ?>
        <?= ($this->request->session()->read('Auth.User.id') == $user->id) ?
            $this->Html->link('Editer '.$this->Html->icon('pencil'),
                ['action' => 'edit',$user->id],
                [
                    'escape' => false,
                    'class' => 'btn btn-danger btn-xs'
                ]
            )
                : '' ?>
        </h2>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user"></span>  Informations
            </div>
            <div class="panel-body">
                <table class="vertical-table">
                    <tr>
                        <th><?= __('Firstname') ?></th>
                        <td><?= h($user->firstname) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Lastname') ?></th>
                        <td><?= h($user->lastname) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Birthname') ?></th>
                        <td><?= h($user->birthname) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Birthday') ?></th>
                        <td><?= h($user->birthday) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Birthplace') ?></th>
                        <td><?= h($user->birthplace) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Address') ?><br></th>
                        <td><?= h($user->address) ?>
                    </tr>
                    <tr>
                        <th><!-- 2e ligne d'adresse --></th>
                        <td><?= h($user->zipcode) . ' - '.h($user->city->city) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-earphone"></span>  Contacts
            </div>
            <div class="panel-body">
                <table class="vertical-table">
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Phone') ?></th>
                        <td><?= h($user->phone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Cellphone') ?></th>
                        <td><?= h($user->cellphone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Worphone') ?></th>
                        <td><?= h($user->workphone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Skype') ?></th>
                        <td><?= h($user->skype) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-home"></span>  Rattachement
            </div>
            <div class="panel-body">
                <table class="vertical-table">
                    <tr>
                        <th><?= __('Barracks') ?></th>
                        <td><?php
                                foreach($user->barracks as $barrack)
                                {
                                    echo $barrack->name .' '
                                        .$this->Html->link('Voir '.$this->Html->icon('eye-open'),
                                            ['controller' => 'Barracks','action'=>'view',$barrack->id],
                                            ['escape'=>false,'class'=>'btn btn-primary btn-xs']
                                        );
                                }
                            ?></td>
                    </tr>
                    <th><?= __('Teams') ?></th>
                    <td><?php
                            foreach($user->teams as $team)
                            {
                                echo $team->name;
                            }
                    ?></td>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-briefcase"></span>  Compétences
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    <?php
                        foreach($user->skills as $skill)
                        {
                            echo '<li class="list-group-item"><label>'.$skill->name.' : </label><br>';
                            echo 'Obtenu(e) le : '.$skill->_joinData->date_acquired.'<br>';
                            echo 'Valable jusqu\'au : '.$skill->_joinData->validity_date.'</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

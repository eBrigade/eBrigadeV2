<div id="teamModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une équipe à cet événement</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($team) ?>
                    <fieldset>
                        <div id="show-address">
                            <ul class="list-group">
                                <li  class="list-group-item list-group-item-success">
                                    <p><b>Cliquer pour renseigner une adresse.</b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Par défaut les latitudes et longitudes seront celles de l'opération associée et pourront être modifiées sur la carte.</p>
                                </li>
                            </ul>
                        </div>
                        <div id="address" style="display: none">
                            <?php
                            echo $this->Form->input('address');
                            echo $this->Form->input('ville');
                            ?>
                        </div>
                        <?php
                        echo $this->Form->input('city_id', ['type' => 'text' , 'type' => 'hidden']);


                        echo $this->Form->input('name');
                        echo $this->Form->input('description');
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?= $this->Html->script('jquery-ui.js') ?>

        $('#show-address').on('click', function () {
            $('#address').toggle(300);
        });

        //datetimepicker on date fields
        $('#start').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });

        $('#end').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });
    </script>
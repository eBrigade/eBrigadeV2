<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une event à cette Formation</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($formation_event, ['horizontal' => true]) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('title', ['label' => 'Titre']);
                        echo $this->Form->hidden('id');
                        echo $this->Form->input('instructions', ['label' => 'Consigne']);
                        echo $this->Form->input('event_start_date', ['label' => 'Debut Event', 'id' => 'datepickerdebu', 'type' => 'text', 'class' => 'btn btn-default']);
                        echo $this->Form->input('event_end_date', ['label' => 'Fin Event', 'id' => 'datepickerend', 'type' => 'text', 'class' => 'btn btn-default']);
                        echo $this->Form->input('horaires', ['label' => 'Horraire']);
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
        <?= $this->Html->script('jquery-ui') ?>
        <?= $this->Html->script('jquery.datetimepicker.full.min') ?>
        <?= $this->Html->css('jquery.datetimepicker') ?>
        <?php foreach ($date_start as $date): ?>
            <script>
                $.datetimepicker.setLocale('fr');
                $(function () {
                    var date_debut = $('#datepickerdebu');
                    var date_fin = $('#datepickerend');
                    date_debut.datetimepicker({
                        i18n: {
                            fr: {
                                months: [
                                    'Janvier', 'Fevrier', 'Mars', 'Avril',
                                    'Mai', 'Juin', 'Jullier', 'Aout',
                                    'Septembre', 'Octobre', 'Novembre', 'Decembre'
                                ],
                                dayOfWeek: [
                                    "Dim.", "Lun", "Mar", "Mer",
                                    "Jeu", "Vre", "Sam."
                                ]
                            }
                        },
                        format: 'Y-m-d H:i',
                        startDate: '<?= $date->formation_start->format('Y/m/d') ?>',
                        onShow: function (ct) {
                            this.setOptions({
                                maxDate: date_fin.val() ? date_fin.val() : false
                            })
                        }
                    });
                    date_fin.datetimepicker({
                        i18n: {
                            fr: {
                                months: [
                                    'Janvier', 'Fevrier', 'Mars', 'Avril',
                                    'Mai', 'Juin', 'Jullier', 'Aout',
                                    'Septembre', 'Octobre', 'Novembre', 'Decembre'
                                ],
                                dayOfWeek: [
                                    "Dim.", "Lun", "Mar", "Mer",
                                    "Jeu", "Vre", "Sam."
                                ]
                            }
                        },
                        format: 'Y-m-d H:i',
                        onShow: function (ct) {
                            this.setOptions({
                                minDate: date_debut.val() ? date_debut.val() : false
                            })
                        }
                    });
                });
            </script>
        <?php endforeach; ?>
    </div>

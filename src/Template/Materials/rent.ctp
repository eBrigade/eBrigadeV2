<h1>Inventaire <?= $barrack->name ?></h1>
<div class="row">
    <div class="col-md-6">
        <h3>Formulaire d'emprunt</h3>
        <!-- Formulaire d'envoi -->
        <?= $this->Form->create() ?>
        <?= $this->Form->input('material_id', ['options' => $materials]) ?>
        <?= $this->Form->input('quantity',['type' => 'number','min' => '1','value' => '1', 'max' => '2']) ?>
        <?= $this->Form->day('day') ?>
        <?= $this->Form->month('month',[
            'monthNames' => 'false'
        ]) ?>
        <?= $this->Form->year('year') ?>
        <?= $this->Form->button(__('Réserver')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-md-6">
        <h3>Matériels empruntés</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Matériel</th>
                <th>Nb</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->complete_name ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->nb ?></td>
                    <td><?= $user->from_date ?></td>
                    <td><?= ($user->to_date != null) ? $user->to_date : 'Indéterminé' ?></td>
                    <td><?= ($user->user_id == $userId) ? $this->Html->link(__('Rendre'),['action' => 'back']) : '' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $("select").on("change",function(){
        var str = $("option:selected").html();
        var start = str.indexOf('(')+1;
        var end = str.indexOf(')',start);
        var result = str.substring(start,end);
        $("input[type='number']").attr("max",result);
    });
    $("input[type=number]").on("change",function(){
        var str = $("option:selected").html();
        var start = str.indexOf('(')+1;
        var end = str.indexOf(')',start);
        var result = str.substring(start,end);
        $(this).attr("max",result);
    });
</script>
<?= $this->Html->script('ajax.js') ?>
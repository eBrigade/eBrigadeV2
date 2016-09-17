

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <h2>Filtre multicritères</h2>
            <form id="filter">
                <div class="form-group">
                    <label for="barrack">Caserne</label>
                    <select class="form-control" name="barrack" id="barrack">
                        <?php if (!empty($barracklist)): ?>
                            <?php foreach ($barracklist as $barrack): ?>
                                <option value="<?= $barrack->id ?>"><?= $barrack->name ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Valider les choix</button>
            </form>




            <ul class="list-group-item team" id="filter-list">

            </ul>

        </div>
    </div>
</div>

<script>
    $("#filter").submit(function(event) {

        event.preventDefault();
        var datafilter = { barrackID: $('select[name=barrack]').val()};
        console.log()
        $('#filter-list').load('/Operations/userlist/', datafilter);
    });



</script>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('birthname');
            echo $this->Form->input('email');
            echo $this->Form->input('login');
            echo $this->Form->input('password');
            echo $this->Form->input('phone');
            echo $this->Form->input('cellphone');
            echo $this->Form->input('workphone');
            echo $this->Form->input('address');
            echo $this->Form->input('address_complement');
            echo $this->Form->input('zipcode');
        echo $this->Form->input('ville');
        echo $this->Form->input('city_id', ['type' => 'text' , 'type' => 'hidden']);
            echo $this->Form->input('birthday', ['empty' => true]);
            echo $this->Form->input('birthplace');
            echo $this->Form->input('skype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $("#ville").easyAutocomplete(options_ac);
</script>
<div class="barracks form large-9 medium-8 columns content">
    <?= $this->Form->create($barrack) ?>
    <fieldset>
        <legend><?= __('Add Barrack') ?></legend>
        <?php
			echo $this->Form->input('parent_id', [
					'options' => $parentBarracks,
					'empty' => 'Pas de caserne parente'
					]);            
 			echo $this->Form->input('code');
			echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('address_complement');
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('phone');
            echo $this->Form->input('fax');
            echo $this->Form->input('email');
            echo $this->Form->input('website_url');
            echo $this->Form->input('ordre');
            echo $this->Form->input('rib');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="ingredients form">
<?php echo $this->Form->create('Ingredient');?>
	<fieldset>
		<legend><?php __('Add Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('libelle');
		echo $this->Form->input('typ');
		echo $this->Form->input('unit');
		echo $this->Form->input('kcal');
		echo $this->Form->input('price');
		echo $this->Form->input('img');
		echo $this->Form->input('commissions');
		//echo $this->Form->input('Recette');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ingredients', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
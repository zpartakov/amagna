<div class="ingredients form">
<?php echo $this->Form->create('Ingredient');?>
	<fieldset>
		<legend><?php __('Edit Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('libelle');
		echo $this->Form->input('typ');
		echo $this->Form->input('unit');
		echo $this->Form->input('kcal');
		echo $this->Form->input('price');
		echo $this->Form->input('img');
		echo $this->Form->input('commissions');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Ingredient.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Ingredient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ingredients', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
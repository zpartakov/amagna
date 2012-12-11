<div class="ustensiles form">
<?php echo $this->Form->create('Ustensile');?>
	<fieldset>
		<legend><?php __('Edit Ustensile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('groupe');
		echo $this->Form->input('lib');
		echo $this->Form->input('img');
		echo $this->Form->input('note');
		echo $this->Form->input('last_update');
		echo $this->Form->input('Recette');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Ustensile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Ustensile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ustensiles', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="etapes form">
<?php echo $this->Form->create('Etape');?>
	<fieldset>
		<legend><?php __('Edit Etape'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order');
		echo $this->Form->input('text');
				echo $fck->load('Etape.text');
		
		echo $this->Form->input('url');
		echo $this->Form->input('image');
		echo $this->Form->input('sound');
		echo $this->Form->input('video');
		echo $this->Form->input('notes');
				echo $fck->load('Etape.notes');
		echo $this->Form->input('Recette');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Etape.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Etape.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Etapes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>

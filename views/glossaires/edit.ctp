<div class="glossaires form">
<?php echo $this->Form->create('Glossaire');?>
	<fieldset>
		<legend><?php __('Edit Glossaire'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('libelle');
		echo $this->Form->input('definition1');
						echo $fck->load('Glossaire.definition1');
		
		echo $this->Form->input('definition2');
		echo $this->Form->input('definition3');
		echo $this->Form->input('definition4');
						echo $fck->load('Glossaire.definition4');
		echo $this->Form->input('source');
		echo $this->Form->input('type');
		echo $this->Form->input('image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Glossaire.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Glossaire.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Glossaires', true), array('action' => 'index'));?></li>
	</ul>
</div>

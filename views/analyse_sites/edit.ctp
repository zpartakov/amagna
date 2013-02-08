<div class="analyseSites form">
<?php echo $this->Form->create('AnalyseSite');?>
	<fieldset>
		<legend><?php __('Edit Analyse Site'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('soft');
		echo $this->Form->input('url');
		echo $this->Form->input('calc_invites');
		echo $this->Form->input('calc_ingredients');
		echo $this->Form->input('formats');
		echo $this->Form->input('langage');
		echo $this->Form->input('glossaire');
		echo $this->Form->input('icones');
		echo $this->Form->input('graphisme');
		echo $this->Form->input('audio');
		echo $this->Form->input('video');
		echo $this->Form->input('sequencage');
		echo $this->Form->input('automatisation');
		echo $this->Form->input('facilite');
		echo $this->Form->input('user_id');
		echo $this->Form->input('date_mod');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AnalyseSite.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AnalyseSite.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Analyse Sites', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
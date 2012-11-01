<div class="glossaires form">
<?php echo $this->Form->create('Glossaire');?>
	<fieldset>
		<legend><?php __('Add Glossaire'); ?></legend>
	<?php
		echo $this->Form->input('libelle');
		echo $this->Form->input('definition1');
		echo $this->Form->input('definition2');
		echo $this->Form->input('definition3');
		echo $this->Form->input('definition4');
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

		<li><?php echo $this->Html->link(__('List Glossaires', true), array('action' => 'index'));?></li>
	</ul>
</div>
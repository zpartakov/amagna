<div class="stopwords form">
<?php echo $this->Form->create('Stopword');?>
	<fieldset>
 		<legend><?php __('Edit Stopword'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lib');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Stopword.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Stopword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stopwords', true), array('action' => 'index'));?></li>
	</ul>
</div>
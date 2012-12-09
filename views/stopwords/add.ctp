<div class="stopwords form">
<?php echo $this->Form->create('Stopword');?>
	<fieldset>
 		<legend><?php __('Add Stopword'); ?></legend>
	<?php
		echo $this->Form->input('lib');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stopwords', true), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="lespages form">
<?php echo $this->Form->create('Lespage');?>
	<fieldset>
 		<legend><?php __('Add Lespage'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('introtext');
		echo $this->Form->input('fulltext');
		echo $this->Form->input('publish_up');
		echo $this->Form->input('publish_down');
		echo $this->Form->input('images');
		echo $this->Form->input('urls');
		echo $this->Form->input('metadesc');
		echo $this->Form->input('featured');
		echo $this->Form->input('language');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lespages', true), array('action' => 'index'));?></li>
	</ul>
</div>
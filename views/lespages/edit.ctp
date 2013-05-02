<div class="lespages form">
<?php echo $this->Form->create('Lespage');?>
	<fieldset>
 		<legend><?php __('Edit Lespage'); ?></legend>
	<?php
	//$wysiwyg->changeEditor("fck");
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('introtext');
						echo $fck->load('Lespage.introtext');
		
		echo $this->Form->input('fulltext', array("style"=>"width: 80%; height: 800px"));
								echo $fck->load('Lespage.fulltext');
		
		//$wysiwyg->textarea("Lespage.fulltext");
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Lespage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Lespage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lespages', true), array('action' => 'index'));?></li>
	</ul>
</div>

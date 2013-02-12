<div class="analyseSites form">
<?php echo $this->Form->create('AnalyseSite');?>
	<fieldset>
		<legend><?php __('Add Analyse Site'); ?></legend>
	<?php
		echo $this->Form->input('soft', array('type'=>'textarea'));
		echo $this->Form->input('facilite', array('type'=>'textarea'));
		echo $this->Form->input('url', array('style'=>'width: 300px'));
		echo $this->Form->input('rss', array('style'=>'width: 300px'));
		echo $this->Form->input('lang', array('style'=>'width: 50px', 'value'=>'fr'));
		echo $this->Form->input('calc_invites', array('type'=>'textarea'));
		echo $this->Form->input('calc_ingredients', array('type'=>'textarea'));
		echo $this->Form->input('formats', array('type'=>'textarea'));
		echo $this->Form->input('langage', array('type'=>'textarea'));
		echo $this->Form->input('glossaire', array('type'=>'textarea'));
		echo $this->Form->input('icones', array('type'=>'textarea'));
		echo $this->Form->input('graphisme', array('type'=>'textarea'));
		echo $this->Form->input('audio', array('type'=>'textarea'));
		echo $this->Form->input('video', array('type'=>'textarea'));
		echo $this->Form->input('sequencage', array('type'=>'textarea'));
		echo $this->Form->input('automatisation', array('type'=>'textarea'));
		echo $this->Form->input('user_id', array('type'=>'hidden', 'value'=>$session->read('Auth.User.id')));
		echo $this->Form->input('date_mod', array('type'=>'textarea', 'value'=>date("Y-m-d h:i:s")));
		echo $this->Form->input('note', array('type'=>'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Analyse Sites', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
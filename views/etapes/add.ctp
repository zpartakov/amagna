<div class="etapes form">
<?php echo $this->Form->create('Etape');?>
	<fieldset>
		<legend><?php __('Add Etape'); ?></legend>
		<input type="submit">
	<?php
		echo $this->Form->input('order');
		echo $this->Form->input('text');
		echo $this->Form->input('url');
		echo $this->Form->input('image');
		echo $this->Form->input('sound');
		echo $this->Form->input('video');
		echo $this->Form->input('notes');
		if($_GET['recette']){
		//echo $_GET['recette'];	
		echo $this->Form->input('Recette');
		} else {
		echo $this->Form->input('Recette');
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Etapes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
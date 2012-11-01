<?php 
//echo "bug editing: when saving, ingredients quantity lost; wait Fred to fix the bug! in the meanwhile, make modifications directly to the mysql database using phpmyadmin";
//echo "ingredients:<br>";
//print_r($ingredients);

//exit;
?><div class="recettes form">
	<li><?php echo $this->Html->link(__('Modifier les ingrédients de cette recette', true), 
	array('controller' => 'recettes', 'action' => 'ingredients/'.$this->Form->value('Recette.id'))); ?> </li>
	<br />
<?php echo $this->Form->create('Recette');?>
	<fieldset>
		<legend><?php __('Edit Recette'); ?></legend>
		<?php
	
//echo $this->Form->input('ingredients_recettes',array('type'=>'array', 'value' => $ingredients));
	
		echo $this->Form->input('id');
		echo $this->Form->input('country_id');
		echo $this->Form->input('titre');
		echo $this->Form->input('temps');
		echo $this->Form->input('ingr');
		echo $this->Form->input('pers');
		echo $this->Form->input('type_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('prep');
		echo $this->Form->input('date');
		echo $this->Form->input('score');
		echo $this->Form->input('source');
		echo $this->Form->input('pict');
		echo $this->Form->input('private');
		echo $this->Form->input('Etape');
		//echo $this->Form->input('Ingredient');
		echo $this->Form->input('Modecuisson');
		echo $this->Form->input('Orthographe');
		echo $this->Form->input('Saison');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="recette_ingredients">
	<li><?php echo $this->Html->link(__('Modifier les ingrédients de cette recette', true), 
	array('controller' => 'recettes', 'action' => 'ingredients/'.$this->Form->value('Recette.id'))); ?> </li>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Recette.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Recette.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus', true), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu', true), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stats', true), array('controller' => 'stats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stat', true), array('controller' => 'stats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etapes', true), array('controller' => 'etapes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etape', true), array('controller' => 'etapes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients', true), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient', true), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modecuissons', true), array('controller' => 'modecuissons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modecuisson', true), array('controller' => 'modecuissons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orthographes', true), array('controller' => 'orthographes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orthographe', true), array('controller' => 'orthographes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saisons', true), array('controller' => 'saisons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saison', true), array('controller' => 'saisons', 'action' => 'add')); ?> </li>
	</ul>
</div>

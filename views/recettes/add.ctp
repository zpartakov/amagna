<?php
echo $content_for_layout;
$largeur="450px";
$hauteur="50px";
?>
<div class="recettes form">
<?php echo $this->Form->create('Recette');?>
	<fieldset>
		<legend><?php __('Add Recette'); ?></legend>
	<?php
		echo $this->Form->input('country_id');
		echo $this->Form->input('titre', array('style'=>'width: '.$largeur));
		echo $this->Form->input('temps', 
				array('value'=>'20min', 'style'=>'width: '.$largeur.'; height: 50px'));
		echo $this->Form->input('ingr', array('type'=>'hidden'));
		echo $this->Form->input('pers', array('value'=>4, 'style'=>'width: 25px'));
		echo $this->Form->input('type_id', array('size'=>'21'));
		echo $this->Form->input('user_id', array('size'=>'4'));
		echo $this->Form->input('prep', array('class'=>'ckeditor'));
		echo $this->Form->input('date');
		echo $this->Form->input('score', array('type'=>'hidden', 'value'=>'0'));
		echo $this->Form->input('source', array('label'=>'Source: (ex. http://...)', 'style'=>'width: '.$largeur.'; height: 15px'));
		echo $this->Form->input('pict', array('type'=>'hidden', 'value'=>''));
		echo $this->Form->input('private', array('type'=>'hidden'));
		echo $this->Form->input('Etape', array('type'=>'hidden'));
		echo $this->Form->input('Ingredient', array('type'=>'hidden'));
		echo $this->Form->input('Modecuisson', array('size'=>'8'));
		echo $this->Form->input('Orthographe', array('type'=>'hidden'));
		echo $this->Form->input('Saison', array('size'=>'4'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

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

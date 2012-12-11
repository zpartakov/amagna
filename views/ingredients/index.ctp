<?php App::import('Lib', 'functions'); //imports app/libs/functions ?>
<div class="ingredients index">
	<h2><?php __('Ingredients');?></h2>
<!-- begin search form -->
<table>
	<tr>
	<td> 
		<div class="input">
			<?php echo $form->create('Ingredient', array('url' => array('action' => 'index'))); ?>
			<?php #echo $form->input('q', array('style' => 'width: 250px;', 'label' => false, 'size' => '80')); ?>
			<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
	</td>
	<td>
		<input type="button" class="vider" value="Vider" onClick="javascript:vide_recherche('IngredientQ')" />
		<input type="submit" class="chercher" value="Chercher" /> 
	</td>
	</tr>
</table>
<!-- end search form -->
	<table cellpadding="0" cellspacing="0">

<tr>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>			<th><?php echo $this->Paginator->sort('id');?></th>
	<?
	}
//end hide from non-admin registred user
?>
			<th><?php echo $this->Paginator->sort('libelle');?></th>
			<th><?php echo $this->Paginator->sort('typ');?></th>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>				<th><?php echo $this->Paginator->sort('unit');?></th>
			<th><?php echo $this->Paginator->sort('kcal');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('img');?></th>
			<th><?php echo $this->Paginator->sort('commissions');?></th>
			<th class="actions"><?php __('Actions');?></th>
				<?
	}
//end hide from non-admin registred user
?>
	</tr>

	<?php
	/*
	 * no results, levenshtein
	*
	*/
	if(count($ingredients)<1) {
		levenshtein_ingredients($this->data['Ingredient']['q']);
	}
	
	/*
	 * there are some results
	*/
	$i = 0;
	foreach ($ingredients as $ingredient):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td><?php echo $ingredient['Ingredient']['id']; ?>&nbsp;</td>
<?
	}
//end hide from non-admin registred user
?>		
	<td>
		<?php echo $this->Html->link($ingredient['Ingredient']['libelle'], array('action' => 'view', $ingredient['Ingredient']['id'])); ?>
		<?php #echo $ingredient['Ingredient']['libelle']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['typ']; ?>&nbsp;</td>
		<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>		<td><?php echo $ingredient['Ingredient']['unit']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['kcal']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['price']; ?>&nbsp;</td>

		<td><?php #echo $ingredient['Ingredient']['img']; ?>&nbsp;
		
		<? echo $html->image('ingredients/'.$ingredient['Ingredient']['img'], array("width" => "20px", "style"=>"vertical-align: middle"));?>
		
		</td>
		<td><?php echo $ingredient['Ingredient']['commissions']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ingredient['Ingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ingredient['Ingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ingredient['Ingredient']['id'])); ?>
		</td>
		<?
	}
//end hide from non-admin registred user
?>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ingredient', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>	
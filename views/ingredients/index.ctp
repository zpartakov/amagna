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
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('libelle');?></th>
			<th><?php echo $this->Paginator->sort('typ');?></th>
			<th><?php echo $this->Paginator->sort('unit');?></th>
			<th><?php echo $this->Paginator->sort('kcal');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('img');?></th>
			<th><?php echo $this->Paginator->sort('commissions');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ingredients as $ingredient):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ingredient['Ingredient']['id']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['libelle']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['typ']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['unit']; ?>&nbsp;</td>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ingredient', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
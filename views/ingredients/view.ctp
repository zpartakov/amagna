<div class="ingredients view">
<h2><?php  __('Ingredient');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Libelle'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ingredient['Ingredient']['libelle']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Typ'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ingredient['Ingredient']['typ']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ingredient['Ingredient']['unit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kcal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ingredient['Ingredient']['kcal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ingredient['Ingredient']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Img'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<img class="img_recette" src="<? echo CHEMIN; ?>img/ingredients/<?php echo $ingredient['Ingredient']['img'];?>">
			
			&nbsp;
		</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<a href="<?php echo $ingredient['Ingredient']['url'];?>"><?php echo $ingredient['Ingredient']['url'];?></a>
			
			&nbsp;
		</dd>
	</dl>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ingredient', true), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ingredient', true), array('action' => 'delete', $ingredient['Ingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
<div class="related">
	<h3><?php __('Related Recettes');?></h3>
	<?php if (!empty($ingredient['Recette'])):?>
	<?php
		$i = 0;
		foreach ($ingredient['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<p<?php echo $class;?>>
				<?php echo $this->Html->link($recette['titre'], array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
		</p>
	<?php endforeach; ?>
<?php endif; ?>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<?
	}
//end hide from non-admin registred user
?>
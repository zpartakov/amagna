<?php 
/*
 * standard view of the view of a menu of recipes
 */
App::import('Lib', 'functions'); //imports app/libs/functions 
?>

<div class="menus view">
<h2><?php echo $menu['Menu']['libelle']; ?>
</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descriptif'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['descriptif']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prix'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
/*
 * graphical display for price and difficulty
 * 
 */			for($i=1; $i<=$menu['Menu']['prix']; $i++){
				echo $html->image('icons/dollar.png', array("alt"=>"Prix", "width"=>"20","height"=>"20"));
			}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Difficulte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			for($i=1; $i<=$menu['Menu']['difficulte']; $i++){
				echo $html->image('icons/star.png', array("alt"=>"Difficulté", "width"=>"20","height"=>"20"));		
			}
		?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['date_created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Update'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['last_update']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Saison'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 			
			season_image($menu['Saison']['id']);
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['rem']; ?>
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
		<li><?php echo $this->Html->link(__('Edit Menu', true), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Menu', true), array('action' => 'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saisons', true), array('controller' => 'saisons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saison', true), array('controller' => 'saisons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
	<br />
<!-- RECIPES LINKED TO THIS MENU -->	
<div class="related">
	<h3><?php __('Related Recettes');?></h3>
	<?php if (!empty($menu['Recette'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr><th><?php __("Recipe");?></th><th><?php __("Comment");?></th></tr>
	<?php
//	echo "<pre>" .pri['type_id']nt_r($menu['Recette'])."</pre>" ;
/*
 * sorting recipes in type order
 */
	//asort($menu['Recette']);
		$i = 0;
		foreach ($menu['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
			<?php echo $this->Html->link($recette['titre'], array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
			</td>
			<td><em><?php echo $recette['prep'];?></em></td>
			<td>
			<a href="<? echo CHEMIN; ?>recettes/viewimg/<?php echo $recette['id']; ?>">
			<img class="img_recette_thumb" src="<? echo CHEMIN; ?>img/pics/<?php echo $recette['pict']; ?>"></td>	
	</a>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'recettes', 'action' => 'edit', $recette['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'recettes', 'action' => 'delete', $recette['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recette['id'])); ?>
			</td>
			<?
	}
//end hide from non-admin registred user
?>
		</tr>
	<?php endforeach; ?>
	</table>
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
<?
	}
//end hide from non-admin registred user
?>	
</div>

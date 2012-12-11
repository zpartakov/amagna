<div class="menus index">
	<h2><?php __('Menus');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	
	<th><?php echo $this->Paginator->sort('id');?></th>
	<?
	}
//end hide from non-admin registred user
?>
			<th><?php echo $this->Paginator->sort('libelle');?></th>
			<th><?php echo $this->Paginator->sort('descriptif');?></th>
			<th><?php echo $this->Paginator->sort('prix');?></th>
			<th><?php echo $this->Paginator->sort('difficulte');?></th>
			<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<th><?php echo $this->Paginator->sort('date_created');?></th>
			<th><?php echo $this->Paginator->sort('last_update');?></th>
			<?
	}
//end hide from non-admin registred user
?>
			<th><?php echo $this->Paginator->sort('saison_id');?></th>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<th><?php echo $this->Paginator->sort('rem');?></th>
			<?
	}
//end hide from non-admin registred user
?>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<th class="actions"><?php __('Actions');?></th>
<?
	}
//end hide from non-admin registred user
?>		
	</tr>
	<?php
	$i = 0;
	foreach ($menus as $menu):
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
		<td><?php echo $menu['Menu']['id']; ?>&nbsp;</td>
<?
	}
//end hide from non-admin registred user
?>
		<td><?php #echo $menu['Menu']['libelle']; ?>
		<?php echo $this->Html->link($menu['Menu']['libelle'], array('action' => 'view', $menu['Menu']['id'])); ?>
		
		&nbsp;</td>
		<td><?php echo $menu['Menu']['descriptif']; ?>&nbsp;</td>
		<td><?php 
/*
 * graphical display for price and difficulty
 * 
 */
		for($i=1; $i<=$menu['Menu']['prix']; $i++){
			echo $html->image('icons/dollar.png', array("alt"=>"Prix", "width"=>"20","height"=>"20"));
		}		
		?>&nbsp;</td>
		<td><?php 
		for($i=1; $i<=$menu['Menu']['difficulte']; $i++){
		echo $html->image('icons/star.png', array("alt"=>"Difficulté", "width"=>"20","height"=>"20"));		
		}
		
		?>&nbsp;</td>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>		<td><?php echo $menu['Menu']['date_created']; ?>&nbsp;</td>
	
	<td><?php echo $menu['Menu']['last_update']; ?>&nbsp;</td>
<?
	}
//end hide from non-admin registred user
?>
		<td>
			<?php echo $menu['Saison']['saison']; ?>
		</td>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td><?php echo $menu['Menu']['rem']; ?>&nbsp;</td>
<?
	}
//end hide from non-admin registred user
?>			
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id'])); ?>
		</td><?
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
		<li><?php echo $this->Html->link(__('New Menu', true), array('action' => 'add')); ?></li>
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
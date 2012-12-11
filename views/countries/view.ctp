<div class="countries view">
<h2><?php  __('Country');?></h2>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $country['Country']['id']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>


		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $country['Country']['name']; ?>
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
		<li><?php echo $this->Html->link(__('Edit Country', true), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Country', true), array('action' => 'delete', $country['Country']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('action' => 'add')); ?> </li>
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
	<?php if (!empty($country['Recette'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<th><?php __('Id'); ?></th>
		<th><?php __('Country Id'); ?></th>
<?
	}
//end hide from non-admin registred user
?>		
		
		<th><?php __('Titre'); ?></th>
		
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>	
		<th><?php __('Temps'); ?></th>
		<th><?php __('Ingr'); ?></th>
		<th><?php __('Pers'); ?></th>
		<th><?php __('Type Id'); ?></th>
		<th><?php __('Prep'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Score'); ?></th>
		<th><?php __('Source'); ?></th>
		<th><?php __('Pict'); ?></th>
		<th><?php __('Private'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
		<?
	}
//end hide from non-admin registred user
?>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Recette'] as $recette):
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
			<td><?php echo $recette['id'];?></td>
			<td><?php echo $recette['country_id'];?></td>
<?
	}
//end hide from non-admin registred user
?>			<td>
			<?php echo $this->Html->link($recette['titre'], array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
			
			
			</td>
			<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<td><?php echo $recette['temps'];?></td>
			<td><?php echo $recette['ingr'];?></td>
			<td><?php echo $recette['pers'];?></td>
			<td><?php echo $recette['type_id'];?></td>
			<td><?php echo $recette['prep'];?></td>
			<td><?php echo $recette['date'];?></td>
			<td><?php echo $recette['score'];?></td>
			<td><?php echo $recette['source'];?></td>
			<td><?php echo $recette['pict'];?></td>
			<td><?php echo $recette['private'];?></td>
			<td class="actions">
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

<?php $pageTitle="Modes de cuisson";
?><div class="modecuissons index">
	<h2><?php __('Modecuissons');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('parent');?></th>
<?
	}
//end hide from non-admin registred user
?>			
			<th><?php echo $this->Paginator->sort('lib');?></th>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>			
			<th><?php echo $this->Paginator->sort('rem');?></th>
			<th class="actions"><?php __('Actions');?></th>
<?
	}
//end hide from non-admin registred user
?>			
	</tr>
	<?php
	$i = 0;
	foreach ($modecuissons as $modecuisson):
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
		<td><?php echo $modecuisson['Modecuisson']['id']; ?>&nbsp;</td>
		<td><?php echo $modecuisson['Modecuisson']['parent']; ?>&nbsp;</td>
<?
	}
//end hide from non-admin registred user
?>		
		<td>
		<?php echo $this->Html->link($modecuisson['Modecuisson']['lib'], array('action' => 'view', $modecuisson['Modecuisson']['id'])); ?>
		</td>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>		
		<td><?php echo $modecuisson['Modecuisson']['rem']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $modecuisson['Modecuisson']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $modecuisson['Modecuisson']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $modecuisson['Modecuisson']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $modecuisson['Modecuisson']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Modecuisson', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
		<?
	}
//end hide from non-admin registred user
?>
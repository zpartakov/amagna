<?php 
$title_for_layout="Analyse des sites";
?>

	<div class="analyseSites index">
	<h2><?php  echo $title_for_layout; ?></h2>
	<h2><?php __('Analyse Sites');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('soft');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
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
	foreach ($analyseSites as $analyseSite):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php ; ?>&nbsp;
		<?php echo $this->Html->link($analyseSite['AnalyseSite']['soft'], array('action' => 'view', $analyseSite['AnalyseSite']['id'])); ?>
		
		</td>
		<td>
		<?php 
		if(strlen($analyseSite['AnalyseSite']['url'])>1) {
		echo "<a href=\"" .$analyseSite['AnalyseSite']['url'] ."\" target=\"_blank\">";
		echo $html->image('icons/url/url.png', array("alt"=>"Site web","width"=>"20","height"=>"20"));
		echo "</a>";
		}
		?>
		&nbsp;</td>
		<td>
			<?php echo $this->Html->link($analyseSite['User']['email'], array('controller' => 'users', 'action' => 'view', $analyseSite['User']['id'])); ?>
		</td>
		<td><?php echo $analyseSite['AnalyseSite']['date_mod']; ?>&nbsp;</td>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $analyseSite['AnalyseSite']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $analyseSite['AnalyseSite']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Analyse Site', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?> 
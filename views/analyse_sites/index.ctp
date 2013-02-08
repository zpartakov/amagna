<div class="analyseSites index">
	<h2><?php __('Analyse Sites');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('soft');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('calc_invites');?></th>
			<th><?php echo $this->Paginator->sort('calc_ingredients');?></th>
			<th><?php echo $this->Paginator->sort('formats');?></th>
			<th><?php echo $this->Paginator->sort('langage');?></th>
			<th><?php echo $this->Paginator->sort('glossaire');?></th>
			<th><?php echo $this->Paginator->sort('icones');?></th>
			<th><?php echo $this->Paginator->sort('graphisme');?></th>
			<th><?php echo $this->Paginator->sort('audio');?></th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('sequencage');?></th>
			<th><?php echo $this->Paginator->sort('automatisation');?></th>
			<th><?php echo $this->Paginator->sort('facilite');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th class="actions"><?php __('Actions');?></th>
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
		<td><?php echo $analyseSite['AnalyseSite']['id']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['soft']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['url']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['calc_invites']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['calc_ingredients']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['formats']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['langage']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['glossaire']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['icones']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['graphisme']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['audio']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['video']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['sequencage']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['automatisation']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['facilite']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($analyseSite['User']['email'], array('controller' => 'users', 'action' => 'view', $analyseSite['User']['id'])); ?>
		</td>
		<td><?php echo $analyseSite['AnalyseSite']['date_mod']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['note']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $analyseSite['AnalyseSite']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $analyseSite['AnalyseSite']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Analyse Site', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
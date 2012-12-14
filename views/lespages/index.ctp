<div class="lespages index">
	<h2><?php __('Lespages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('introtext');?></th>
			<th><?php echo $this->Paginator->sort('fulltext');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('publish_up');?></th>
			<th><?php echo $this->Paginator->sort('publish_down');?></th>
			<th><?php echo $this->Paginator->sort('images');?></th>
			<th><?php echo $this->Paginator->sort('urls');?></th>
			<th><?php echo $this->Paginator->sort('metadesc');?></th>
			<th><?php echo $this->Paginator->sort('featured');?></th>
			<th><?php echo $this->Paginator->sort('language');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($lespages as $lespage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $lespage['Lespage']['id']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['title']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['introtext']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['fulltext']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['created']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['modified']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['publish_up']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['publish_down']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['images']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['urls']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['metadesc']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['featured']; ?>&nbsp;</td>
		<td><?php echo $lespage['Lespage']['language']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $lespage['Lespage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $lespage['Lespage']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $lespage['Lespage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lespage['Lespage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lespage', true), array('action' => 'add')); ?></li>
	</ul>
</div>
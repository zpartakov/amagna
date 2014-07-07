<?php 
$title_for_layout="Étapes";
?>

<div class="etapes index">
	<h2><?php  echo $title_for_layout; ?></h2>
<!-- begin search form -->
<table>
	<tr>
	<td>
		<div class="input">
			<?php echo $form->create('Etape', array('url' => array('action' => 'index'))); ?>
			<?php #echo $form->input('q', array('style' => 'width: 250px;', 'label' => false, 'size' => '80')); ?>
			<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
	</td>
	<td>
		<input type="submit" class="chercher" value="Chercher" /> 
	</td>
	</tr>
</table>
<!-- end search form -->
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('sound');?></th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($etapes as $etape):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $etape['Etape']['id']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['order']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['text']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['url']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['image']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['sound']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['video']; ?>&nbsp;</td>
		<td><?php echo $etape['Etape']['notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $etape['Etape']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $etape['Etape']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $etape['Etape']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $etape['Etape']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Etape', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
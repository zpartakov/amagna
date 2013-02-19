
todo: mettre dans controlleur; calculer totaux, présenter par totaux

<div class="ilikerecipes index">
	<h2><?php __('Ilikerecipes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('user_accessed');?></th>
			<th><?php echo $this->Paginator->sort('recette_id');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ilikerecipes as $ilikerecipe):
	
	/*
	 * only show recipes of current logged user
	 * todo: put in into the controller!
	 */
	if($ilikerecipe['User']['id']==$_SESSION['Auth']['User']['id']) {
	
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ilikerecipe['Ilikerecipe']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ilikerecipe['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $ilikerecipe['User']['id'])); ?>
		</td>
		<td><?php echo $ilikerecipe['Ilikerecipe']['user_accessed']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ilikerecipe['Recette']['titre'], array('controller' => 'recettes', 'action' => 'view', $ilikerecipe['Recette']['id'])); ?>
		</td>

	</tr>
<?php 
	}

endforeach; ?>
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

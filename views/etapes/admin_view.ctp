<div class="etapes view">
<h2><?php  __('Etape');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['image']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sound'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['sound']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Video'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['video']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['notes']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Etape', true), array('action' => 'edit', $etape['Etape']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Etape', true), array('action' => 'delete', $etape['Etape']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $etape['Etape']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Etapes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etape', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Recettes');?></h3>
	<?php if (!empty($etape['Recette'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Prov'); ?></th>
		<th><?php __('Titre'); ?></th>
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
	</tr>
	<?php
		$i = 0;
		foreach ($etape['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $recette['id'];?></td>
			<td><?php echo $recette['prov'];?></td>
			<td><?php echo $recette['titre'];?></td>
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
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

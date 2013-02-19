<div class="ilikerecipes view">
<h2><?php  __('Ilikerecipe');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ilikerecipe['Ilikerecipe']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ilikerecipe['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $ilikerecipe['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Accessed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ilikerecipe['Ilikerecipe']['user_accessed']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recette'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ilikerecipe['Recette']['titre'], array('controller' => 'recettes', 'action' => 'view', $ilikerecipe['Recette']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ilikerecipe', true), array('action' => 'edit', $ilikerecipe['Ilikerecipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ilikerecipe', true), array('action' => 'delete', $ilikerecipe['Ilikerecipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ilikerecipe['Ilikerecipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ilikerecipes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ilikerecipe', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>

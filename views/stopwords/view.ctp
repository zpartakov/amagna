<div class="stopwords view">
<h2><?php  __('Stopword');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stopword['Stopword']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stopword['Stopword']['lib']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stopword', true), array('action' => 'edit', $stopword['Stopword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Stopword', true), array('action' => 'delete', $stopword['Stopword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stopword['Stopword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stopwords', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stopword', true), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="posts view">
<h2><?php  __('Post');?>: <?php echo $post['Post']['title']; ?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['id']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>
	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('BodyPost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['body']; ?>
			&nbsp;
		</dd>
		<div class="meta_post">
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['created']; ?>
			&nbsp;
		</dd>
				<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($post['User']['email'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<?
	}
//end hide from non-admin registred user
?>
		</div>
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
		<li><?php echo $this->Html->link(__('Edit Post', true), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Post', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
<div class="related">
	<h3><?php __('Related Comments');?></h3>
	<?php if (!empty($post['Comment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Post Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($post['Comment'] as $comment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $comment['id'];?></td>
			<td><?php echo $comment['post_id'];?></td>
			<td><?php echo $comment['name'];?></td>
			<td><?php echo $comment['email'];?></td>
			<td><?php echo $comment['text'];?></td>
			<td><?php echo $comment['created'];?></td>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['id'])); ?>
			</td>
	<?
	}
//end hide from non-admin registred user
?>		
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

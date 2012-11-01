<div class="comments form">
<?php echo $this->Form->create('Comment');?>
	<fieldset>
		<legend><?php __('Add Comment'); ?></legend>
	<?php
	//echo phpinfo();
		echo $this->Form->input('post_id');
		echo $this->Form->input('name', array('label'=>'Nom'));
		echo $this->Form->input('email', array('label'=>'Courriel'));
		echo $this->Form->input('text', array('label'=>'Commentaire'));
		echo $this->Form->input('captcha');
		?>
	</fieldset>
	
<img id="captcha" src="<?php echo $this->Html->url('/comments/captcha_image');?>" alt="" />
<a href="javascript:void(0);" onclick="javascript:document.images.captcha.src='<?php echo $this->Html->url("/comments/captcha_image");?>?' + Math.round(Math.random(0)*1000)+1" >Reset</a>

<?php 
/*
To check the captcha in controller we will use this one.
1
2
3
4
	
if($this->data['ContactMsge']['captcha']!=$this->Session->read('captcha'))
{
    $this->Session->setFlash(__('Please enter correct captcha code and try again.', true));
}
*/
?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>	
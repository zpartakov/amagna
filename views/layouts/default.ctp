<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
             "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><? echo SITE ." - " .$title_for_layout; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   <?php e($scripts_for_layout); ?>
   
<?=$html->css(array('cake.generic'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('hiermenu'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('recettes'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('jquery.zglossary.min'), 'stylesheet', array('media' => 'screen'));?>

<?=$html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<link rel="shortcut icon" href="<? echo CHEMIN; ?>app/webroot/img/casserole.ico" type="image/x-icon" />

<?
echo $javascript->link('recettes.js');
echo $javascript->link('jquery-1.5.1.js');
//echo $javascript->link('video');

echo $javascript->link('jquery.zglossary.min');

?>
<!-- external cakephp avreloaded lib for audio and video -->
<script type="text/javascript" src="/plugins/content/avreloaded/swfobject.js"></script>
<script type="text/javascript" src="/plugins/content/avreloaded/avreloaded.js"></script>

<?php

/* scroll to top script */
echo $javascript->link('scrolltopcontrol');
/* integrate ckeditor */
echo $javascript->link('ckeditor/ckeditor');
e($html->meta('rss', array('controller' => 'posts', 'action' => 'flux.rss'), array('title' => "Les derniers articles du blog")));
?>
</head>
<body>
<noscript>
<h1><?php __("activate js")?></h1>
</noscript>
<div class="contenu">
<!-- HEADER -->

<div id="entete">
<table class="titre">
	<tr class="titre">
		<td class="titre">		

			<a href="<? echo CHEMIN; ?>" title="Accueil recettes A table!">
			<? echo $html->image('logo/650502.gif', array("alt"=>"Accueil recettes A table!", "width" => "80px", "style"=>"vertical-align: middle"));?>
			</a>
			<? echo SITE ." - " .$this->pageTitle ?>
		&nbsp;
		<span class="SITEDESC"> 
			<?php echo SITEDESC; ?>
		</span>
		
		
		</td>
		
		</tr>
	</table>
	</div>
</div>
<!-- top navigation -->
<div id="leftnav" class="menu">
<?php 
echo $this->element('menu');
?>
</div>
<!-- graphical navigation -->
<div id="graphnav" class="graphmenu">
<?php 
/* begin hack unige */
if($_SERVER["REMOTE_ADDR"]!="129.194.18.217") {
echo $this->element('graphicalmenu');
}

?>
</div>
<!-- content -->
<div id="container">
    <div id="content">
    <br />
         <?=$content_for_layout;?>
     </div>
</div>
 </body>
 </html>

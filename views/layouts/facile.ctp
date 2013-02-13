<?php 
App::import('Lib', 'functions'); //imports app/libs/functions 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
             "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- a facilitated layout -->
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
?>
<!-- external cakephp avreloaded lib for audio and video -->
<script type="text/javascript" src="/plugins/content/avreloaded/swfobject.js"></script>
<script type="text/javascript" src="/plugins/content/avreloaded/avreloaded.js"></script>

<?php
echo $javascript->link('jquery.zglossary.min');
/* scroll to top script */
echo $javascript->link('scrolltopcontrol');
?>
</head>
<body>
<noscript>
<h1>Activez JavaScript! si vous voulez bénéficiez de toutes les fonctionnalités de ce site</h1>
</noscript>
<!-- graphical navigation -->
<div id="graphnav" class="graphmenu_fiche">
<?php 
echo $this->element('small_graphicalmenu');
?>
</div>
<!-- content -->
<div id="facile">
         <?=$content_for_layout;?>
</div>
 </body>
 </html>

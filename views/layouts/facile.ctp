<?php 
App::import('Lib', 'functions'); //imports app/libs/functions 
/*
 * track logged user activity
*/
if($session->read('Auth.User.role')) {
	recordActivity($session->read('Auth.User.id'));
}

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
<?=$html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<link rel="shortcut icon" href="<? echo CHEMIN; ?>app/webroot/img/casserole.ico" type="image/x-icon" />
<?
echo $javascript->link('recettes.js');
echo $javascript->link('jquery/jquery-2.0.3');
?>
<!-- external cakephp avreloaded lib for audio and video -->
<?
echo $javascript->link('avreloaded/swfobject.js');
echo $javascript->link('avreloaded/avreloaded.js');
?>

<?php
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
/*
 * menu facilite sauf glossaire
 */
if(!preg_match("/glossaires/",$_REQUEST["url"])){
echo $this->element('small_graphicalmenu');
}
?>
</div>
<!-- content -->
<div id="facile">
         <?=$content_for_layout;?>
</div>
 </body>
 </html>

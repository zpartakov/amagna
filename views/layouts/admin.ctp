<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
             "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php 
/* begin hack unige */
if($_SERVER["REMOTE_ADDR"]=="129.194.18.217") {
//echo "bureau";
	//echo phpinfo();
	?>
	<LINK rel=stylesheet Type="text/css" href="http://www.unige.ch/lettres/enseignants/bmuller/contenu.css">
<TITLE>Histoire de l'histoire (Universit&eacute; de Gen&egrave;ve</TITLE>

		<link rel="stylesheet" type="text/css" href="/lettres/enseignants/bmuller/hist2histcolltexts/css/cake.generic.css" />
		<?=$html->css(array('hiermenu'), 'stylesheet', array('media' => 'screen'));?>
		<!-- here we adapt hiermenu css to display a discrete menu on top -->
		<style>
		#cakephp-global-navigation {
		padding-bottom: 10px;
		opacity:0.4;
filter:alpha(opacity=40); /* For IE8 and earlier */
		}
		</style>
	<?php
} else {
?>
<title><? echo SITE ." - ADMIN - " .$title_for_layout; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   <?php e($scripts_for_layout); ?>
   
<?=$html->css(array('cake.generic'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('hiermenu'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('recettes'), 'stylesheet', array('media' => 'screen'));?>
<?=$html->css(array('jquery.zglossary.min'), 'stylesheet', array('media' => 'screen'));?>

<?=$html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<link rel="shortcut icon" href="<? echo CHEMIN; ?>app/webroot/img/casserole.ico" type="image/x-icon" />
<?php 
}
/* end hack unige */
?>
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
		<?php 
/* begin hack unige */
if($_SERVER["REMOTE_ADDR"]=="129.194.18.217") {
	?>
				<a href="<? echo CHEMIN; ?>" title="Accueil">
	<IMG class="logo" src="http://www.unige.ch/UDK/lenya/lettres.jpg" align="center"> 
	</IMG></a>
<br>
<a href="http://www.unige.ch/index.html"> Universit&eacute; de Gen&egrave;ve</a> 
		<a href="http://www.unige.ch/lettres/index.html"> > Facult&eacute; des lettres</a>
		<a href="http://www.unige.ch/lettres/istge/index.html"> > D&eacute;partement d histoire g&eacute;n&eacute;rale</a>
		<a href="http://www.unige.ch/lettres/istge/hco/index.html">> Histoire contemporaine</a>
		<a href="http://www.unige.ch/lettres/enseignants/bmuller/index.php?page=Cours/lestextes.html">> Les textes de référence</a>
		<a href="http://cms.unige.ch/lettres/enseignants/bmuller/hist2histcolltexts/saisies/">> Lise des textes de référence</a>
		> Bertrand M&uuml;ller
		<?php 
} else {
	?>
			<a href="<? echo CHEMIN; ?>" title="Accueil recettes A table!">
			<? echo $html->image('logo/6505.02.gif', array("alt"=>"Accueil recettes A table!", "width" => "80px", "style"=>"vertical-align: middle"));?>
			</a>
			<? echo SITE ." - " .$this->pageTitle ?>
		&nbsp;
		<span class="SITEDESC"> 
			<?php echo SITEDESC; ?>
		</span>
		<!--  	<? //TODO echo $html->image('rss.gif', array("alt"=>"Flux RSS recettes A table!", "width" => "40px"));
			?>-->
	<?php 		
}
//echo phpinfo();
/* end hack unige */			


?>			</td>
		
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
<h1 style="background-color: red; width: 250px; padding: 5px;">Administration</h1>
<div id="container">
    <div id="content">
    <br />
         <?=$content_for_layout;?>
     </div>
</div>
 </body>
 </html>

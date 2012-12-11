<?php 
/* 
 * tools needed for preparing and cooking the given recipe
 */
App::import('Lib', 'functions'); //imports app/libs/functions
/* 
 * get the recipe id
 */
$id=$_GET['id'];

/* 
 * recipe title
 */
echo "<h1>";
/*
 * audio list of required tools
 */
$audio="ustensiles/".$id.".mp3";
allvideomp3($audio);
titre_recette($id);
echo "</h1>";

/*
 * calling the external lib/function to print the required tools
 */
ustensiles($id);
/*
 * navigation
 */
echo "
<table>
<tr>
<td style=\"text-align: left\">";
retour_page_precedente();
echo "</td><td style=\"text-align: right\">";
etapesimg($id);
echo "</td></tr></table>";
?>
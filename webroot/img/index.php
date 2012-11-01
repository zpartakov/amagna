<?php
/**
* @version        $Id: index.php v1.0 23.03.2010 10:33:52 CET $
* @package        Эrgolang
* @copyright    Copyright (C) 2009 - 2013 Open Source Matters. All rights reserved.
* @license        GNU/GPL, see LICENSE.php
* Эrgolang is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?
$chercher=$_GET['chercher'];
?>

<html>

<head> 
  <title>images ergolang</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<form action="" method="get">
<input name="chercher" type="text" value=<? echo $chercher ?>>
<input type="submit" value=chercher"></form>


<h1>Images ergolang</h1>
<?
#written radeff, 02.2002, you can use that code freely 
#erase next line if you dont want ordered bullets
#CALL THAT FILE index.php OR welcome.php OR WHATEVER php file
# YOUR WEB SERVER UNDERSTAND AS A REPERTORY
#set the number of columns you like


$nbcol=6;
$letexte= "<table border=0><tr>";
#path (MODIFY)
$path="./";
$fd=dir($path);
#create array
while($v = $fd->read()) {
$arr[]=$v;
}
$fd->close();
#sort array, reverse sort would be function arsort()
sort($arr);
#make a loop with filename
$t=0;
foreach ($arr as $elem)  {
#count item/columns

$fichier="$elem";
# exclusion of the "." and ".."(and you could exclude much more if needed, eg. ".gif")

#$fichier!=".." && $fichier!="." && !eregi("~$",$fichier) && !eregi("jpg$",$fichier) && !eregi("bak$",$fichier) && !eregi("zip$",$fichier)) {
$text=$fichier;
#another way to to exclude eg extensions html or doc or file(s), eg index.php you can do it here also*
$text=eregi_replace("index.php.*","",$text);
$text=eregi_replace("^\(.*\)/$","<font color=red>\1</font>",$text);
$text=eregi_replace(".doc$","",$text);
$text=eregi_replace(".*#.*","",$text);
$text=eregi_replace(".htm*","",$text);
#execute only if $text is not empty
if ($text!="") {
#if directory add / and a special CSS class
if(is_dir($fichier)) {
$text.="/";
 $repertoire=1;
$laclasse="titrenoir";
} else {
$laclasse="";
 $repertoire=0;
}
#uncomment if you like ordered bullets with # items

$t++;
$test=($t/$nbcol)-intval($t/$nbcol);
#if($test=="0"&&$t>$nbcol) {
if($test=="0") {
#break
$ligF="</tr>\n<tr>";
} else {
$ligD="";
$ligF="";
}

if(isset($chercher)&&$chercher!="") {
if(eregi($chercher,$fichier)) {
$letexte.=  "<td><a href='$fichier' class='$laclasse' style='background-color: #ffffcc'><img  alt=$text title=$text src=$text border=0></a>";
$letexte.= "\n</td>$ligF";
}
} else {
#$letexte.=  "<td><a href='$fichier' class='$laclasse' style='background-color: #ffffcc'><img alt=$text title=$text src=$text border=0 width=50 height=50></a>";
$letexte.=  "<td><a href='$fichier' class='$laclasse' style='background-color: #ffffcc'><img alt=$text title=$text src=$text border=0></a>";
$letexte.= "\n</td>$ligF";
}
}



}

$letexte.=  "</table>";
echo $letexte;
?>

  <hr>
  Last modified: 
  <?
echo date("d/m/y", getlastmod());
?>
  </body>
</html>


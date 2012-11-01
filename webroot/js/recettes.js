/**
* @version        $Id: recettes.js v1.0 07.03.2011 06:25:39 CET $
* @package        recettes.picadametles.ch
* @copyright    Copyright (C) 2009 - 2013 Open Source Matters. All rights reserved.
* @license        GNU/GPL, see LICENSE.php
* Эrgolang is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*
* Main recettes.picadametles.ch javascript
*/


function vide_recherche(id) {
	document.getElementById(id).value="";
}

//This function detects the ability to play LiveAudio and then
//decides whether or not to play a specified embed's sound file.
//src:  Designing Web Audio & CD-ROM, By Josh Beggs, Dylan Thede, Publisher: O'Reilly Media, Released: January 2001

function playSound(name) {
if (navigator.appName== "Netscape" && 
  parseInt(navigator.appVersion) >= 3 &&
  navigator.appVersion.indexOf("68k") == -1 && 
  navigator.javaEnabled(  ) &&
  document.embeds[name] != null && 
  document.embeds[name].IsReady(  )) {
    document.embeds[name].play(false);
    }
}
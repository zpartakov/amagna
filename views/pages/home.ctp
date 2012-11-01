
    <?php
/* display a on work image */
echo $html->image('AT_WORK0.GIF', array("alt"=>"FIXME","title"=>"FIXME", "width"=>"50","height"=>"50"));

    $this->set("title_for_layout","Accueil");

if($session->read('Auth.User.role')) {
		echo "Bienvenue, " .$session->read('Auth.User.username');
	echo "<br>Ton groupe: " .$session->read('Auth.User.role')."<br>";
}

 //total_recettes
      //$this->requestAction('/recettes/total_recettes');
 
?>
    <?php $this->pageTitle = __('titre_page_accueil', true); ?>

     

    <h1>test internationlization<?php 
    echo "langue actuelle: " .Configure::read('Config.language');
    echo "<br>";
       __('Delete'); ?></h1>

     



<p>
Duis interdum elementum fringilla. Sed consequat, ipsum sit amet molestie iaculis, metus magna egestas elit, sed tincidunt massa metus vulputate nisl. Nulla euismod adipiscing neque at hendrerit. In in malesuada lectus. Nullam tincidunt commodo metus laoreet mattis? In molestie tincidunt gravida. Quisque eu ante tortor. In hac habitasse platea dictumst. Donec sit amet lectus vitae libero laoreet malesuada sed sed ipsum.
</p>

<p>
Aliquam tellus tellus, volutpat et lobortis nec, hendrerit eu elit? Donec eu eros ut enim luctus placerat. Mauris nisi turpis, dapibus sed egestas vitae, feugiat vel tortor. Phasellus diam risus, dictum cursus consequat ut; ultricies sit amet lorem. In accumsan, risus ut imperdiet aliquam, eros erat condimentum metus, at pharetra lacus neque id lectus. Aenean sit amet lorem urna, adipiscing volutpat leo? Integer libero tortor, tempus consequat molestie eget; iaculis non arcu. Donec molestie sollicitudin semper. Pellentesque a erat eget neque sodales interdum. Morbi gravida iaculis pretium. Sed quis nibh in lorem consectetur congue. Sed fermentum suscipit libero nec pretium. Fusce a vehicula lacus. Praesent turpis libero, aliquam in adipiscing non, commodo ac massa! Vivamus orci leo, venenatis vitae egestas ut, dictum nec libero. Pellentesque at tellus dui.
</p>

<p>
Praesent et tincidunt risus? Aliquam faucibus, neque accumsan lobortis tempor, enim est vehicula tellus, vestibulum luctus velit nulla et sapien! Pellentesque auctor sagittis lectus sit amet egestas. Aliquam ut hendrerit nulla. Integer vel vulputate magna? Suspendisse lorem sapien, convallis ac cursus sed, varius et dui. Vestibulum convallis aliquet augue, quis tincidunt ligula placerat in? Sed laoreet tristique quam id fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus justo sapien, cursus ut molestie eget, eleifend non sapien. Integer at suscipit metus. Curabitur metus enim, dictum non sollicitudin non, lacinia sit amet erat. Nullam commodo condimentum mauris sit amet tempus. Nulla ut scelerisque elit.
</p>


<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
  </p>
Géolocalisation: <br>
<?php
var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
//$run=locateIp($_SERVER['HTTP_HOST']);
?>
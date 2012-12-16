<?php    
$this->set("title_for_layout","Recettes");
$largeur_image=150;
/*
			<li><a href="<? echo CHEMIN; ?>recettes/?typ=16">Céréales</a></li>
			<li><a href="<? echo CHEMIN; ?>recettes/?typ=18">Légumes</a></li>
 */
?>
<p>
<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=5" title="Recettes de légumes et salades">		
	<? echo $html->image('navi/legumes_salades_t.jpg', array("alt"=>"Lien vers les recettes de légumes et salades", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>

<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=4" title="Recettes de soupes et potages">		
	<? echo $html->image('navi/potagesWP.jpg', array("alt"=>"Lien vers les recettes de soupes et potages", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>
</p>
<p>

<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=9" title="Recettes de viandes">
	<? echo $html->image('navi/viande_t.jpg', array("alt"=>"Lien vers les recettes de viandes", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>
	
<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=8" title="Lien vers les recettes de poissons">
	<? echo $html->image('navi/poisson_t.jpg', array("alt"=>"Lien vers les recettes de poissons", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>
</p>
<p>
<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=15" title="Recettes de pommes de terre, pâtes et céréales">
	<? echo $html->image('navi/pdt_pasta_cer_t.jpg', array("alt"=>"Lien vers les recettes de pommes de terre, pâtes et céréales", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>

<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=19" title="Recettes de fruits et desserts">
	<? echo $html->image('navi/fruits_desserts_t.jpg', array("alt"=>"Lien vers les recettes de fruits et desserts", "width" => $largeur_image."px", 	"class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>
</p>
<p>
<a href="<? echo CHEMIN; ?>recettes/indeximg/?typ=20" title="Recettes de lait, fromage et oeufs">
	<? echo $html->image('navi/lait_fromage_oeufs_t.jpg', array("alt"=>"Lien vers les recettes de lait, fromage et oeufs", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
</a>

</p>
	

<?php 
$etape_id=$_GET['etape_id'];
$dir=$_GET['dir'];
$recette_id=$_GET['recette_id'];
//echo "recette id: ." .$recette_id ." déplace étape: " .$etape_id ." vers: " .$dir ."<hr>";
	$query="
	SELECT * FROM etapes_recettes, etapes 
	WHERE recette_id=".$recette_id ." 
	AND etapes.id=etapes_recettes.etape_id 
	ORDER BY etapes.order" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	//echo "Nombre d'étapes: " .mysql_num_rows($result) ."<br />";
	$i=0;
	while($i<mysql_num_rows($result)){
		//echo "etape id: " .mysql_result($result,$i,'etapes.id');
		
		if(mysql_result($result,$i,'etapes.id')==$etape_id) {
		//echo "+ ";
			if($dir=="down"){
				$sql="UPDATE etapes SET etapes.order=" .(mysql_result($result,$i+1,'order')-1) ." WHERE etapes.id=".mysql_result($result,$i+1,'etapes.id');
				//echo "<br>&nbsp;" .$sql ."<br>";
				$sql=mysql_query($sql);
				$sql="UPDATE etapes SET etapes.order=" .(mysql_result($result,$i,'order')+1) ." WHERE etapes.id=".mysql_result($result,$i,'etapes.id');
				//echo "<br>&nbsp;" .$sql ."<br>";
				$sql=mysql_query($sql);
			} elseif($dir=="up"){
				$sql="UPDATE etapes SET etapes.order=" .(mysql_result($result,$i,'order')-1) ." WHERE etapes.id=".mysql_result($result,$i,'etapes.id');
				//echo "<br>&nbsp;" .$sql ."<br>";
				$sql=mysql_query($sql);
				$sql="UPDATE etapes SET etapes.order=" .(mysql_result($result,$i-1,'order')+1) ." WHERE etapes.id=".mysql_result($result,$i-1,'etapes.id');
				//echo "<br>&nbsp;" .$sql ."<br>";
				$sql=mysql_query($sql);
				
			}
		}
		//echo " ordre: " .mysql_result($result,$i,'order');
//echo ". ";
		//echo mysql_result($result,$i,'text');
		
//echo "<br />";
		$i++;
	}
	
	/* renumerote tout */
		$query="
	SELECT * FROM etapes_recettes, etapes 
	WHERE recette_id=".$recette_id ." 
	AND etapes.id=etapes_recettes.etape_id 
	ORDER BY etapes.order" ;
	$result=mysql_query($query);
	$i=0;$j=1;
	while($i<mysql_num_rows($result)){
				$sql="UPDATE etapes SET etapes.order=" .$j ." WHERE etapes.id=".mysql_result($result,$i,'etapes.id');
				//echo "<br>&nbsp;" .$sql ."<br>";
				$sql=mysql_query($sql);

		$i++; $j++;
	}
	
	header('Location: ../recettes/view/'.$recette_id);
	
?>
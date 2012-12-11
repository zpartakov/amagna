<?php
$sql="SELECT * FROM glossaires WHERE libelle LIKE '".$_GET['terme'] ."'";
$sql=mysql_query($sql);
$details=mysql_result($sql,0,'definition1'); 
//echo "test: ".$_GET['terme'];

//echo "<h1>".$_GET['terme']."</h1>";
//echo json_encode($details);
echo $details;
//		echo json_encode("test: ".$_GET['terme']);
//echo "test";
?>
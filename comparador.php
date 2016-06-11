<?php 
function comparador(){
	include"contador.php";

	$path = "textos/";
   	$diretorio = dir($path);
    $i=0;
   	while($arquivo = $diretorio -> read()){
 		if(!($arquivo=='.'||$arquivo=='..')){
 			$table[$i][0]=$arquivo;
	 		$table[$i][1]=contador($path.$arquivo);
	  		echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
	  		//print_r($table[$i]);
	  		$i++;
  		}
	}
   	$diretorio -> close();
  }
?>
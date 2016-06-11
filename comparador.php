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
	  		//echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
	  		//print_r($table[$i]);
	  		$i++;
  		}
	}
	for($x=0; $x<$i; $x++){
		for($y=0; $y<$i; $y++){
			if($x!=$y){
				echo $table[$x][0]." proximidade ".$table[$y][0]."=".distance($table[$x][1], $table[$y][1])."<br/>";
			}
		}
	}
   	$diretorio -> close();
  }
 function distance($array1, $array2){
 	//$return = $array1[0]."Λ".$array2[0]."<br/>";
 	$distancia=0;
 	for($i=0; $i<count($array1); $i++){
 		for($j=0; $j<count($array2); $j++){
 			if($array1[$i][0]==$array2[$j][0])
 				$distancia+=$array1[$i][1];
 		}
 	}
 	return $distancia;
 }
?>
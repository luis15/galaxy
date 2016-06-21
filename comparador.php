<?php 
include"contador.php";
function comparador(){
	
	
	$table = theBooks();
	$return="";
	$tam= count($table);
	for($x=0; $x<$tam; $x++){
		for($y=0; $y<$tam; $y++){
			if($x!=$y){
				$dis = distance($table[$x][1], $table[$y][1]);
					if(($x==($tam-1))&&($y==($tam-2))){
						$return.="\t\t{\"source\":".$x.",\"target\":".$y.",\"value\":".$dis."}\n";
					}
					else{
						if($dis<=60) 
							$return.="\t\t{\"source\":".$x.",\"target\":".$y.",\"value\":".$dis."},\n";
					}
			}
		}
	}
	return $return;
  }
 function distance($array1, $array2){
 	$next=100;
 	for($i=0; $i<count($array1); $i++){
 		for($j=0; $j<count($array2); $j++){
 			if($array1[$i][0]==$array2[$j][0])
 				$next-=$array1[$i][1];
 		}
 	}
 	$next = (int)($next);
 	return $next;
 }

function theBooks(){
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
	return $table;
}

?>
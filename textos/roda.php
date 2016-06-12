<?php
function geraJson(){
include"comparador.php";
$fp = fopen("json.json", "a+");
rewind($fp);
ftruncate($fp, 0);

$myJSON = "{\n\t\"nodes\":[\n";

$books= theBooks();
for($i=0; $i<count($books); $i++){
	if ($i==(count($books)-1))
		$myJSON.="\t\t{\"name\":\"".$books[$i][0]."\",\"group\":1}\n";	
	else
		$myJSON.="\t\t{\"name\":\"".$books[$i][0]."\",\"group\":1},\n";
}

$myJSON.= "\t],\n\t\"links\":[\n";
$myJSON.=comparador();
$myJSON.="\t]\n}";

$escreve = fwrite($fp, $myJSON);
fclose($fp); 
}
?>
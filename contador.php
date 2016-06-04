<?php
$handle = fopen("dilma.txt", "r");//explain commit
if ($handle) {
	$txt="";
    while (($buffer = fgets($handle, 4096)) !== false) {
        $txt.= $buffer;
    }
    if (!feof($handle)) {
        echo "Erro: falha inexperada de fgets()\n";
    }
    include 'stop.php';
    $txt=strtolower($txt);
    $char = array( ',', '.', '!','?',"\n",'-',';','"','*', ' ', "\t", ":",'(',')','[',']','%','1','2','3','4','5','6','7','8','9','0');
    $txt=str_replace($char, ';', $txt);
    $palavras=explode(";", $txt);

    $palavras = array_diff($palavras, stop());

    $res= array_count_values($palavras);
    $unico = array_unique($palavras);

    $tam = count($unico);
    for($i=0; $i<$tam; $i++){
        for($j=0; $j<$tam; $j++){
            if(isset($unico[$i])&&isset($unico[$j])){
               echo $unico[$i]."Λ".$unico[$j]."=".levenshtein($unico[$i], $unico[$j])."<br/>";
            }
        }
    }
    
    //print_r levenshtein(res[0], res[1]);
    fclose($handle);
}
?>
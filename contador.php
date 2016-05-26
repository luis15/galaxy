<?php
$handle = fopen("sherlock.txt", "r");
if ($handle) {
	$txt="";
    while (($buffer = fgets($handle, 4096)) !== false) {
        $txt.= $buffer;
    }
    if (!feof($handle)) {
        echo "Erro: falha inexperada de fgets()\n";
    }
    include 'stop.php';
    $txt=str_replace("\n", " ", $txt);
    $palavras=explode(" ", $txt);
   


    $res= array_count_values($palavras);
    print_r($res);
	fclose($handle);

}
?>
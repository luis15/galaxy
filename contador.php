<?php
$handle = fopen("sherlock.txt", "r");//explain commit
if ($handle) {
	$txt="";
    while (($buffer = fgets($handle, 4096)) !== false) {
        $txt.= $buffer;
    }
    if (!feof($handle)) {
        echo "Erro: falha inexperada de fgets()\n";
    }
    include 'stop.php';
    $char = array( ',', '.', '!','?',"\n",'--',';','"','*', ' ', "\t", ":");
    $txt=str_replace($char, ";", strtolower($txt));
    $palavras=explode(";", $txt);

    $palavras = array_diff($palavras, stop());

    $res= array_count_values($palavras);
    print_r($res);
	fclose($handle);

}
?>
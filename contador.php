<?php
function contador($localizacao){
    $handle = fopen($localizacao, "r");//explain commit
    if ($handle) {
    	$txt="";
        while (($buffer = fgets($handle, 4096)) !== false) {
            $txt.= $buffer;
        }
        if (!feof($handle)) {
            echo "Erro: falha inexperada de fgets()\n";
        }
        include_once 'stop.php';
        $txt=strtolower($txt);
        $char = array( ',', '.', '!','?',"\n",'-',';','"','*', ' ', "\t", ":",'(',')','[',']','%','1','2','3','4','5','6','7','8','9','0');
        //$txt = str_replace(stop(),"", $txt);
        $txt=str_replace($char, ';', $txt);
        $palavras=explode(";", $txt);

        $palavras = array_diff($palavras, stop());
        $res= array_count_values($palavras);
        $unico = array_unique($palavras);

        $matrix=implode("\n",$res);
        //print_r(count($palavras));
        $tam = count($res);
        for($i=0, $j=0; $i<$tam; $i++){
            if($matrix[$i]!=0){
                (float)$val[$j] = (float)$matrix[$i]*100/$tam;
                $j++;
            }
        }
        for($i=0, $j=0; $i<$tam; $i++){
            if(isset($unico[$i])&&isset($val[$i])){
                $table[$j][0]=$unico[$i];
                $table[$j][1]=$val[$j];
                $j++;
            }
        }
        
        fclose($handle);
        return $table;

    }
}
?>
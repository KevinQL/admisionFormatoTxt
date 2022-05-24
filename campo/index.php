<?php
$fila = 1;
if (($gestor = fopen("registro.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
        $print = "";
        $numero = count($datos);
        echo "<p> $numero de &nbsp;  campos en la línea $fila: <br /></p>\n";
        $fila++;
        for ($c=0; $c < $numero; $c++) {

            $result = data_result_for_column_print($datos[$c], $c+1);
            
            $print .= "{$result['data']}".print_space($result['spaces']);

        }
        $print = utf8_encode($print);
        write_txt_admision($print);
        echo $print;
        echo "<br/>\n";
    }
    fclose($gestor);
}

function write_txt_admision($file_txt){
    $file = fopen("resultado_admision.txt", "a");
    fwrite($file, $file_txt. PHP_EOL);
    fclose($file);
}

// function return cant_spaces
function data_result_for_column_print($data, $num_column){
    $data = trim($data);
    $num_caracter = strlen($data);

    if($num_column === 1){
        $require_spacing_column = 16;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    elseif ($num_column === 2) {
        # code...
        $require_spacing_column = 30;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    elseif ($num_column === 3) {
        # code...
        $require_spacing_column = 30;
        $print_spacing = $require_spacing_column - $num_caracter;
    }
    elseif ($num_column === 4) {
        # code...
        $require_spacing_column = 30;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    elseif ($num_column === 5) {
        # code...
        $require_spacing_column = 2;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    elseif ($num_column === 6) {
        # code...
        $require_spacing_column = 2;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    elseif ($num_column === 7) {
        # code...
        $require_spacing_column = 2;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    else {
        # code...
        $require_spacing_column = 2;
        $print_spacing = $require_spacing_column - $num_caracter;
    }

    return ["data"=>$data, "spaces"=>$print_spacing];

} 


// function for print spaces
function print_space($cant){
    return str_repeat(' ', $cant);
}










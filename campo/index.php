<?php



// FORMATO SOLICITADO ----------------------------

// La estructura del archivo de texto (corregido) que se tiene que generar es la siguiente.

// del caracter 1 al 8 =  nro. de DNI
// del caracter 9 al  16  = espacios en blanco
// del caracter 17 al 46  = apellido paterno, completar con espacios en blanco al final, hasta la posición 30
// del caracter 47 al 76 = apellido materno
// del caracter 77 al  106 = nombres
// del caracter 107 al 108 = codigo de las carreras
// del caracter 109 al 110 = codigo modalidad de ingreso

// Código de las carreras:
// AE     Administración
// AM   Ambiental
// CT     Contabilidad
// EI      Educación
// IA     Agroindustrial
// II      Sistemas

// Código de las modalidades de ingreso
// 01 CENTRO PRE
// 03 ORDINARIO
// 04 EXAMEN EXTRAORDINARIO - PERSONAS CON DISCAPACIDAD
// 05 EXAMEN EXTRAORDINARIO - 1° Y 2° PUESTO COLEGIO
// 06 EXAMEN EXTRAORDINARIO POR BECAS VRAEM
// 10 EXAMEN EXTRAORDINARIO - TRASLADO INTERNOS
// 11 EXAMEN EXTRAORDINARIO - DEPORTISTAS CALIFICADOS
// 12 EXAMEN EXTRAORDINARIO - BECAS POR CONVENIO
// 13 EXAMEN EXTRAORDINARIO - VIOLENCIA POLITICA
// 14 EXAMEN EXTRAORDINARIO - ALTO RENDIMIENTO
// 15 EXAMEN EXTRAORDINARIO - BECA 18
// 21 TRASLADO DE ESTUDIANTES DE UNIVERSIDADES CON LICENCIAMIENTO DENEGADO
// 00 OTROS

// El archivo no debe contener tildes, ñ o caracteres especiales.








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










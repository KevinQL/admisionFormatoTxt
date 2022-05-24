<?php
    //crea archivo resultados
    $fichero_resultado = 'resultado.txt';
    if(file_exists($fichero_resultado)){
        $borrado = unlink($fichero_resultado);
    }
    // Abriendo el archivo
    $archivo_lectura = fopen("postulantes.txt", "r");
    $dnis_pasados = array();
    $cont_repeat = 0;
    $cont_total = 0;
    // Recorremos todas las lineas del archivo
    while(!feof($archivo_lectura)){
        $cont_total++;
        // Leyendo una linea
        $traer = fgets($archivo_lectura);
        $dni = trim($traer);    
        if(!in_array($dni,$dnis_pasados)){
            $dnis_pasados[] = $dni;
        }else{
            $cont_repeat++;
            file_put_contents($fichero_resultado, $dni."\n", FILE_APPEND | LOCK_EX);
        }
    }
    // var_dump($dnis_pasados);
    echo "total evaluados: " . $cont_total . "</br>";
    echo "total repetidos: " . $cont_repeat . "</br>";
    // Cerrando el archivo
    fclose($archivo_lectura);
?>
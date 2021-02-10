<?php

    include('libphp/conexiondb.php');

    $VariableBuscar = isset($_POST['outNameProduct']) ? $_POST['outNameProduct'] : 0;

    if(Sumador("inputs" , "id", $VariableBuscar) == 0) {
        echo "No hay entradas disponibles";
    }
    else {
        $Inputs = Sumador("inputs" , "cuantity", $VariableBuscar);
        $Outputs = Sumador("outputs" , "cuantity", $VariableBuscar);
        
        /* echo "Inputs: ".$Inputs;
        echo "<br>Outputs: ".$Outputs; */

        $Suma = $Inputs - $Outputs;
        /* echo "<br>Total: ".$Suma; */

        if($Suma < 0) {
            echo "<br>No se pueden quitar mas de lo guardado en el stock.";
        }
        else {
            $Catalogo = ConsultTable("catalogue");
            foreach ($Catalogo as $Valor) {
                if($Valor['id'] == $VariableBuscar) {
                    if($Suma < $Valor['minStock']) {
                        echo "<br>Muestra la alerta";
                    }
                    else {
                        echo "<br>Continua";
                    }
                }
            }
        }
    }

?>
<?php
    include("libphp/conexiondb.php");
    include("lib/head.html");

    /* Variables para el insert en Inputs y Outputs */
    $Producto = isset($_POST['outNameProduct']) ? $_POST['outNameProduct'] : 0;
    $Cantidad = $_POST['outCuantity'];
    $Emitido = $_POST['outUser'];

    /* Esto nos regresa el nombre del producto seleccionado para utilizarlo en las alertas como referencia. */
    $AuxProducto = queryNames ('catalogue', 'name', $Producto);


    if(Sumador("inputs" , "id", $Producto) == 0) {
        header("refresh:0;url=Salidas.php");
        echo '
        <script>
            Push.create("¡ADVERTENCIA!", {
                body: "No hay entradas disponibles de '.$AuxProducto.', realice una en Entradas.",
                icon: "assets/img/logo-head-form.png",
                timeout: 5000,
                onClick: function () {
                    window.focus();
                    this.close();
                }
            });
        </script>
        ';
    }
    else {
        $Inputs = Sumador("inputs" , "cuantity", $Producto);
        $Outputs = Sumador("outputs" , "cuantity", $Producto);
      
        $Suma = $Inputs - $Outputs - $Cantidad;
        /* echo "Inputs: ".$Inputs;
        echo "<br>Outputs: ".$Outputs; 
        echo "<br>Total: ".$Suma;  */
        
        if($Suma < 0) {
            header("refresh:0;url=Salidas.php");
            echo "
            <script>
                Push.create('¡ADVERTENCIA!', {
                    body: 'No se pueden quitar más del stock de $AuxProducto.',
                    icon: 'assets/img/logo-head-form.png',
                    timeout: 5000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });
                Push.clear();
            </script>
            ";
        }
        else {
            $Catalogo = ConsultTable("catalogue");

            foreach ($Catalogo as $Valor) {
                if($Valor['id'] == $Producto) {
                    if($Suma < $Valor['minStock']) {
                        header("refresh:0;url=Salidas.php");
                        echo "
                        <script>
                            Push.create('¡ADVERTENCIA!', {
                                body: 'El producto $AuxProducto tiene un stock bajo, por favor realice entradas nuevas de dicho producto.',
                                icon: 'assets/img/logo-head-form.png',
                                timeout: 5000,
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });
                            Push.clear();
                        </script>
                        ";
                        EntradasSalidas("outputs", $Cantidad, $Producto, $Emitido);
                    }
                    else {
                        EntradasSalidas("outputs", $Cantidad, $Producto, $Emitido);
                    }
                }
            }
        }
    }

?>
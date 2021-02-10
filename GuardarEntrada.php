<?php

    include("libphp/conexiondb.php");
    include("lib/head.html");
    //EntradasSalidas("inputs", $Cantidad, $Producto, $Emitido);

    /* Variables para el insert en Inputs y Outputs */
    $Producto = isset($_POST['itpNameProduct']) ? $_POST['itpNameProduct'] : 0;
    $Cantidad = $_POST['itpCuantity'];
    $Emitido = $_POST['nm-itpUser'];

    /* Esto nos regresa el nombre del producto seleccionado para utilizarlo en las alertas como referencia. */
    $AuxProducto = queryNames ('catalogue', 'name', $Producto);

    //Suma y maxStock
    $Catalogo = ConsultTable("catalogue");
    $Inputs = Sumador("inputs" , "cuantity", $Producto);
    $Outputs = Sumador("outputs" , "cuantity", $Producto);
    $Suma = $Inputs - $Outputs + $Cantidad;

    foreach ($Catalogo as $Valor) {
        if($Valor['id'] == $Producto) {
            if($Suma > $Valor['maxStock']) {
                header("refresh:0;url=Entradas.php");
                echo '
                <script>
                    Push.create("¡ADVERTENCIA!", {
                        body: "Lo sentimos el producto '.$AuxProducto.', no puede almacenar más, por el limite máximo en stock ya establecido.",
                        icon: "assets/img/logo-head-form.png",
                        timeout: 5000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                </script>
                ';
            }else{
                EntradasSalidas("inputs", $Cantidad, $Producto, $Emitido);
            }
        }
    }

?>
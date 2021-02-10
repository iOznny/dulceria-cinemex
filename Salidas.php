<!DOCTYPE html>
<html lang="es">
    <?php
        include("lib/head.html");
        include("libphp/conexiondb.php");
        include("libphp/Metodos.php");
        ValidarSesion();
        valHeader();
    ?>

    <link rel="stylesheet" href="assets/css/estilosCatalogo.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <body>
        <br><br>
        <div class="container">
            <form action="" method="post" id="formOutput">
            
                <h4 class="text-center">Salida de Productos</h4>
                
                <div class="form-row">
                    <!-- Extraemos desde la base de datos el ID siguiente para poderlo poner en la interfaz como siguiente consulta. -->
                    <div class="form-group col-md-12">
                        <h5>ID Salida</h5>
                        <input type="number" name="outID" class="form-control texto" placeholder="<?php ConsultaID("outputs");?>" disabled>
                    </div>

                    <div class="form-group col-md-12">
                        <h5>Fecha Actual</h5>
                        <input type="date" id="outDate" class="form-control texto" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="2019-01-01" max="2030-12-31" required disabled>
                    </div>

                    <!-- Sacar el Name del producto a insertar desde la BD. -->
                    <div class="form-group col-md-12">
                        <h5 class="text-left">Nombre del Producto</h5>
                        <select name="outNameProduct" id="outNameProduct" class="form-control texto" required>
                            <option value="" hidden selected disabled>Seleccione el producto...</option>
                            <?php echo querySlc("catalogue", "id", "name"); ?>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <h5>Cantidad</h5>
                        <input type="number" name="outCuantity" id="outCuantity" class="form-control texto" min="1" max="9999" pattern="[0-9]{1,4}" placeholder="Ingrese la cantidad entrante" required>
                    </div>

                    <!-- Extraemos el usuario por la sesión que se encuentre actual. -->
                    <div class="form-group col-md-12">
                        <h5>Registro de Salida</h5>
                        <input type="text" class="form-control texto" value="<?php echo $_SESSION['NombreUsuario']; ?>" disabled>
                        <input type="hidden" name="outUser" class="form-control texto" value="<?php echo $_SESSION['UsuarioID']; ?>">
                    </div>
                </div>

                <div class="form-row form-group col-md-12" id="boxError">
                </div><br>

                <button type="submit" class="btn btn-primary" onclick="valOutput();">Actualizar</button>
            </form>
        </div>
        <br><br>
    </body>

    <script>
        /* Obtener fecha del día. */
        window.onload = function () {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año

            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10

            document.getElementById("outDate").value = ano + "-" + mes + "-" + dia;
        } 
    </script>
</html>
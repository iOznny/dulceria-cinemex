<!DOCTYPE html>
<html lang="es">
    <?php
        include("lib/head.html");
        include("libphp/conexiondb.php");
        include("libphp/Metodos.php");
        ValidarSesion();
        valHeader();
        valCatalogo();
    ?>

    <link rel="stylesheet" href="assets/css/estilosCatalogo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <body>
        <br><br>
        <div class="container">
            <form action="" method="post" id="formCatalogue">

                <h4 class="text-center">Catalogo de Productos</h4>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h5 class="text-left">Código del Producto</h5>
                        <input type="text" name="ctCodeProduct" id="ctCodeProduct" class="form-control texto" pattern="[a-zA-Z ]{3,30}" min="3" max="30" placeholder="Ingrese el código de Producto" required autofocus>
                        <p><small>Esta sera la Clave que se podra identificar el producto de los demas.</small></p>
                    </div>

                    <div class="form-group col-md-12">
                        <h5 class="text-left">Nombre del Producto</h5>
                        <input type="text" name="ctNameProduct" id="ctNameProduct" class="form-control texto" pattern="[a-zA-Z ]{3,30}" min="3" max="30" placeholder="Ingrese el nombre del Producto" required>
                    </div>

                    <div class="form-group col-md-12">
                        <h5 class="text-left">Descripción</h5>
                        <textarea name="ctDescription" id="ctDescription" class="form-control desc" rows="2" cols="1" minlength="5" maxlength="30" placeholder="Descripción del Producto" required></textarea>
                        <p><small>Agregue una breve descripción de 30 caracteres.</small></p>
                    </div>

                    <div class="form-group col-md-12">
                        <h5 class="text-left">Fecha de Caducidad</h5>
                        <input type="date" name="ctDateExpiry" id="ctDateExpiry" class="form-control texto" min="2015-01-01" max="2025-12-31" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                    </div>

                    <div class="form-group col-md-12">
                        <h5 class="text-left">Máximo de Stock</h5>
                        <input type="number" name="ctMaxStock" id="ctMaxStock" class="form-control texto"  min="3" max="9999" pattern="[0-9]{1,4}" placeholder="Ingrese el número máximo de stock" required>
                    </div>

                    <div class="form-group col-md-12">
                        <h5 class="text-left">Mínimo de Stock</h5>
                        <input type="number" name="ctMinStock" id="ctMinStock" class="form-control texto"  min="3" max="9999" pattern="[0-9]{1,4}" placeholder="Ingrese el número mínimo de stock" required>
                    </div>

                    <!-- Sacar la categoria desde la BD. -->
                    <div class="form-group col-md-12">
                        <h5 class="text-left">Categoria</h5>
                        <select name="ctCategoria" id="ctCategoria" class="form-control texto" required>
                            <option value="" hidden selected disabled>Seleccione una categoria...</option>
                            <?php echo querySlc("category", "id", "description"); ?>
                        </select>
                    </div>

                    <!-- Sacar el contenedor desde la BD. -->
                    <div class="form-group col-md-12">
                        <h5 class="text-left">Contenedor de Almacenamiento</h5>
                        <select name="ctContenedor" id="ctContenedor" class="form-control texto" required>
                            <option value="" hidden selected disabled>Seleccione un contenedor...</option>
                            <?php echo querySlc("containers", "id", "description"); ?>
                        </select>
                    </div>
                </div>

                <div class="form-row form-group col-md-12" id="boxError">
                </div><br>

                <button type="submit"  id="btnCatalogo" class="btn btn-primary" onclick="valCatalogue();">Registrar Producto</button>
            </form>
        </div>


        <br><br>
    </body>
</html>

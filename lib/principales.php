<style>
    body {
        background-image: url(assets/img/fondo-cinemex.png);
        background-size: 130%;
    }

    .row {
        margin: 10px;
    }

    .col-sm-4, .col-sm-6 {
        margin-bottom: 20px;
    }

    .responsive {
        width: 100%;
        max-width: 500px;
        height: auto;
    }
</style>

<?php
    function principalE() {
        echo '
            <body>
                <br>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <figure>
                            <img src="assets/img/Logo.png" alt="Cinemex Logo" class="responsive">
                        </figure>
                    </div>
                </div><br><br><br>

                <div class="row text-center">        
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Entradas</h5>
                                <p class="card-text">Registro de la llegada del proveedor para agregar producto.</p>
                                <a href="Entradas.php" class="btn btn-primary">Ir a Entradas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Salidas</h5>
                                <p class="card-text">Registro de la salida del producto desde el almacen Cinemex.</p>
                                <a href="Salidas.php" class="btn btn-primary">Ir a Salidas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>';
    }

    function principalG() {
        echo '
            <body>
                <br>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <figure>
                            <img src="assets/img/Logo.png" alt="Cinemex Logo" class="responsive">
                        </figure>
                    </div>
                </div><br><br><br>

                <div class="row text-center">        
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Catalogo</h5>
                                <p class="card-text">Registro de nuevos productos dentro de la Dulceria Cinemex.</p>
                                <a href="Catalogo.php" class="btn btn-primary">Ir a Catalogo</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Entradas</h5>
                                <p class="card-text">Registro de la llegada del proveedor para agregar producto.</p>
                                <a href="Entradas.php" class="btn btn-primary">Ir a Entradas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Salidas</h5>
                                <p class="card-text">Registro de la salida del producto desde el almacen Cinemex.</p>
                                <a href="Salidas.php" class="btn btn-primary">Ir a Salidas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>';
    }
?>
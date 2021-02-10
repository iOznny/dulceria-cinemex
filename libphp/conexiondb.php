<?php

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BASE", "cinemexcandystore");

    /* Consulta de Select para tablas */
    function ConsultTable($Tabla) {
        try {
            /* Prepara la conexion */
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BASE, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            /* Consulta SQL */
            $sql = "SELECT * FROM ".$Tabla;
            $resultado = $conexion->prepare($sql);
            $resultado->execute();

            /* Convierte la consulta en una matriz */
            while($result = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $Array[] = $result;
            }

            if(empty($Array)) {
                $Array = null;
                return $Array;
            }
            else {
                /* Retorna la matriz */
                return $Array;
            }
        }
        catch(Exception $e) {
            die('Error: ' . $e->GetMessage());
        }
        /* Finaliza la conexion. */
        finally {
            $conexion = null;
        }
    }

    /* Consulta otras tablas. */
    function querySlc($table, $col1, $col2) {
        /* Recoge el array */
        $Array = ConsultTable($table);

        /* Muestra las opciones del select */
        foreach($Array as $row => $Campo) {
            echo '<option value="'.$Campo[$col1].'">'.$Campo[$col2].'</option>';
        }
    }

    function queryNames ($table, $col, $id) {
        /* Recoge el array */
        $Array = ConsultTable($table);

        /* Imprime los datos dependiendo de la columna. */
        foreach($Array as $row => $Campo) {
            if ($Campo['id'] == $id) {
                return $Campo[$col];
            }
        }
    }

    /* Regresa el ID dependiendo de la tabla elejida para entradas y salidas. */
    function ConsultaID ($table) {
        $Array = ConsultTable($table);
        if($Array == null) {
            echo 1;
        }
        else {
            $Cuenta = count($Array)-1;
            $ID = $Array[$Cuenta]['id'];
            $ID++;
            echo $ID;
        }
    }

    /* Consulta de Select para tablas */
    function SubirDatosCatalogo() {
        $code = $_POST['ctCodeProduct'];
        $name = $_POST['ctNameProduct'];
        $descripcion = $_POST['ctDescription'];
        $maxStock = $_POST['ctMaxStock'];
        $minStock = $_POST['ctMinStock'];
        $categoryID = $_POST['ctCategoria'];
        $containerID = $_POST['ctContenedor'];
        $dateExpiry = $_POST['ctDateExpiry'];

        try {
            /* Prepara la conexion */
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BASE, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            /* Consulta SQL */
            $sql = "INSERT INTO catalogue VALUES (NULL, '".$code."', '".$name."', '".$descripcion."', ".$maxStock.", ".$minStock.", ".$categoryID.", ".$containerID.", '".$dateExpiry."');";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header("refresh:0;url=Principal.php");
        }
        catch(Exception $e) {
            die('Error: ' . $e->GetMessage());
        }

        /* Finaliza la conexion. */
        finally {
            $conexion = null;
        }
    }

    //Entradas y salidas
    function EntradasSalidas($table, $cantidad, $producto, $emitido) {
        try {
            /* Prepara la conexion */
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BASE, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            /* Consulta SQL */
            $sql = "INSERT INTO ".$table." VALUES (NULL, NOW(), ".$cantidad.", ".$producto.", ".$emitido.");";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header("refresh:0;url=Principal.php");
        }
        catch(Exception $e) {
            die('Error: ' . $e->GetMessage());
        }
        
        /* Finaliza la conexion. */
        finally {
            $conexion = null;
        }
    }

    function Sumador($Tabla, $Campo, $Campo2){
        try {
            /* Prepara la conexion */
            $conexion = new PDO('mysql:host='.HOST.';dbname='.BASE, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            /* Consulta SQL */
            $sql = "SELECT SUM($Campo) FROM ".$Tabla." WHERE catalogueID = ".$Campo2;
            $resultado = $conexion->prepare($sql);
            $resultado->execute();

            /* Convierte la consulta en una matriz */
            while($result = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $Array = $result;
            }

            if($Array['SUM('.$Campo.')'] > 0) {
                return $Array['SUM('.$Campo.')'];
            }
            else {
                return 0;
            }
        }
        catch(Exception $e) {
            die('Error: ' . $e->GetMessage());
        }
        /* Finaliza la conexion. */
        finally {
            $conexion = null;
        }
    }

?>
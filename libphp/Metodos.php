<?php

session_start();
isset($_SESSION['NombreUsuario']);
isset($_SESSION['UsuarioID']);
isset($_SESSION['TipoUsuario']);
isset($_SESSION['verificar']);

    function ValidarSesion(){
        $_SESSION['verificar'] = $_SESSION['verificar'];

        if(!$_SESSION['verificar']) {
            header( "refresh:0;url=index.php" );
        }
    }

    function SesionIniciada(){
        $v = isset($_SESSION['verificar']) == null ? "" : $_SESSION['verificar'];

        if(!$v == null) {
            header("refresh:0;url=Principal.php");
        }
    }

    function valHeader () {
        include("lib/headers.php");
        if($_SESSION['TipoUsuario'] == 1 || $_SESSION['TipoUsuario'] == 2 ) {
            headerG();
        }
        else {
            headerE();
        }
    }

    function valPrincipal() {
        include("lib/principales.php");
        if($_SESSION['TipoUsuario'] == 1 || $_SESSION['TipoUsuario'] == 2 ) {
            principalG();
        }
        else {
            principalE();
        }
    }

    function valCatalogo () {
        if ($_SESSION['TipoUsuario'] == 3) {
            header("refresh:0;url=Principal.php");
        }
    }

?>
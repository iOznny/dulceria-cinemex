<?php
    include("conexiondb.php");

    $user = $_POST['slcUser'];
    $password = $_POST['inpPass'];
    $Array = ConsultTable("users");

    foreach ($Array as $row => $Campo) {
        if($Campo['name'] == $user) {
            if($Campo['password'] == $password) {
                session_start();

                $_SESSION['NombreUsuario'] = $Campo['name'];
                $_SESSION['UsuarioID'] = $Campo['id'];
                $_SESSION['TipoUsuario'] = $Campo['typeID'];
                $_SESSION['verificar'] = true;

                header("refresh:0;url=../Principal.php");
            }
            else {
                header("refresh:0;url=../index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <?php
        include("lib/head.html");
        include("libphp/Metodos.php");
        include("libphp/conexiondb.php");
        SesionIniciada();
    ?>

    <link rel="stylesheet" href="assets/css/StyleLogin.css">
    
  <body>
    <form id="formLogin" action="libphp/loginval.php" method="POST" class="login-form">
      <!--Imagen de encabezado del formulario.-->
      <div class="imgb">
        <img src="assets/img/logo-head-form.png" alt="Cinemex Logo">
      </div>

      <h2>INICIAR SESIÓN</h2>

      <div class="txtbh2"></div>

      <div class="txtb">
        <select required autofocus name="slcUser" id="slcUser">
          <option value="" hidden selected>Seleccione su usuario...</option>
          <?php querySlc("users", "name", "name"); ?>
        </select>
      </div>

      <div class="txtb">
        <input type="password" name="inpPass" id="inpPass" placeholder="Contraseña" required minlength="8" maxlength="32" pattern="[0-9a-zA-Zá-uÁ-ÚñÑ]{8,32}">
      </div>

      <!--Botón para ingresar.-->
      <button type="submit" class="logbtn" onclick="valLogin();">INGRESAR</button>

      <br>
      <div id="boxError" class="txtb">
      </div>
    </form>

  </body>
</html>
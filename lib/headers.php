<?php

  function headerE() {
      echo '
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="Principal.php">  
            <img src="assets/img/Logo.png" class="logotipo" style="width:100px;">
          </a>
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="Principal.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Entradas.php">Entradas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Salidas.php">Salidas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="libphp/logout.php" tabindex="-1" aria-disabled="true">Salir</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>';
  }

  function headerG() {
      echo '
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="Principal.php">  
            <img src="assets/img/Logo.png" class="logotipo" style="width:100px;">
          </a>
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="Principal.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Catalogo.php">Catalogo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Entradas.php">Entradas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Salidas.php">Salidas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="libphp/logout.php" tabindex="-1" aria-disabled="true">Salir</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>';
  }

?>





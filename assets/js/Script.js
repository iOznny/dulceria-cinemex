
function querySlc (x) {
  return document.querySelector(x);
}


function msgError (msg) {  
  var e = querySlc('#boxError');
  e.innerText = msg;
  e.className = "validar error";
}

function msgCorrect () {
  var c = querySlc('#boxError');
  c.innerText = "¡Correcto, por favor de click en el botón!"
  c.className = "validar correcto";
}

function msgClear () {
  var l = querySlc('#boxError');
  l.innerText = "";
  l.className = null;
}

function valLogin () {
  $(document).on('click', '#formLogin', function() {
    var Rol = querySlc('#slcUser').value;
    var Pass = querySlc('#inpPass').value;

      if (Rol.length == 0){
        msgError("Seleccione un usuario.");
      }
      else {
        msgClear();
        if (Pass == "" || (Pass.length < 8 || Pass.length > 32)) {
          msgError("Ingrese una contraseña.");
        }   
      }
  });
}

function valDesc (input) {
  $(document).ready(function(){
    var max_chars = 30;
  
    $('#max').html(max_chars);
  
    $(input).keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador').html(diff);   
    });
  });
}




/* Validación de pagina de Catalogo. */
function valCatalogue() {
  $(document).on('click', '#formCatalogue', function() {
    var codeProduct = querySlc('#ctCodeProduct').value;
    var nameProduct = querySlc('#ctNameProduct').value;
    var descProduct = querySlc('#ctDescription').value;
    var maxStock = querySlc('#ctMaxStock').value;
    var minStock = querySlc('#ctMinStock').value;
    var category = querySlc('#ctCategoria').value;
    var container = querySlc('#ctContenedor').value;
    var dateExpiry = querySlc('#ctDateExpiry').value;

    var pattern = new RegExp('^[A-Z ]+$', 'i');

    valDesc('#ctDescription');

    if (!pattern.test(codeProduct) || codeProduct == "" || (codeProduct.length < 3 || codeProduct.length > 30)) {
      msgError("Ingrese el codigo del producto.");
    }
    else {
      msgClear();
      if (!pattern.test(nameProduct) || nameProduct == "" || (nameProduct.length < 3 || nameProduct.length > 30)) {
        msgError("Ingrese el nombre del producto.");
      }
      else {
        msgClear();
        if (descProduct == "" || (descProduct.length < 5 || descProduct.length > 30)) {
          msgError("Ingrese una descripción.");
        }
        else {
          msgClear();
          if (dateExpiry == "") {
            msgError("Ingrese una fecha valida, verifique.");
          }
          else {
            msgClear();
            if (maxStock == "" || (maxStock <= 0  || maxStock > 9999)) {
              msgError("Máximo de stock invalido, verifique.");
            }
            else {
              msgClear();
              if (minStock == "" || (minStock <= 0 || minStock > 9999)) {
                msgError("Mínimo de stock invalido, verifique.");
              }
              else {
                msgClear();
                if (category.length == 0) {
                  msgError("Seleccione una categoria.");
                }
                else {
                  msgClear();
                  if (container.length == 0) {
                    msgError("Seleccione un contenedor.");
                  }
                  else {
                    msgCorrect();
                    $("#formCatalogue").attr("action", "GuardarCatalogo.php"); 
                  }
                }
              }
            }
          }
        }
      } 
    }
  });
}

function valInputs () {
  $(document).on('click', '#formInput', function () {
    var cantInput = querySlc('#itpCuantity').value;
    var productInput = querySlc('#itpNameProduct').value;

    if (productInput.length == 0) {
      msgError("Seleccione un producto.");
    }
    else {
      msgClear();
      if (cantInput == "" || (cantInput <= 0 || cantInput > 9999)) {
        msgError("Ingrese una cantidad valida, verifique.");
      }
      else {
        msgCorrect();
        $("#formInput").attr("action", "GuardarEntrada.php"); 
      }
    }
  });
}

function valOutput () {
  $(document).on('click', '#formOutput', function () {
    var cantOutput = querySlc('#outCuantity').value;
    var productOutput = querySlc('#outNameProduct').value;

    if (productOutput.length == 0) {
      msgError("Seleccione un producto.");
    }
    else {
      msgClear();
      if (cantOutput == "" || (cantOutput <= 0 || cantOutput > 9999)) {
        msgError("Ingrese una cantidad valida, verifique.");
      }
      else {
        msgCorrect();
        $("#formOutput").attr("action", "GuardarSalida.php"); 
      }
    }
  });
}


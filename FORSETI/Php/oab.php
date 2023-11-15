
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>da</title>
</head>
<body>
  <form>
    <label for="oab">Número da OAB:</label>
    <input type="text" id="oab" name="oab">
    <button type="submit">Enviar</button>
  </form>
</body>
<script type="text/javascript">
  function validarOAB(numero) {
  // Verifica se o número da OAB tem o formato correto
  var regex = /^[A-Z]{2}\d{4}\d?$/;
  if (!regex.test(numero)) {
    return false;
  }

  // Calcula o dígito verificador da OAB
  var letras = "ABCDEFGHJKLMNPQRSTUVWXYZ";
  var digitos = numero.substr(2, 4) + numero.substr(7, 2);
  var soma = 0;
  for (var i = 0; i < digitos.length; i++) {
    soma += letras.indexOf(digitos.charAt(i)) * (i + 2);
  }
  var dv = (soma % 36);
  if (dv == 0) {
    dv = "0";
  } else {
    dv = letras.charAt(36 - dv);
  }

  // Verifica se o dígito verificador é igual ao da OAB informada
  if (dv != numero.charAt(6)) {
    return false;
  }

  return true;
}

// Obtém o formulário de cadastro e adiciona um evento de submissão
var formulario = document.querySelector("form");
formulario.addEventListener("submit", function(event) {
  event.preventDefault();
  var numeroOAB = document.getElementById("oab").value;
  if (validarOAB(numeroOAB)) {
    alert("O número da OAB é válido!");
    formulario.submit();
  } else {
    alert("O número da OAB é inválido!");
  }
});

</script>
</html>
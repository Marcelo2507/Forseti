const form = document.querySelector('form');
const mensagem = document.querySelector('#mensagem');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  const email = document.querySelector('#email').value;
  const senha = document.querySelector('#senha').value;
  const dados = {
    email: email,
    senha: senha
  };

  fetch('login.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(dados)
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      mensagem.textContent = 'Login realizado com sucesso!';
      window.location.href = 'dashboard.html';
    } else {
      mensagem.textContent = 'E-mail ou senha inválidos.';
    }
  })
  .catch(error => {
    mensagem.textContent = 'Ocorreu um erro ao tentar fazer o login.';
  });
});
// Get the form element by its ID
var form = document.getElementById('formulario');

// Add an event listener to the form
form.addEventListener('submit', function(event) {
// Prevent the default form submission
event.preventDefault();

// Get the values from the form
var senha = document.getElementById('senha').value;
var confirmar_senha = document.getElementById('confirmar_senha').value;

if (senha == confirmar_senha) {
    enviarDados()
    atualizarRedirecionarPagina()
} else {
         window.alert("Opá, há informações invalidas em seu cadastro")
        }

function enviarDados() {
// Obtenha os dados do formulário
var formData = new FormData(document.getElementById('formulario'));

// Use a função fetch para enviar os dados para o script PHP
fetch('cadastro.php', {
      method: 'post',
      body: formData})
                      }

function atualizarRedirecionarPagina() {
        location.href = location.href;
        window.location.href = 'login.html';}
                                         })

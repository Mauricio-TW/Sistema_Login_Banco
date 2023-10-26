document.getElementById('cadastro-form').addEventListener('submit', function (event) {
    const nome = document.getElementById('nome').value;
    const sobrenome = document.getElementById('sobrenome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmaSenha = document.getElementById('confirma-senha').value;
    const termos = document.getElementById('termos').checked;
    const telefone = document.getElementById('telefone').value;
    const erroTelefone = document.getElementById('erro-telefone');
    const erroEmail = document.getElementById('erro-email');

    // Validaçao do Telefone
    if (telefone.length < 13) {
        erroTelefone.innerText = 'O telefone deve ter pelo menos 13 caracteres.';
        event.preventDefault();
    } else {
        erroTelefone.innerText = '';
    }

    // Validação do Email
    if (!isValidEmail(email)) {
        erroEmail.innerText = 'O email não é válido.';
        event.preventDefault();
    } else {
        erroEmail.innerText = '';
    }

    //Segunda Parte da Validação
    if (!nome || !sobrenome || !email || !senha || !confirmaSenha || !termos) {
        erroMensagem.innerText = 'Preencha todos os campos obrigatórios e concorde com os termos.';
        event.preventDefault();
    }
});

// Função de validação do Email
function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}
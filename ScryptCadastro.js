document.addEventListener('DOMContentLoaded', function () {
    // Função pra validar confirmação da Senha
    function validatePassword() {
        var senha = document.getElementById('senha').value;
        var confirmaSenha = document.getElementById('confirma-senha').value;
        var erroSenha = document.getElementById('erro-mensagem');

        if (senha !== confirmaSenha) {
            erroSenha.textContent = 'As senhas não coincidem.';
            return false;
        } else {
            erroSenha.textContent = '';
            return true;
        }
    }

    // Evento para Submissao
    document.getElementById('cadastro-form').addEventListener('submit', function (event) {
        if (!validatePassword()) {
            // Previne envio se as senhas Não batem
            event.preventDefault();
        }
    });
});
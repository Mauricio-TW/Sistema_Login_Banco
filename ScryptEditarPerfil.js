 // Função para validar se o campo "Confirmar Senha" é igual ao campo "Senha"
 function validarConfirmarSenha() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirma-senha").value;

    if (senha !== confirmarSenha) {
        document.getElementById("erro-mensagem").innerText = "As senhas não coincidem";
        return false;
    } else {
        document.getElementById("erro-mensagem").innerText = "";
        return true;
    }
}

// Adicione a função de validação ao evento 'submit' do formulário
document.getElementById("editar-perfil-form").addEventListener("submit", function(event) {
    if (!validarConfirmarSenha()) {
        event.preventDefault(); // Impede o envio do formulário se as senhas não coincidirem
    }
});
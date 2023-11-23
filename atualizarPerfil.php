<?php
include("conexao.php");


$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$telefone = $_POST["telefone"];
$curso = $_POST["curso"];
$senha = $_POST["senha"];

//Upload de Imagem
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_FILES["imagem"])) {
        $caminhoArquivo = $_FILES["imagem"]["name"];
        echo "Caminho da imagem recebido: " . $caminhoArquivo;
        $sql = mysqli_query($banco, "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', curso='$curso', senha='$senha', imagem_usuario='$caminhoArquivo' WHERE email='$email'");
   
        if ($sql) {
            echo "Perfil atualizado com sucesso.<br>";
            echo "<META http-equiv='refresh' content='3,URL=inicialSistema.html'>";
        } else {
            echo "Não foi possível atualizar o perfil.<br>Causa: " . mysqli_error($banco);
        }
        
    }
     
    else {
        echo "Erro: Nenhuma imagem foi enviada.";
    }
} else {
    echo "Erro: Método de requisição inválido.";
}

mysqli_close($banco);
?>
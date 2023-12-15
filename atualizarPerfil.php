<?php
include("conexao.php");


$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$telefone = $_POST["telefone"];
$curso = $_POST["curso"];
$senha = $_POST["senha"];

//Upload de Imagem
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Verificação Imagem
    if (isset($_FILES["imagem"])) {
        $caminhoArquivo = $_FILES["imagem"]["name"];
        //Caminho Imagem
        $email = mysqli_query($banco, "update cadastro set nome='$nome', sobrenome='$sobrenome', email='$email', telefone='$telefone', curso='$curso', img_usuario='assets/img/imgUsers/$caminhoArquivo' where email='$email'");
        
    } else {
        echo "Nenhuma Imagem foi Enviada.";
    }
} else {
    echo "Método de Requisição Inválido.";
}

mysqli_close($banco);
?>
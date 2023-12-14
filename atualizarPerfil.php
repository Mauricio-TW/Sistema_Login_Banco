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
        $email = mysqli_query($banco, "update cadastro set nome='$nome', sobrenome='$sobrenome', email='$email', telefone='$telefone', curso='$curso', img_perfil='assets/img/imgUsuers/$caminhoArquivo' where email='$email'");
        
    } else {
        echo "Nenhuma imagem foi enviada.";
    }
} else {
    echo "Método de requisição inválido.";
}

mysqli_close($banco);
?>
<?php 
    include("conexao.php");
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $curso = $_POST["curso"];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
        if (isset($_FILES["imagem"])) {
            $caminhoArquivo = $_FILES["imagem"]["name"];
            // echo "Caminho da imagem recebido: " . $caminhoArquivo;
            $email = mysqli_query($banco, "update cadastro set nome='$nome', sobrenome='$sobrenome', email='$email', telefone='$telefone', curso='$curso', imagem_usuario='assets/img/imgUsuers/$caminhoArquivo' where email='$email'");
            
        } else {
            echo "Erro: Nenhuma imagem foi enviada.";
        }
    } else {
        echo "Erro: Método de requisição inválido.";
    }

    mysqli_close($banco);
?>
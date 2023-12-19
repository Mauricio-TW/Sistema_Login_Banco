<?php
session_start();
include("conexao.php");

$dados = $_SESSION['meusDados'];

$imgUsuarioLogin = mysqli_query($banco, "select nome, imagem_usuario from cadastro where email='".strval($dados)."';");
$resultImgLogin = mysqli_fetch_row($imgUsuarioLogin);

$nome_usuario = $resultImgLogin[0];
$_SESSION['nome_usuario'] = $nome_usuario;

if ($resultImgLogin) {
    $imagem_blob = implode(",",$resultImgLogin);
} else {
    echo "Imagem não encontrada";
}

$imgBdLoginUsuarios = mysqli_query($banco, "select email, imagem_usuario from cadastro");
$resultImgLoginsBd = mysqli_num_rows($imgBdLoginUsuarios);

mysqli_close($banco);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="Style.css">
        <title>Sistema de Login</title>
        <link rel="icon" href="/assets/imgSite/lamborghini logo1.png" type="Logo">
</head>

<body>
    <!-- Scrypt -->
    <script src="/assets/JS/Scrypt.js"></script>
    
    <!--Header-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="/assets/imgSite/lamborghini logo1.png" width="100" height="100" alt="Logo"></a>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            </ul>

          </div>
        </div>
      </nav> 

    <section class="section_tela_inicial">
        <div class="img_nome_usuario">

            <?php
            echo "<img src='$imagem_blob' alt='' width='140px'>";
            ?>
        </div>
        <div class="abas">
            <div class="grid-container">
                <a class="grid-item" href="batePapo.php">Bate Papo</a>
                <a class="grid-item" href="materias.php">Materiais</a>
                <a class="grid-item" href="usuarios.php">Usuários</a>

            </div>
        </div>

        <div class="usuarios">
            <h3>Usuários</h3>
            <div class="img_usuarios">
                <?php
                for ($i = 0; $i < $resultImgLoginsBd; $i++) {
                    $imgLoginUsuarios = mysqli_fetch_row($imgBdLoginUsuarios);
                    if ($dados != $imgLoginUsuarios[0]) {
                        echo "<img src='$imgLoginUsuarios[1]' alt='' >";
                    }
                }


                ?>
            </div>
        </div>

        <div class="abas">
            <div class="grid-container_2">
                <a class="grid-item" href="editarPerfil.html">Editar Perfil</a>
                <a class="grid-item" href="gerenciarConteudos.php">Gerenciar meus conteudos</a>
                <a class="grid-item" href="login.html">Sair</a>

            </div>
        </div>

    </section>

    <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
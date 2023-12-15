<?php
  session_start();
  include("conexao.php");

  $dados = $_SESSION['meusDados'];

  $imgUsuarioLogin = mysqli_query($banco, "select nome, imagem_usuario from cadastro where email='$dados';");
  $resultImgLogin = mysqli_fetch_row($imgUsuarioLogin);

  $nome_usuario = $resultImgLogin[0];
  $_SESSION['nome_usuario'] = $nome_usuario;

if ($resultImgLogin) {
    $imagem_blob = $resultImgLogin[1];
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
    <link rel="stylesheet" href="StylePerfil.css">
    <title>Sistema de Login</title>
    <link rel="icon" href="Imagens/lamborghini logo1.png" type="Logo">
</head>
<body>
    <script src="Scrypt.js"></script>
    
    <!--Header-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
            <img src="Imagens/lamborghini logo1.png" width="100" height="100" alt="Logo"></a>
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

    <!-- Espaço entre o header conteudo -->
    <div class="container">
      <div class="row">
          <div class="col-md-12 mt-4">
          </div>
      
    <!--Conteudo-->
      <?php
          echo "<img src='$imagem_blob' alt='' width='140px'>";
       ?>
        
        <div class="btn-group">
            <a href="batePapo.html" class="btn btn-primary">Bate Papo</a>
            <a href="materiais.php" class="btn btn-primary">Materiais</a>
            <a href="usuarios.php" class="btn btn-primary">Usuarios</a>
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
    </div>

    <!--Botões -->
    <div class="footer-buttons">
      <a href="EditarPerfil.html" class="btn btn-primary">Editar Perfil</a>
      <a href="gerenciarConteudos.php" class="btn btn-primary">Gerenciair Conteudos</a>
        <a href="index.html" class="btn btn-danger">Sair</a>
    </div>

    <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
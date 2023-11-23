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
    <div class="container">
        <div class="profile-info">
            <div class="user-name">Nome do Usuário</div>
            <div class="user-image-container">
              <?php

              include("conexao.php");

                if (isset($imagem_base64)) {
                  echo '<img src="data:image/jpeg;base64,' . $imagem_base64 . '" class="profile-image" alt="Profile Image">';
              } else {
                  echo '<img src="/Imagens/userIcon.png" class="profile-image" alt="Profile Image">';
              }
          ?>
            </div>
            <div class="user-description">Texto de informação do usuário</div>
        </div>
        

        <div class="btn-group">
            <button class="btn btn-primary">Tema de Estudo</button>
            <button class="btn btn-primary">Bate Papo</button>
            <button class="btn btn-primary">Materiais</button>
            <button class="btn btn-primary">Usuários</button>
        </div>

        <div class="favorite-users">
            <h4>Usuários Favoritos</h4>      
            <div class="favorite-user-item">
                <span>User 1</span>
            </div>
            <div class="favorite-user-item">
                <span>User 2</span>
            </div>
        </div>
    </div>

    <!--Botões -->
    <div class="footer-buttons">
      <a href="EditarPerfil.html" class="btn btn-primary">Editar Perfil</a>
        <button class="btn btn-primary">Gerenciar Meus Contatos</button>
        <button class="btn btn-danger">Sair</button>
    </div>

    <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
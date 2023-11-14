<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Style.css">
    <title>Sistema de Login</title>
    <link rel="icon" href="Imagens/lamborghini logo1.png" type="Logo">
</head>
<body>
    <script src="ScryptCadastro.js"></script>
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
      //importação dos dados do BD no mysql
        include("conexao.php");
      //Valores digitados na interface(index.HTML)
        $nome     = $_POST["nome"];
        $sobrenome= $_POST["sobrenome"];
        $telefone = $_POST["telefone"];
        $email    = $_POST["email"];
        $curso    = $_POST["curso"];
        $senha    = $_POST["senha"];

      //query do sql
        $sql = mysqli_query($banco,"insert into cadastro values(null,'$nome', '$sobrenome', '$telefone', '$email', '$curso', '$senha');");
          if ($sql) {
                    echo "Contato cadastrado com sucesso.<br>";
                  }
          else{
                    echo "Não foi possivel cadastrar.<br>Causa: ".mysqli_error($banco);
              }
              mysqli_close($banco);
      ?>
      
     <div class="row justify-content-center">
      <div class="col-md-6">
          <h2>Cadastro</h2>
          <form id="cadastro-form" action="cadastro.php" method="post">
              <div class="mb-3">
                  <label for="nome" class="form-label">Nome</label>
                  <input name="nome" type="text" class="form-control" id="nome" required>
              </div>
              <div class="mb-3">
                  <label for="sobrenome" class="form-label">Sobrenome</label>
                  <input name="sobrenome" type="text" class="form-control" id="sobrenome" required>
              </div>
              <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input name="telefone" type="tel" class="form-control" id="telefone" required>
                <span id="erro-telefone" class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" required>
                <span id="erro-email" class="text-danger"></span>
            </div>
            
              <div class="mb-3">
                  <label for="curso" class="form-label">Curso</label>
                  <input name="curso" type="text" class="form-control" id="curso" required>
              </div>
              <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input name="senha" type="password" class="form-control" id="senha" required>
              </div>
              <div class="mb-3">
                  <label for="confirmaSenha" class="form-label">Confirmar Senha</label>
                  <input name="confirmaSenha" type="password" class="form-control" id="confirma-senha" required>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="termos" required>
                  <label class="form-check-label" for="termos">Concordo com os <a href="#">termos de uso</a> e <a href="#">política de privacidade</a></label>
              </div>
              <div class="buttonCadastro">
                <button type="submit" class="btn btn-success mb-4">Confirmar</button>
                <a href="index.html" class="btn btn-danger mb-4">Cancelar</a>
              </div>
              <span id="erro-mensagem" class="text-danger"></span>
           </form>
      </div>
  </div>
</div>

 <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
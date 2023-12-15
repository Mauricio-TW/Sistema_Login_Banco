<?php
session_start();
include("conexao.php");

$queryArquivo = mysqli_query($banco, "select titulo, arquivo, data_materia, id_cadastro_professor from materia;");
$arquivoBd = mysqli_num_rows($queryArquivo);
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
     <section class="section_conteudo">
        <div class="grid-container_materias">
            <?php
            for ($i = 0; $i < $arquivoBd; $i++) {
                $arquivoBanco = mysqli_fetch_row($queryArquivo);

                $queryProfessor = mysqli_query($banco, "select nome, sobrenome from cadastro where id_cadastro $arquivoBanco[3];");
                $dadosProfessor = mysqli_fetch_row($queryProfessor);

                //Converte  data
                $data = implode("/",array_reverse(explode("-",$arquivoBanco[2])));

                echo "<div class='grid-item_materias materias'> Prof: $dadosProfessor[0] $dadosProfessor[1] <br> Conteudo: <a href='$arquivoBanco[1]'> $arquivoBanco[0] </a> <br> $data </div>";
            }
            ?>

        </div>
    </section>
    
     <div class="buttonVoltar">
      <a href="inicialSistema.php" class="btn btn-danger mb-4">Voltar</a>
    </div>
    

 <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
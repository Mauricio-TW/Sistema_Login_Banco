<?php
    session_start();
    include("conexao.php");
    
    $email_login = $_SESSION['meusDados'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (isset($_FILES['arquivo'])) {                
                $nomeArquivo = $_POST['nomeArquivo'];               
                $query_dadosUsuario_login = mysqli_query($banco, "select id_cadastro from cadastro where email='$email_login';");                
                $dadosUsuario_login = mysqli_fetch_row($query_dadosUsuario_login);
                $caminhoArquivo = $_FILES['arquivo']['name'];
                $sql = mysqli_query($banco, "insert into materia values (null,'$nomeArquivo', 'assets/img/imgUsuers/$caminhoArquivo', NOW(), '$dadosUsuario_login[0]')");

                if ($sql) { 
                    echo"<META http-equiv='refresh' content='0,URL=materias.php'>";
                } else {
                    echo "Nâo foi possível cadastrar<br>Causa:".mysqli_error($banco) ;
                
                }
            
            } else {
                echo "Erro: Nenhum arquivo foi enviado.";
            }
        } else {
            echo "Erro: Método de requisição inválido.";
        }
    
       
        $query_dadosUsuarioProfessor_login = mysqli_query($banco, "select id_cadastro from cadastro where email='$email_login';");        
        $dadosUsuarioProfessor_login = mysqli_fetch_row($query_dadosUsuarioProfessor_login);      
        $queryArquivoProfessor = mysqli_query($banco, "select titulo, arquivo, data_materia, id_cadastro from materia where id_cadastro='$dadosUsuarioProfessor_login[0]';");
        $arquivoProfessorBd = mysqli_num_rows($queryArquivoProfessor);

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
        <link rel="icon" href="/assets/img/imgSite/lamborghini logo1.png" type="Logo">
</head>

<body>
    <!-- Scrypt -->
    <script src="/assets/JS/Scrypt.js"></script>
    
    <!--Header-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
            <img src="/assets/img/imgSite/lamborghini logo1.png" width="100" height="100" alt="Logo"></a>
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

        <section class="section_conteudo">
        <div class="cadastrar_materias">
            <form method="post" action="gerenciarConteudos.php" enctype="multipart/form-data">
                <label class="espacamento_form" for="nomeArquivo_input">Nome do arquivo:</label>
                <input type="text" name="nomeArquivo" id="nomeArquivo_input">
                <input type="file" name="arquivo" id="arquivo_input" accept="arquivo/*">
                
                <input class="espacamento_form botao_form botao" type="submit" value="Enviar Arquivo" placeholder="Enviar Arquivo">
            </form>
        </div>
    </section>

    <section class="section_conteudo">
        <div class="grid-container_materias">
            <?php
            for ($i = 0; $i < $arquivoProfessorBd; $i++) {         
                $arquivoProfessorBanco = mysqli_fetch_row($queryArquivoProfessor);
                $query_dadosProfessorBanco = mysqli_query($banco, "select nome, sobrenome from cadastro where $arquivoProfessorBanco[3];");
                $dadosProfessorBanco = mysqli_fetch_row($query_dadosProfessorBanco);                
                $data = implode("/",array_reverse(explode("-",$arquivoProfessorBanco[2])));

                echo "<div class='grid-item_materias materias'> Prof: $dadosProfessorBanco[0] $dadosProfessorBanco[1] <br> Conteudo:   <a href='$arquivoProfessorBanco[1]'> $arquivoProfessorBanco[0] </a> <br> $data </div>";
            }
            ?>

        </div>
    </section>
        <!--Footer-->
        <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
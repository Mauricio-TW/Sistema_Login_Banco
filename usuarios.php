<?php
session_start();
include("conexao.php");

$dados = $_SESSION['meusDados'];

$query_dadosUsuarios = mysqli_query($banco, "select nome, sobrenome, email, imagem_usuario from cadastro");
$resultDadosLoginsBd = mysqli_num_rows($query_dadosUsuarios);

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

    <div class="container_card_usuairios-usuarios">
        <div class="div_cards-usuarios">
            <?php
            for ($i = 0; $i < $resultDadosLoginsBd; $i++) {
                $dadosLoginUsuarios = mysqli_fetch_row($query_dadosUsuarios);
                if ($dados != $dadosLoginUsuarios[2]) {
                    echo "<div class='card_usuarios-usuarios'><img src='$dadosLoginUsuarios[3]' alt='' ><p>Professor: $dadosLoginUsuarios[0] $dadosLoginUsuarios[1]</p><p>$dadosLoginUsuarios[2]</p></div>";
                }
            }
            ?>
        </div>
    </div>

    <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
<?php
session_start(); 

ob_start();
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
    <script src="/assets/JS/ScryptBP.js"></script>
    
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

    <section class="section_batepapo-batepapo">

        <div class="div_batepapo_left">
            <img src="/assets/img/imgSite/lamborghini logo1.png" alt="">
        </div>

        <div class="div_batepapo_right">           
            <p>Bem-vindo: <span id="nome-usuario">
                    <?php echo $_SESSION['nome_usuario']; ?>
                </span> </p>
            
            <div class="campo_mensagens-batepapo" id="campo_mensagens-batepapo">
                <span id="mensagem-chat"> </span>
            </div>

            <div class="digitar_enviar_mensagem-batepapo">                
                <input type="text" name="mensagem" id="mensagem" placeholder="Digite a mensagem...">
                <input type="button" onclick="enviar()" value="enviar" id="botao_enviar">
            </div>
        </div>

    </section>

    <!--Footer-->
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p>&copy; Mauricio AVA. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
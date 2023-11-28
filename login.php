<?php
      include("conexao.php");
             
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        
           
            $email_input = mysqli_query($banco, "select email from cadastro where email='$email' and senha='$senha';");
            $senha_input = mysqli_query($banco, "select senha from cadastro where email='$email' and senha='$senha';");
            $registro_email = mysqli_fetch_row($email_input);
            $registro_senha = mysqli_fetch_row($senha_input);
        
            
                if ($email == $registro_email[0] && $senha == $registro_senha[0]) {
                    echo "Login bem-sucedido!";
                    echo"<META http-equiv='refresh' content='0,URL=inicialSistema.php'>";
                } else {
                    echo "Usuário ou senha incorretos.";
                    echo"<META http-equiv='refresh' content='5,URL=index.html'>";
                }         

            }  else {
                echo "Erro na consulta.<br>Causa: ".mysqli_error($banco);
            }
                
        mysqli_close($banco);
        ?>

    <form method="get" action="cadastro.php">
        
        <input type="hidden" name="email" value="<?php $email = $_GET['email'];echo $email;?>">
        <input type="hidden" name="senha" value="<?php $nome = $_GET['senha'];echo $senha;?>">
    </form>
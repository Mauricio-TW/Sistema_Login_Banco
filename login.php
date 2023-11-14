<?php
      include("conexao.php");
             
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            $email = $_POST["email"];
            $senha = $_POST["senha"];
        
           
            $email = mysqli_query($banco, "select email from cadastro where email='$email' and senha='$senha';");
            $senha = mysqli_query($banco, "select senha from cadastro where email='$email' and senha='$senha';");
            $registro_email = mysqli_fetch_row($email);
            $registro_senha = mysqli_fetch_row($senha);
        
            
                if ($email == $registro_email[0] && $senha == $registro_senha[0]) {
                    echo "Login bem-sucedido!";
                    echo"<META http-equiv='refresh' content='0,URL=inicialSistema.html'>";
                } else {
                    echo "Usuário ou senha incorretos.";;
                    echo"<META http-equiv='refresh' content='5,URL=index.html'>";
                }         

            }  else {
                echo "Erro na consulta.<br>Causa: " . mysqli_error($banco);
            }
                
        mysqli_close($banco);
        ?>
      
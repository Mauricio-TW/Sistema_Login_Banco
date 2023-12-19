
    <?php
    session_start();
    include("conexao.php");

    $email_input = $_POST["email_input"];
    $senha_input = $_POST["senha_input"];


    $email = mysqli_query($banco, "select email from cadastro where email='$email_input' and senha='$senha_input';");
    if (!$email) {
        echo "<p> Query [1] couldn't be executed </p>";
        echo mysqli_error($banco);
    }
    $senha = mysqli_query($banco, "select senha from cadastro where email='$email_input' and senha='$senha_input';");
    if (!$senha) {
        echo "<p> Query [1] couldn't be executed </p>";
        echo mysqli_error($banco);
    }
    echo "mamaki";
    $registro_email = implode(",",mysqli_fetch_row($email));
    $registro_senha = implode(",", mysqli_fetch_row($senha));

    if (strval($email_input) == strval($registro_email) && strval($senha_input) == strval($registro_senha)) {
        
        $dados = $registro_email;
        echo $dados;
        echo "<br> al";
        $_SESSION['meusDados'] = $dados;

        mysqli_close($banco);
        
            echo "<META http-equiv='refresh' content='0,URL=index.php'>";
        
    } else {
        echo "Ocorreu algum erro a";
        echo $email_input;
        echo "j";
        echo $senha_input;
        echo "<br>";
        //echo "<META http-equiv='refresh' content='0,URL=login.html'>";
    }

?>


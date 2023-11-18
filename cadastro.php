<?php

        include("conexao.php");
      
        $nome     = $_POST["nome"];
        $sobrenome= $_POST["sobrenome"];
        $telefone = $_POST["telefone"];
        $email    = $_POST["email"];
        $curso    = $_POST["curso"];
        $senha    = $_POST["senha"];


        $sql = mysqli_query($banco,"insert into cadastro values(null,'$nome', '$sobrenome', '$telefone', '$email', '$curso', '$senha', '');");
          if ($sql) {
                    echo "Contato cadastrado com sucesso.<br>";
                    //echo"<META http-equiv='refresh' content='2,URL=index.html'>";
                  }
          else{
                    echo "Não foi possivel cadastrar.<br>Causa: ".mysqli_error($banco);
                    //echo"<META http-equiv='refresh' content='2,URL=novoCadastro.html'>";
              }
              mysqli_close($banco);
      ?>
      
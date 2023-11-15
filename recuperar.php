<?php
     include("conexao.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
        $email = $_POST["email"];
    
                $email_input = mysqli_query($banco, "select senha from cadastro where email='$email';");
    }


?>

<form method="get" action="cadastro.php">
        
        <input type="hidden" name="email" value="<?php $email = $_GET['email'];echo $email;?>">
</form>
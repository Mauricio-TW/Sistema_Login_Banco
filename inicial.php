<?php
    include("conexao.php");

    $sql = mysqli_query($banco, "SELECT img_perfil FROM cadastro WHERE email='$email';");
    $result = mysqli_fetch_row($sql);

    if ($result) {
        $imagem_blob = $result[0];
        $imagem_base64 = base64_encode($imagem_blob);
    } else {
        http_response_code(404);
        echo "Imagem não encontrada";
    }

    mysqli_close($banco);
?>
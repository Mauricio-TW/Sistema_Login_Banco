<?php
    include("conexao.php");
    
    $sql = mysqli_query($banco, "select img_perfil from cadastro where email='$email';");
    $result = mysqli_fetch_row($sql);
    
    if ($result) {
        $imagem_blob = $result[0];
    
       
    
    } else {
         http_response_code(404);
        echo "Imagem não encontrada";
    }
    
    
    mysqli_close($banco);
?>

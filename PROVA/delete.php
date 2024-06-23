<?php
session_start();
include_once "config.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o usuário existe
    $sqlSelect = "SELECT * FROM `create-account` WHERE id=$id";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Deleta o usuário
        $sqlDelete = "DELETE FROM `create-account` WHERE id=$id";
        if ($conn->query($sqlDelete) === TRUE) {
            // Exibe o loader e redireciona para a página de administração
            echo "
            <!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Usuário Deletado</title>
            </head>
            <body>
                <div class='loader-container'>
                    <div class='loader'></div>
                </div>
                <div class='msgSucess'>Usuário deletado com sucesso! Redirecionando...</div>
                <script>
                    setTimeout(function() {
                        window.location.href = 'admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
        } else {
            echo "Erro ao deletar usuário: " . $conn->error;
        }
    } else {
        header("Location: admin.php");
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}
?>

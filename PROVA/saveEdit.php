<?php
session_start();
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $genre = $_POST['genre'];
    $date = $_POST['date'];
    $nivel_acesso = $_POST['nivel_acesso'];

    // Query SQL corrigida
    $query = "UPDATE `create-account` SET 
                `name`='$name', 
                email='$email', 
                `password`='$password', 
                genre='$genre', 
                `date`='$date', 
                nivel_acesso='$nivel_acesso' 
              WHERE id='$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Sucesso</title>
        </head>
        <body>
            <div class='loader-container'>
                <div class='loader'></div>
            </div>
            <p class='msgSucess'>Atualizado! Redirecionando...</p>
            <script>
                setTimeout(function() {
                    window.location.href = 'admin.php';
                }, 2000);
            </script>
        </body>
        </html>
        ";
    } else {
        echo "<p>Erro ao atualizar os dados!</p>";
    }
}
?>

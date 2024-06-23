<?php
session_start();
include_once "config.php";
if (
  isset($_POST["submit"]) &&
  !empty($_POST["email"]) &&
  !empty($_POST["password"])
) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM `create-account` WHERE email = '$email' AND `password` = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $usuario = mysqli_fetch_assoc($result);
    $nivel_acesso = $usuario["nivel_acesso"];

    if ($nivel_acesso == 1) {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
            <!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Usuário Deletado</title>
            </head>
            <body>
                <div>
                    <div class='loader'></div>
                </div>
                <div>Redirecionando...</div>
                <script>
                    setTimeout(function() {
                        window.location.href = 'admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
    } else {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
      <!DOCTYPE html>
      <html lang='pt-BR'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Cadastro Sucesso</title>
      </head>
      <body>
          <div>
              <div class='loader'></div>
          </div>
          <p>Redirecionando...</p>
          <script>
              setTimeout(function() {
                  window.location.href = 'client.php';
              }, 1000);
          </script>
      </body>
      </html>
      ";
    }
  } else {
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location: login.php");
  }
}
?>

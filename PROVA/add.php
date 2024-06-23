<?php
session_start();
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $genre = $_POST['genero'];
    $date = $_POST['dataNascimento'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $password = md5($password);
    $verifica_email = "SELECT * FROM `create-account` WHERE email = '$email'";
    $result_validate = mysqli_query($conn, $verifica_email);

    if (mysqli_num_rows($result_validate) > 0) {
        echo "<p>EMAIL JA CADASTRADO!</p>";
    } else {
    $query = "INSERT INTO `create-account` (`name`, `email`, `password`, `genre`, `date`, `nivel_acesso`) VALUES ('$name', '$email', '$password', '$genre', '$date', '$nivel_acesso')";
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
                <p class='msgSucess'>Operação realizada com sucesso! Redirecionando...</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'admin.php';
                    }, 3000);
                </script>
            </body>
            </html>
            ";
        } else {
            echo "<p>Erro ao atualizar os dados!</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

        <body>
    <a href="admin.php"><i class="fa-solid fa-arrow-left icon"></i></a>


    <div class="box">
        <form action="add.php" method="POST">
            <fieldset>
                <legend><b>Add User</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" class="inputlabel">Name:</label>
                    <input type="text" name="name" id="nome" class="inputUser" placeholder="Name" required>
                    
                </div>

                <br>
                <div class="inputBox">
                    <label for="senha" class="inputlabel">Password:</label>
                    <input type="text" name="password" id="senha" class="inputUser" placeholder="Password" required>
                    
                </div>
                <br>
                <div class="inputBox">
                    <label for="email" class="inputlabel">Email:</label>
                    <input type="email" name="email" id="email" class="inputUser" placeholder="Email" required>
                    
                </div>
                <br>
                <div class="inputBox">
                    <label for="nivel_acesso" class="inputlabel">Level</label>
                    <select name="nivel_acesso" id="nivel_acesso" class="inputUser" required>
                        <option value="1" >Administrator</option>
                        <option value="2" >Client</option>
                    </select>
                </div>
                <br>
                <p class="inputlabel">Genre</p>
                <input type="radio" id="feminino" name="genero" value="feminino">
                <label for="feminino" class="radioSexo">Female</label>
                <input type="radio" id="masculino" name="genero" value="masculino">
                <label for="masculino" class="radioSexo">Male</label>
                <input type="radio" id="outro" name="genero" value="outro">
                <label for="outro" class="radioSexo">Other</label>
                <br><br>
                <div class="inputBox">
                    <label for="dataNascimento" class="inputlabel">Born's Date:</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" class="inputData" required>
                </div>
                <br>
                <div class="btn">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" id="submit" value="Submit" class="submit-btn">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>

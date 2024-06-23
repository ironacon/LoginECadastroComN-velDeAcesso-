<?php

if (isset($_POST['submit'])) {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $genre = $_POST['genero'];
    $date = $_POST['dataNascimento'];
    $nivel_acesso = 2;

    include_once ('config.php');

    $query = "INSERT INTO `create-account` (`name`, `email`, `password`, `genre`, `date`, `nivel_acesso`) VALUES ('$nome', '$email', '$senha', '$genre', '$date', '$nivel_acesso');
    ";

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
                        window.location.href = 'login.html';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="styleforms.css">
</head>

<body>
    <div class="box">
        <form action="forms.php" method="POST">
            <fieldset>
                <legend><b>Create Account</b></legend>
                <br>
                
                <div class="inputBox">
                    <label for="name" class="inputlabel">Name*</label>
                    <input type="text" name="name" id="name" class="inputUser" placeholder="Full name" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="email" class="inputlabel">Email*</label>
                    <input type="email" name="email" id="email" class="inputUser" placeholder="email@exemple.com"
                        required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="password" class="inputlabel">Password*</label>
                    <input type="password" name="password" id="password" class="inputUser" placeholder="Strong Password"
                        required>
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
                <input type="submit" id="submit" name="submit">
                <div class="alinhamento">

                </div>


            </fieldset>
        </form>
    </div>

</body>

</html>
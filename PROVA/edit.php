<?php
session_start();
include_once "config.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta ao banco de dados para obter os dados do usuário com o ID fornecido
    $sqlSelect = "SELECT * FROM `create-account` WHERE id=$id";
    $result = $conn->query($sqlSelect);

    // Verifica se encontrou algum registro
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $email = $row["email"];
            $password = $row["password"];
            $genre = $row["genre"];
            $date = $row["date"];
            $nivel_acesso = $row["nivel_acesso"];
        }
    } else {
        // Se não encontrou nenhum registro, redireciona de volta para a página admin.php
        header("Location: admin.php");
        exit();
    }
} else {
    // Se não foi fornecido nenhum ID, redireciona de volta para a página admin.php
    header("Location: admin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <a href="admin.php" class="back-link">
    <i class="fa-solid fa-arrow-left icon"></i>
    </a>

    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
            <legend><b>Edit User</b></legend>

                <div class="inputBox">
                    <label for="nome" class="inputlabel">Name:</label>
                    <input type="text" name="name" id="name" class="inputUser" value="<?php echo $name; ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="email" class="inputlabel">Email:</label>
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email; ?>" required>   
                </div>
                <br>
                <div class="inputBox">
                    <label for="senha" class="inputlabel">Password:</label>
                    <input type="text" name="password" id="senha" class="inputUser" value="<?php echo $password; ?>" required>   
                </div>

                <br>
                <p class="inputlabel">Genre</p>
                <input type="radio" id="feminino" name="genre" value="feminino" <?php echo ($genre == 'feminino') ? 'checked' : ''; ?>>
                <label for="feminino" class="radioSexo">Female</label>

                <input type="radio" id="masculino" name="genre" value="masculino" <?php echo ($genre == 'masculino') ? 'checked' : ''; ?>>
                <label for="masculino" class="radioSexo">Male</label>

                <input type="radio" id="outro" name="genre" value="other" <?php echo ($genre == 'other') ? 'checked' : ''; ?>>
                <label for="outro" class="radioSexo">Other</label>
                <br>
                <div class="inputBox">

        
                    <br>
                    <label for="nivel_acesso" class="inputlabel">Level</label>
                    <select name="nivel_acesso" id="nivel_acesso" class="inputUser" required>
                        <option value="1" <?php echo $nivel_acesso == "1" ? "selected" : ""; ?>>Administrator</option>
                        <option value="2" <?php echo $nivel_acesso == "2" ? "selected" : ""; ?>>Client</option>
                    </select>

                    <br><br>

                    <div class="inputBox">
                        <label for="dataNascimento" class="inputlabel">Born's Date:</label>
                        <input type="date" name="date" id="dataNascimento" class="inputData" value="<?php echo $date?>" required>
                    </div>
                </div>
                <br>

                <div class="btn">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="update" id="update" value="Atualizar" class="submit-btn">
                </div>
        </fieldset>
        </form>
    </div>
</body>


</html>
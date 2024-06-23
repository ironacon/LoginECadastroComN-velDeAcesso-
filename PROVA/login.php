<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelaDeLogin</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <div class="tela-login">
       
        <form action="testeLogin.php" method="post">
            <h1>Login</h1>
        <p id="texts">Email Adress*</p>
        <input type="email" name="email" placeholder="email@exemple.com" required>
        <br>
        <br>
        <p id="texts">Password*</p>
        <input type="password" name="password" placeholder="Strong Password" required>
        <br>
        <p  id="texts" style="display: flex;justify-content: center;" ><a href="forgot.com">Forgot Your Password?</a></p>
        <br>
        <div class="alinhamento">
            <button type="submit" name="submit" >Login</button>
        </div>
        <br>
        <p id="texts" style="display: flex;justify-content: center;">Don't Have Account? <a href="forms.html"> Create a Profile</a> </p>
       
        </form>
    </div>
</body>
</html>
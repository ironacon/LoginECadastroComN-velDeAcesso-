<?php session_start();

if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
    header("Location: login.php");
    exit();
}

$userLogado = $_SESSION["email"];
include_once "config.php";

$queryNameUser = "SELECT `name` FROM `create-account` WHERE email = '$userLogado'";
$resultNameUser = mysqli_query($conn, $queryNameUser);

if ($resultNameUser) {
    if (mysqli_num_rows($resultNameUser) > 0) {
        $row = mysqli_fetch_assoc($resultNameUser);
        $nameUser = $row["name"];
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    echo "Erro ao obter o nome do usuário: " . mysqli_error($conn);
}

$query = "SELECT * FROM `create-account` ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDashboard</title>
    <link rel="stylesheet" href="client.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="#">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <h2 class="username"><?php echo $nameUser?></h2>
                <i class="fa-regular fa-user icon"></i>
            </div>
        </div>

        <div class="card--container">
            <h1 class="main--title">Today's daily</h1>
            <div class="card--wrapper">

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                O Declínio de um Homem</span>
                            <span class="amount--value">
                               Osamu Dazai
                            </span>
                            <span class="card-detail">01/01/2024</span>
                        </div>
                        <img src="img/img.jpg" alt="">
                    </div>
                    
                </div>

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Crime e Castigo</span>
                            <span class="amount--value">
                                Fiodor Dostoiévsk
                            </span>
                            <span class="card-detail">01/04/2024</span>
                        </div>
                        <img src="img/img2.jpg" alt="">
                    </div>
                </div>

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Orgulho e Preconceito</span>
                            <span class="amount--value">
                               Jane Austen
                            </span>
                            <span class="card-detail">31/01/2024</span>
                        </div>
                        <img src="img/img3.jpg" alt="">
                    </div>
                </div>

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                O Castelo Animado</span>
                            <span class="amount--value">
                               Diane W. Jhonson
                            </span>
                            <span class="card-detail">24/06/2024</span>
                        </div>
                        <img src="img/img4.jpg" alt="">
                    </div>
                </div>
                <i class="fa-solid fa-arrow-right icon"></i>
            </div>
        </div>


        <div class="tabular--wrapper">
            <h3 class="main-title">Comunity</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Genre</th>
                            <th>Date</th>
                            <th>Nivel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $nivel_acesso = $row['nivel_acesso'] == 1 ? 'Adminstrador' : 'Cliente';
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['genre'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $nivel_acesso . "</td>";
                            echo "<td>
                      </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
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
    <link rel="stylesheet" href="admin.css" />
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
            <h1 class="main--title">Premium Plains</h1>
            <div class="card--wrapper">

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Receber o livrp físico</span>
                            <span class="amount--value">
                                $50.00
                            </span>
                        </div>
                        <i class="fa-solid fa-book icon"></i>
                    </div>
                    <span class="card-detail"> **** **** **** 2431</span>
                </div>

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Mais créditos de páginas</span>
                            <span class="amount--value">
                                $20.00
                            </span>
                        </div>
                        <i class="fa-solid fa-book-open icon"></i>
                    </div>
                    <span class="card-detail"> **** **** **** 3124</span>
                </div>

                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Receber a versão para Kindle</span>
                            <span class="amount--value">
                                $35.00
                            </span>
                        </div>
                        <i class="fa-solid fa-book-atlas icon"></i>
                    </div>
                    <span class="card-detail"> **** **** **** 1703</span>
                </div>


                <div class="payment--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Mais Fontes</span>
                            <span class="amount--value">
                                $15.00
                            </span>
                        </div>
                        <i class="fa-solid fa-file-word icon"></i>
                    </div>
                    <span class="card-detail"> **** **** **** 0106 </span>
                </div>



            </div>
        </div>


        <div class="tabular--wrapper">
            <h3 class="main-title">Finance Data</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Genre</th>
                            <th>Date</th>
                            <th>NIvel</th>
                            <th>Action</th>
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
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['genre'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $nivel_acesso . "</td>";
                            echo "<td>
                          <button class='button'>
                              <a href='edit.php?id=$row[id]'>Edit</a>
                          </button>
                          <button class='button'>
                              <a href='delete.php?id=$row[id]'>Delete</a>
                          </button>
                      </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        
            <button class="button">
                <a href="add.php">add</a>
            </button>
            
            </div>
            </div>
</body>

</html>
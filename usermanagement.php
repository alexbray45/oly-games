<?php

    //include external files needed
    include 'connectionString.php';
    include 'loginhandler.php';


    //to check if the user is logged in 
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

 
// Query to get the list of public users
$stmtUsers = $pdo->query("SELECT * FROM publicuser");
$users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

// Query to get the list of funolympic committee
$stmtCommittee = $pdo->query("SELECT * FROM funolympiccommittee");
$committees = $stmtCommittee->fetchAll(PDO::FETCH_ASSOC);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="css/usermanagement.css">
    <link rel="stylesheet" href="./css/adminarea.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">


    <link rel="icon" href="./assets/funolympic logo_07.png" type="image/x-icon">

</head>
<body>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./assets/logo_03.png" alt="">
            </div>

            <span class="logo_name">FunOlympics Admin Area</span>
        </div>

        <div class="menu-list">
            <ul class="nav-links">
                <li><a href="adminArea.php"><i class="uil uil-estate"></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="usermanagement.php"><i class="uil uil-user"></i><span class="link-name">User Management</span></a></li>
                <li><a href="reports.php"><i class="uil uil-clipboard-alt"></i><span class="link-name">Reports</span></a></li>

            </ul>

            <ul class="logout-mod"><li><a href="logout.php"><i class="uil uil-signout"></i><span class="link-name">Logout</span></a></li>
            </ul>    
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="search here">
            </div>

            <img src="assets/admin_01.png" alt="">
        </div>
        
        <div class="container">
        <h1>Registered Users</h1><br>
        <h2>Public Users</h2>
        <a href="adminArea.php" id=backtodashboard>Back to dashboard</a>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Country</th>
                <th>Email Address</th>
                <th>Sport</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['Name']; ?></td>
                    <td><?php echo $user['Country']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Sport']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

       <br>
       <br>
        <h2>FunOlympic Committee</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>

            </tr>
            <?php foreach ($committees as $committee): ?>
                <tr>
                    <td><?php echo $committee['Firstname']; ?></td>
                    <td><?php echo $committee['Surname']; ?></td>
                    <td><?php echo $committee['Username']; ?></td>
                    </tr>
            <?php endforeach; ?>
        </table>
    </div>

</section>

<script src="./js/adminArea.js"defer></script>

</body>
</html>
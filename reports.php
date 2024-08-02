<?php

    //include external files needed
    include 'connectionString.php';
    include 'loginhandler.php';
    include 'countries.php';


    //to check if the user is logged in 
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

 
// Query to get the list of customers
$stmtUsers = $pdo->query("SELECT * FROM publicuser");
$users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

$stmtSport = $pdo->query("SELECT * FROM sport");
$uniqueSports = $stmtSport->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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
        <form id="filterForm">
                <label for="sportFilter">Filter by Sport:</label>
                <select id="sportFilter" name="sportFilter">
                    <option value="">All</option>
                    <?php foreach ($uniqueSports as $sport): ?>
                        <option value="<?php echo $sport['Sport_Name']; ?>"><?php echo $sport['Sport_Name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Filter</button>
            </form>

            <form id="filterForm2">
                <label for="countryFilter">Filter by Country:</label>
                <select id="countryFilter" name="countryFilter">
                    <option value="">All</option>
                    <?php foreach ($countries as $country): ?>
                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Filter</button>
            </form>

        <table id="reportdata">
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
       
        </div>

</section>
    <script src="./js/script.js"></script>
    <script src="./js/adminArea.js" defer></script>

</body>
</html>
<?php
  
    //include external files needed
    include 'connectionString.php';
    include 'loginhandler.php';


    //to check if the user is logged in 
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
//Get the total number of users registered
$sql = "SELECT COUNT(sport) AS total_sports FROM publicuser";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$sporting=$row['total_sports'];

// Get the maximum count of any sport
$sql_max_count = "SELECT COUNT(*) AS count
                  FROM publicuser
                  GROUP BY Sport
                  ORDER BY count DESC
                  LIMIT 1";
$stmt_max_count = $pdo->prepare($sql_max_count);
$stmt_max_count->execute();
$row_max_count = $stmt_max_count->fetch(PDO::FETCH_ASSOC);
$max_count = $row_max_count['count'];

// Get all sports that have this maximum count
$sql_sports = "SELECT Sport
               FROM publicuser
               GROUP BY Sport
               HAVING COUNT(*) = :max_count";
$stmt_sports = $pdo->prepare($sql_sports);
$stmt_sports->bindParam(':max_count', $max_count, PDO::PARAM_INT);
$stmt_sports->execute();
$sports_with_max_count = $stmt_sports->fetchAll(PDO::FETCH_ASSOC);

// Prepare the sports for display
$sports_list = [];
foreach ($sports_with_max_count as $sport) {
    $sports_list[] = $sport['Sport'];
}
$sports_display = implode(', ', $sports_list);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" href="./css/adminarea.css">
    <link rel="icon" href="./assets/funolympic logo_07.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
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
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-dashboard"></i><span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Registrations</span>
                        <?php echo "<span class='number'>$sporting</span>";?>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-trophy"></i>
                        <span class="text">Most Interested Sport</span>
                        <?php echo "<span class='number'>$sports_display</span>";?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/adminArea.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="icon" href="./assets/funolympic logo_07.png" type="image/x-icon">

    <title>Login</title>
</head>
<body>
    <header>
        <h1>FunOlympic Admin Area</h1>

    </header>

    <div class="container">
        <div class="form-box"> 
            <h1>Login</h1>
            <form action="loginhandler.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <input type="text" name="username" placeholder="@username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" placeholder="password" required>
                    <label>Password</label>
                </div>
                <div class="btn-field">
                    <input type="submit" name="btnlogin" id="btnlogin" value="Login"/>
                </div>
    
            </form>
        </div>
    </div>


    <!-- Javascript -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

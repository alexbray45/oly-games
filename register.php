<?php
include 'connectionString.php';

IF ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fullname"];
    $country = $_POST["country"];
    $emailaddress = $_POST["emailaddress"];
    $sport = $_POST["sport"];

 
    try {
        require_once "connectionString.php";
 
        // Insert user into users table
        $query = "INSERT INTO publicuser (Name, Country, Email, Sport) VALUES (:fullname, :country, :emailaddress, :sport)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":emailaddress", $emailaddress);
        $stmt->bindParam(":sport", $sport);
        $stmt->execute();

 
        $pdo = null;
        $stmt = null;
       
        echo '<script>alert("Sign up successful. Thank You for Signing Up."); window.location = "index.php";</script>';
        exit(); // Prevent further execution
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>
    <link rel="stylesheet" href="registerForm.css" />

</head>
<body>
    <section class="container">
        <header> Sign Up</header>
        <form action="" class="form" method="post">
            <div class="input-box">
                <label> Full Name</label>
                <input type="text" name="fullname" placeholder="Enter full name" required>
            </div>

            <div class="input-box">
                <label>Country</label>
                <input type="text" name="country" placeholder="Enter country">
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="text" name="emailaddress" placeholder="Enter email address"required>
            </div>

            <div class="select-box">
                <select name="sport">
                    <option hidden>Sports</option>
                        <option value="Aquatics">Aquatics</option>
                        <option value="Archery">Archery</option>
                        <option value="Athletics">Athletics</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Baseball">Baseball</option>
                        <option value="Boxing">Boxing</option>
                        <option value="Canoeing">Canoeing</option>
                        <option value="Equestrian">Equestrian</option>
                        <option value="Fencing">Fencing</option>
                        <option value="Football">Football</option>
                        <option value="Gymnastics">Gymnastics</option>
                        <option value="Handball">Handball</option>
                        <option value="Hockey">Hockey</option>
                        <option value="Judo">Judo</option>
                        <option value="Modern Pentathlon">Modern Pentathlon</option>
                        <option value="Rowing">Rowing</option>
                        <option value="Sailing">Sailing</option>
                        <option value="Shooting">Shooting</option>
                        <option value="Table Tennis">Table Tennis</option>
                        <option value="Taekwondo">Taekwondo</option>
                        <option value="Tennis">Tennis</option>
                        <option value="Triathlon">Triathlon</option>
                        <option value="Volleyball">Volleyball</option>
                        <option value="Weightlifting">Weightlifting</option>
                        <option value="Wrestling">Wrestling</option>
            
                    
                </select>
            </div>

           <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </section>
</body>
</html>
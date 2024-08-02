<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunOlympic Form</title>
</head>
<body>
    <h2>FunOlympic Committee Form</h2>
    <form action="" method="POST">
        <input type="text" name="firstname" placeholder=" firstname"/>
        <br>
        <input type="text" name="lastname" placeholder=" lastname"/>
        <br>
        <input type="text" name="username" placeholder=" username"/>
        <br>
        <input type="password" name="password"placeholder="password"/>
        <br>
        <input type="submit" name="submit" value="Submit" class="btn">

    </form>

    <?php
include 'conn.php';
if(isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encpassword = md5 ($password);

    $query = "INSERT INTO funolympiccommittee (Firstname, Surname, Username, Password) VALUES ('$firstname', '$lastname', '$username', '$encpassword');";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo 'success';

    }   
    else
    {
        echo 'not success';
    }
}

?>
    


</body>
</html>

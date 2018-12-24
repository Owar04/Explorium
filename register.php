<!DOCTYPE html>
<html>
    <body>       
        <form action='register.php' method="post">
        <label>Username:</label><br>
        <input name="Username" type="text"><br>
        <label>Password:</label><br>
        <input name="password" type="password"><br>
        <label>Email: </label><br>
        <input name="email" type="text"><br><br>
        <input type="submit">
        </form>
        </body>    
</html>

<?php
$servername = "localhost";     
$username = "root";     
$dbpassword = "";     
$db = "prueba";   

$password = $_POST['password'];
$CriptedPassword = password_hash($password, PASSWORD_BCRYPT); 
$connection = mysqli_connect($servername, $username, $dbpassword, $db);

if ($connection->connect_error) {
    die ("Connection fail!: " . $connection->connect_error);
}

$AvaibleUser = "SELECT * FROM `users` WHERE username = '$_POST[Username]' ";
$result = $connection->query($AvaibleUser);
$count = mysqli_num_rows($result);

if ($count > 1) {
echo "<br>This username has already been choosen<be>";}
else{
    $query = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$_POST[Username]','$_POST[email]','$CriptedPassword')";
    if ($connection->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Registered succesfuly!" . "</h2>";
 echo "<h4>" . "Welcome: " . $_POST['Username'] . "</h4>" . "\n\n";
 }

 else {
 echo "Error creating user." . $query . "<br>" . $connection->error; 
   }
 }
 mysqli_close($connection);
?>



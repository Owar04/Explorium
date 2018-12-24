<!DOCTYPE html>
<html>
    <body>       
        <form action='register.php' method="post">
        <label>Username:</label><br>
        <input name="usernamename" type="text"><br>
        <label>Password:</label><br>
        <input name="password" type="password"><br>
        <label>Email: </label><br>
        <input name="email" type="text"><br><br>
        <input type="submit">
        </form>
        </body>    
</html>

<?php
$servername = "localhost";      /* Dont touch */
$username = "root";     /* username of database */
$dbpassword = "";     /* database password */
$db = "prueba";   /* database */

$password = $_POST['password'];
$CriptedPassword = password_hash($password, PASSWORD_BCRYPT); 
$connection = mysqli_connect($servername, $username, $dbpassword, $db);

if ($connection->connect_error) {
    die ("Connection fail!: " . $connection->connect_error);
}

$AvaibleUser = "SELECT * FROM `users` WHERE username = '$_POST[username]' ";
$result = $conexion->query($AvaibleUser);
$count = mysqli_num_rows($result);

if ($count = 1) {
echo "<br>This username has already been choosen<be>";}
else{
    $query = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$_POST[username]','$_POST[email]','$CriptedPassword')";
    if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Welcome: " . $_POST['username'] . "</h4>" . "\n\n";
 }

 else {
 echo "Error creating user." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>



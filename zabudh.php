<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }
    if(isset($_POST['poslat'])) {
        $username = $_POST['username'];
        $sql = "SELECT password FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            if ($row["password"] != null){
                echo "Tvoje heslo je: " . $row["password"];
            } else {
                echo "Neexistuje uživatel s tímto menom";
            }
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <button type="submit" name="poslat">Poslať heslo</button>
        <a href="registracia.php">Registruj sa</a>
        <a href="index.php">Prihlásiť sa</a>
    </form>
</body>
</html>
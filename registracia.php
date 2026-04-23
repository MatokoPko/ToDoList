<?php
    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }
    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passcheck = $_POST['passcheck'];
        $sql = "INSERT INTO user(username, password) VALUES ('$username', '$password')";
        if($password == $passcheck){
            $result = mysqli_query($conn, $sql);
            header("Location: index.php");
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
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="passcheck" placeholder="Password znovu" required>
        <button type="submit" name="register">Registruj Sa</button>
        <br>
        <a href="index.php">Prihlásiť sa</a><br>
        <a href="zabudh.php">Zabudol som heslo</a>
    </form>
</body>
</html>

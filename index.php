<?php
    session_start();

    $_SESSION["user"] = null;

    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }
    
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            if ($row["username"] == $username && $password == $row["password"]){
                $_SESSION["user"] = $row["user_ID"];
                header("Location: main.php");
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
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Prihlásiť sa</button><br>
        <a href="registracia.php">Registruj sa</a><br>
        <a href="zabudh.php">Zabudol som heslo</a>
    </form>
</body>
</html>
</html>
</html>
<?php
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
                setcookie("logged", 1, time() + 3600);
                $_COOKIE["logged"] = 1;
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
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Prihlásiť sa</button>
        <a href="#">Registruj sa</a>
        <a href="#">Zabudol som heslo</a>
    </form>
</body>
<?php
    if (isset($_COOKIE['logged']) && $_COOKIE['logged'] == 1) {
        echo "Používateľ je prihlásený";
    } else {
        echo "Používateľ není prihlásený";
    }
?>
</html>
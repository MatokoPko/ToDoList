<?php
    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }
    if(isset($_POST['zmenit'])) {
        $username = $_POST['username'];
        $spassword = $_POST['spassword'];
        $npassword = $_POST['npassword'];
        $npasscheck = $_POST['npasscheck'];
        if ($npassword == $npasscheck){
            $sql = "SELECT password FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                if ($row["password"] == $spassword){
                    $sql = "UPDATE user SET password='$npassword' WHERE username='$username'";
                    mysqli_query($conn, $sql);
                    header("Location: index.php");
                }
            }
        } else {
            echo "NovĂ© heslo se neshoduje";
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
        <input type="password" name="spassword" placeholder="Staré heslo" required>
        <input type="password" name="npassword" placeholder="Nové heslo" required>
        <input type="password" name="npasscheck" placeholder="Nové heslo znovu" required>
        <button type="submit" name="zmenit">Zmeniť heslo</button><br>
        <a href="index.php">Prihlásiť sa</a><br>
        <a href="zabudh.php">Zabudol som heslo</a>
    </form>
</body>
</html>

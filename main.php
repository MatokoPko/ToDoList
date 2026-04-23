<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }

    if(isset($_POST['pridat'])) {
        $user_ID = $_SESSION["user"];
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis'];
        $datum = $_POST['datum'];
        $sql = "INSERT INTO tasks (user_ID, nazov, popis, datum) VALUES ('$user_ID', '$nazov', '$popis', '$datum')";
        mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="display: flex; justify-self: center;">Vitaj v ToDo liste</h1>
    <h2>Pridať úlohu</h2>
    <form method="post">
        <input type="text" name="nazov" placeholder="Názov úlohy" required><br>
        <textarea name="popis" placeholder="Popis úlohy" required></textarea><br>
        <input type="date" name="datum" required><br>
        <input type="submit" name="pridat" value="Pridať úlohu">
    </form>
</body>
</html> 
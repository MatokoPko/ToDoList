<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "root", "stranka");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }

    if(isset($_POST['pridat'])) {
        $user_ID = $_SESSION["user"];
        $nazov = $_POST['pnazov'];
        $popis = $_POST['ppopis'];
        $datum = $_POST['pdatum'];
        $sql = "INSERT INTO tasks (user_ID, nazov, popis, datum) VALUES ('$user_ID', '$nazov', '$popis', '$datum')";
        mysqli_query($conn, $sql);
    }

    if(isset($_POST['zmenit'])) {
        $task_ID = $_POST['ztask_ID'];
        $zmeny = array();
        if (!empty($_POST['znazov'])){
            $zmeny[] = "nazov='" . $_POST["znazov"]. "'";
        }
        if (!empty($_POST['zpopis'])){
            $zmeny[] = "popis='" . $_POST["zpopis"]. "'";
        }
        if (!empty($_POST['zdatum'])){
            $zmeny[] = "datum='" . $_POST["zdatum"]. "'";
        }
        $sql = "UPDATE tasks SET " . implode(", ", $zmeny) . " WHERE task_ID='$task_ID'";
        mysqli_query($conn, $sql);
    }

    if(isset($_POST['vymazat'])) {
        $task_ID = $_POST['vtask_ID'];
        $sql = "DELETE FROM tasks WHERE task_ID='$task_ID'";
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
    
    <a href="index.php">Odhlásiť sa</a><br>
    <a href="zmenith.php">Zmeniť heslo</a><br>
    <h1 style="display: flex; justify-self: center;">Vitaj v ToDo liste</h1>
    <div style="display: flex; flex-direction: row; align-items: top; width: 100%; justify-content: space-around;">
        <div>
            <h2>Pridať úlohu</h2>
            <form method="post">
                <input type="text" name="pnazov" placeholder="Názov úlohy" required><br>
                <textarea name="ppopis" placeholder="Popis úlohy" required></textarea><br>
                <input type="date" name="pdatum" required><br>
                <input type="submit" name="pridat" value="Pridať úlohu">
            </form>
        </div>
        <div style="width: 33%;">
            <h2>Moje úlohy</h2>
            <?php
                $user_ID = $_SESSION["user"];
                $sql = "SELECT * FROM tasks WHERE user_ID = '$user_ID'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<div style='border: 1px solid black; margin: 10px; padding: 10px;'>";
                    echo "<h3>task_ID: " . $row["task_ID"] . "</h3>";
                    echo "<h3>Názov: " . $row["nazov"] . "</h3>";
                    echo "<p>Popis: " . $row["popis"] . "</p>";
                    echo "<p>Datum: " . $row["datum"] . "</p>";
                    echo "</div>";
                }
            ?>
        </div>
        <div>
            <h2>Úprava úloh</h2>
            <div style="width:justify-content: space-between; display: flex; flex-direction: row;">
                <div>
                    <h3>Zmena úlohy</h3>
                    <form method="post">
                        <input type="text" name="ztask_ID" placeholder="ID úlohy" required><br>
                        <input type="text" name="znazov" placeholder="Názov úlohy"><br>
                        <textarea name="zpopis" placeholder="Popis úlohy"></textarea><br>
                        <input type="date" name="zdatum"><br>
                        <input type="submit" name="zmenit" value="Zmeniť úlohu">
                    </form>
                </div>
                <div>
                    <h3>Vymazanie úlohy</h3>
                    <form method="post">
                        <input type="text" name="vtask_ID" placeholder="ID úlohy" required><br>
                        <input type="submit" name="vymazat" value="Vymazať úlohu">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
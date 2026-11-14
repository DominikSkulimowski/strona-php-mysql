<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <h2>Dodaj osobę</h2>

    <form action="" method="POST">
        <label for="imie">imię:</label>
        <input type="text" name="imie" id="imie">
        <br>
        <label for="nazwisko">nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko">
        <br>
        
        <input type="submit" name="dodaj" value="Dodaj do bazy">
        <input type="submit" name="usun" value="Usuń z bazy">
        <br>
        <input type="submit" name="pokaz" value="Pokaż osoby">
    </form>
    </div>
</body>
<?php
    include("polaczenie.php");
    
    if(isset($_POST['dodaj'])) {
        if(trim($_POST['imie']) != "" && trim($_POST['nazwisko']) != "") {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];

        mysqli_query($polaczenie, "INSERT INTO osoby (imie, nazwisko) VALUES ('$imie','$nazwisko')");
        
        echo "<p class='komunikat'>Dodano osobę do bazy</p>";
        }
        else {
            echo "<p class='komunikat'>Wypełnij imię i nazwisko</p>";
        }
    }

    if(isset($_POST['usun'])) {
        mysqli_query($polaczenie, "DELETE FROM osoby ORDER BY id DESC LIMIT 1");
        if(mysqli_affected_rows($polaczenie) > 0) {
            echo "<p class='komunikat'>Usunięto ostatnią osobę z bazy</p>";
        }
        else {
            echo "<p class='komunikat'>Baza jest pusta";
        }
    }

    if(isset($_POST['pokaz'])) {
        $wynik = mysqli_query($polaczenie, "SELECT * FROM osoby");
        if(mysqli_affected_rows($polaczenie) > 0) {

    echo "<table>";
    echo "<tr><th>ID</th><th>imię</th><th>nazwisko</th></tr>";
    while($wiersz = mysqli_fetch_array($wynik)) {
        echo "<tr>";
        echo "<td>" . $wiersz['id'] . "</td>";
        echo "<td>" . $wiersz['imie'] . "</td>";
        echo "<td>" . $wiersz['nazwisko'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    }
    else {
        echo "<p class='komunikat'>Brak osób w bazie</p>";
    }
}
?>
</html>
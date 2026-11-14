<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <h2>Dodaj osobę</h2>

    <form action="" method="POST">
        <label for="imie">imię:</label>
        <input type="text" id="imie">
        <br>
        <label for="nazwisko">nazwisko:</label>
        <input type="text" id="nazwisko">
        <br>
        
        <input type="submit" name="dodaj" value="Dodaj do bazy">
        <input type="submit" name="pokaz" value="Pokaż osoby">
    </form>
</body>
<?php
    inclue("polaczenie.php");
    
    if(isset($_POST['dodaj'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];

        mysqli_query($polaczene, "INSERT INTO osoby (imie, nazwisko) values('imie','nazwisko')");
    }
?>
</html>
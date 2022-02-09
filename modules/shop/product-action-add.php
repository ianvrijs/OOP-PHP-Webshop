<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['id'] != 2)
{
    header("Location: index.php");
}

$sHtml = '
<form action="" method="POST">
<input type="text" name="naam" placeholder="naam product*" required>
<input type="text" name="beschrijving" placeholder="beschrijving product*" required>
<input type="url" name="foto" placeholder="url foto*" required>
<input type="number" name="voorraad" placeholder="in stock*" required>
<input type="number" name="prijs" placeholder="prijs*" required>
<input type="submit">
</form>';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $foto = $_POST['foto'];
    $voorraad = $_POST['voorraad'];
    $prijs = $_POST['prijs'];

    // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('John', 'Doe', 'john@example.com')";

    $sql2 = "INSERT INTO producten (naam, beschrijving, foto, voorraad, prijs)
    VALUES ('" . database::escape_SQL($naam) . "', '" . database::escape_SQL($beschrijving) . "', '$foto', $voorraad, $prijs)";

    if (database::$oConnection->query($sql2) === TRUE) {
        echo "Producten succesvol toegevoegd.";
    } 
    else 
    {
        echo "Error: " . $sql2 . "<br>" . database::$oConnection->error;
    }
}

return $sHtml;


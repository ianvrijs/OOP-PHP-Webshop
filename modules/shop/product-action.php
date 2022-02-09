<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $foto = $_POST['foto'];
    $voorraad = $_POST['voorraad'];
    $prijs = $_POST['prijs'];
    }


$sql = "UPDATE `producten`
        SET
        `naam` = '" . database::escape_SQL($naam) . "',
        `beschrijving` = '" . database::escape_SQL($beschrijving) . "',
        `foto` = '" . database::escape_SQL($foto) . "',
        `voorraad` = '" . database::escape_SQL($voorraad) . "',
        `prijs` = '" . database::escape_SQL($prijs) . "' 
        WHERE (`id` = '" . $id . "');";
if (database::execute($sql)) {
  echo "product updated successfully";
}

?>
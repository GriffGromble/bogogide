<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];
    $sql = "INSERT INTO bøger (bogNavn, bogForfatter, bogPris, bogBeskrivelse) VALUES (:bogNavn, :bogForfatter, :bogPris, :bogBeskrivelse)";

    $bind = [
        ":bogNavn" => $data["bogNavn"],
        ":bogForfatter" => $data["bogForfatter"],
        ":bogPris" => $data["bogPris"],
        ":bogBeskrivelse" => $data["bogBeskrivelse"]
    ];

    $db->sql($sql, $bind, false);

    echo "produktet er nu indsat. <a href='insert.php'>indsæt et produkt mere.</a>";
    exit;
}


?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container">
    <form action="insert.php" method="post">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="bogNavn" class="form-label">Bog navn:</label>
                <input type="text" class="form-control" id="bogNavn" name="data[bogNavn]" placeholder="Bog navn">
            </div>
            <div class="col-12 col-md-6">
                <label for="bogPris" class="form-label">Bog Pris:</label>
                <input type="Number" step="0.01" class="form-control" id="bogPris" name="data[bogPris]" placeholder="Bog Pris">
            </div>
  <div class="col-12 col-md-6">
                <label for="bogBeskrivelse" class="form-label">Bog Beskrivelse:</label>
      <textarea class="form-control" id="bogBeskrivelse" name="data[bogBeskrivelse]" placeholder="Bog Beskrivelse"> </textarea>
            </div>

            <div class="col-12">
                <label for="bogForfatter" class="form-label">bog Forfatter:</label>
                <input type="text" class="form-control" id="bogForfatter" name="data[bogForfatter]" placeholder="Bog Forfatter">
            </div>
            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-primary w-100">
                    send data
                </button>
            </div>

        </div>
    </form>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KM_Feldolgozo1</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "<h2>HTML űrlap </h2>";

    // űrlapadatok beolvasása 
    $_nev = htmalspecialchars(trim($_POST["nev"] ?? ""));
    $pin = htmalspecialchars (trim($_POST["pin"]?? ""));
    $fav_fruit =htmalspecialchars (trim($_POST["fav_fruit"]?? "Nincs megadva"));
    $age = htmalspecialchars(trim($_POST["age"]?? "Nincs megadva"));
    $feet_size = htmalspecialchars(trim($_POST["feet_size"]?? "Nincs megadva"));
    $confidence = htmalspecialchars(trim($_POST["confidence"]?? "Nincs megadva"))
    }
    // Egyszerű validáció szerveroldalon
    $hibák = [];
    if (!preg_match("/^[A-ZÁÉIÓŐOÖUÜŰa-záéíóőouüű ] {4,}$/u",$_nev)){
        $hibák[] = "A név formátuma hibás";
    }
    if (!preg_match("/^[0-9]{4,}$/u"))
        $hibák[] = "hibás"
    //HIbák megjelenítése vagy adatok kiíratása 
    if (count($hibák) > 0 ) {
        echo "<div class = 'error'><p><strong>Hiba:</strong></p><ul>";
        foreach ($hibák as $hibák) {
            echo "<li>$hiba</li>";
        }
        echo "</ul></div>";
    } else{
        // Adatok táblázatos megjelenítése 
        echo "<table>";
            echo "<tr><td>Név:</td><td>$nev</td></tr>"
            echo "<tr><td>PIN:</td><td>$pin</td></tr>"
            echo "<tr><td>Kedvenc gyümölcs:</td><td>$fav_fruit</td></tr>"
            echo "<tr><td>AGE:</td><td>$age</td></tr>"
            echo "<tr><td>Lábméret:</td><td>$feet_size</td></tr>"
            echo "<tr><td>Önbizalom:</td><td>$confidence</td></tr>"
        echo "</table>";
        //fajlba mentés 
        $sor = date ("Y-m-d H:i:s") . " | " . 
                "Név: $nev | " .
                "PIN $pin | " . 
                "Kedvenc gyümölcs: $fav_fruit | " . 
                "Életkor: $age | " . 
                "Lábméret: $feet_size | " . 
                "önbizalom: $confidence" . php_eol;

        $fajl = "KM_adatok.txt";

        if (file_put_contents($fajl, $sor, FILE_APPEND | LOCK_EX)) {
            echo "<p class = 'success'> ✅AZ adatok sikeresen elmentve a <strong>$fajl</strong> fájlba.</p>";
        }
        else {
            echo "<p class = 'error'> ❌ HIba történt az adatok mentésénél "
        }
    }
</body>
</html>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        
        <title>Feldolgozó</title>
    </head>
    <body>
        <?php
        if (isset($_POST))
        {
            echo "<h2>HTML űrlap<h2>";
            $név = $_POST["név"];
            $pin = $_POST["pin"];
            $fav_fruit = $_POST["fav_fruit"];
            $age = $_POST["age"];
            $feet_size = $_POST["feet_size"];
            $confidence = $_POST["confidence"];

            echo "<p>strong>Név:</strong>" . $név . "</p>";
            echo "<p>strong>PIN:</strong>" . $pin . "</p>";
            echo "<p>strong>Kedvenc gyümi:</strong>" . $fav_fruit . "</p>";
            echo "<p>strong>Lábméret:</strong>" . $feet_size . "</p>";
            echo "<p>strong>Önbizalom:</strong>" . $confidence . "</p>";
        } else {
            echo "<h2><strong>Ürlap nem lett beküldve!!</strong><h2>";

        }
        ?>
        <a href="JDHOK9_urlap.html"> <strong>Vissza az ürlapra.</strong></a>
        
    </body>
</html>
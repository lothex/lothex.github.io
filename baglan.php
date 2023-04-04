<?php
    // Veritabanı bağlantısını yap
    $mysqli = new mysqli("localhost", "teknik", "teknik", "teknik");

    // Veritabanı bağlantısı kontrolü
    if ($mysqli->connect_error) {
        die("Veritabanına bağlanırken bir hata oluştu: " . $mysqli->connect_error);
    }

    // Sorgu yap
    $sorgu = "SELECT * FROM musteriler";
    $sonuc = $mysqli->query($sorgu);

    // Sonuçları göster
    if ($sonuc->num_rows > 0) {
        echo "<table>";
        while ($satir = $sonuc->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $satir['adsoyad'] . "</td>";
            echo "<td>" . $satir['telefon'] . "</td>";
            echo "<td>" . $satir['marka'] . "</td>";
            echo "<td>" . $satir['model'] . "</td>";
            echo "<td>" . $satir['ariza'] . "</td>";
            echo "<td>" . $satir['ucret'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Hiç kayıt yok.";
    }
?>

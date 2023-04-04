<?php
    $servername = "localhost";
    $username = "kullanici_adi";
    $password = "sifre";
    $dbname = "veritabani_adi";
    
    // mysqli bağlantısı oluşturma
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    
    // Bağlantı kontrolü
    if ($mysqli->connect_error) {
      die("Bağlantı hatası: " . $mysqli->connect_error);
    }    

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

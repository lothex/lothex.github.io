<?php
// Veritabanı bilgileri
$servername = "localhost";
$username = "teknik";
$password = "teknik";
$dbname = "teknik";

// MySQL bağlantısı oluşturma
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Bağlantı hatası kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

// POST verilerini al
$adsoyad = $_POST['adsoyad'];
$telefon = $_POST['telefon'];
$marka = $_POST['marka'];
$model = isset($_POST['model']) ? $_POST['model'] : '';
$selectedArizalar = $_POST['ariza'];
$arizaString = implode(',', $selectedArizalar);
$ucret = $_POST['ucret'];

// SQL sorgusu
$sql = "INSERT INTO musteriler (adsoyad, telefon, marka, model, ariza, ucret) VALUES ('$adsoyad', '$telefon', '$marka', '$model', '$arizaString', '$ucret')";

// Sorguyu çalıştır ve sonucu kontrol et
if (mysqli_query($conn, $sql)) {
    echo "Kayıt başarıyla eklendi.";

// 5 saniye sonra ana sayfaya yönlendirme
header("refresh:5; url=kayit.html");

} else {
    echo "Hata: " . mysqli_error($conn);
}


// MySQL bağlantısını kapat
mysqli_close($conn);
?>


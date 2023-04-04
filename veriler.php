<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kayıtlı Veriler</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .back-btn {
      display: block;
      text-align: center;
      margin-bottom: 20px;
    }
    .back-btn a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .back-btn a:hover {
      background-color: #0062cc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Kayıtlı Veriler</h1>
    <div class="back-btn">
      <a href="kayit.html">Anasayfa</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Ad Soyad</th>
          <th>Telefon Numarası</th>
          <th>Marka</th>
          <th>Model</th>
          <th>Arızalar</th>
          <th>Ücret</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'baglan.php';
          $sorgu = mysqli_query(@$baglan, "SELECT * FROM musteriler");
          $i = 1;
          while($sonuc = mysqli_fetch_assoc($sorgu)) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $sonuc['adsoyad'] . "</td>";
            echo "<td>" . substr($sonuc['telefon'], 0, 3) . "-" . substr($sonuc['telefon'], 3, 3) . "-" . substr($sonuc['telefon'], 6, 4) . "</td>";
            echo "<td>" . $sonuc['marka'] . "</td>";
            echo "<td>" . $sonuc['model'] . "</td>";
            echo "<td>" . $sonuc['ariza'] . "</td>";
            echo "<td>" . $sonuc['ucret'] . " TL" . "</td>";
            echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            
            // Veritabanı bağlantısını kapatalım
            
            mysqli_close($baglanti);
            ?>
            
            </div>
            </body>
            </html>

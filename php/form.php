<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişi İşlemleri</title>
</head>
<body>
    <h1>Kişi Tablosu İşlemleri</h1>

    <!-- 1. Form: Yeni Kişi Ekleme -->
    <form action="" method="POST">
        <h3>Yeni Kişi Ekle</h3>
        <label>Ad: </label>
        <input type="text" name="ad" required><br><br>
        <label>Soyad: </label>
        <input type="text" name="soyad" required><br><br>
        <label>Email: </label>
        <input type="email" name="email" required><br><br>
        <button type="submit" name="ekle">Ekle</button>
    </form>
    <br><hr><br>

    <!-- 2. Form: Kişi Bulma -->
    <form action="" method="POST">
        <h3>Kişi Bul</h3>
        <label>Ad: </label>
        <input type="text" name="bul_ad" required>
        <button type="submit" name="bul">Bul</button>
    </form>

    <?php
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root"; // Varsayılan kullanıcı
    $password = ""; // Varsayılan şifre
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantı kontrolü
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // 1. Form işlemleri: Yeni kişi ekleme
    if (isset($_POST['ekle'])) {
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $email = $_POST['email'];

        $sql = "INSERT INTO kisi (ad, soyad, email) VALUES ('$ad', '$soyad', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Yeni kişi başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red;'>Hata: " . $conn->error . "</p>";
        }
    }

    // 2. Form işlemleri: Kişi bulma
    if (isset($_POST['bul'])) {
        $bul_ad = $_POST['bul_ad'];
        $sql = "SELECT soyad, email FROM kisi WHERE ad = '$bul_ad'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Bulunan Kişi:</strong> Soyad: " . $row['soyad'] . ", Email: " . $row['email'] . "</p>";
            }
        } else {
            echo "<p style='color: red;'>Bu ada sahip bir kişi bulunamadı.</p>";
        }
    }

    // Bağlantıyı kapat
    $conn->close();
    ?>
</body>
</html>

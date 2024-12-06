<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Veritabanı İşlemleri</title>
</head>
<body>
    <h2>Kişi Tablosu İşlemleri</h2>

    <!-- 1. Form: Kişi Bilgisi Ekle -->
    <h3>1. Form: Kişi Bilgisi Ekle</h3>
    <form method="post">
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" required>
        <br><br>
        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- 2. Form: Kişi Bilgisi Bul -->
    <h3>2. Form: Kişi Bilgisi Bul</h3>
    <form method="post">
        <label for="arama_ad">Ad Ara:</label>
        <input type="text" id="arama_ad" name="arama_ad" required>
        <br><br>
        <button type="submit" name="bul">Bul</button>
    </form>

    <h3>Sonuç:</h3>
    <p>
        <?php
        // Veritabanı bağlantısı
        $servername = "localhost";
        $username = "root"; // Veritabanı kullanıcı adı
        $password = ""; // Veritabanı şifresi
        $dbname = "test"; // Veritabanı adı

        // Bağlantıyı oluştur
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol et
        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        // 1. Formdan gelen veriyi ekle
        if (isset($_POST['ekle'])) {
            $ad = $_POST['ad'];
            $soyad = $_POST['soyad'];
            $email = $_POST['email'];

            // Veriyi ekle
            $sql = "INSERT INTO kisi (ad, soyad, email) VALUES ('$ad', '$soyad', '$email')";
            if ($conn->query($sql) === TRUE) {
                echo "Kişi başarıyla eklendi!";
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }
        }

        // 2. Formdan gelen aramayı yap
        if (isset($_POST['bul'])) {
            $arama_ad = $_POST['arama_ad'];

            // Adı veritabanında ara
            $sql = "SELECT soyad, email FROM kisi WHERE ad = '$arama_ad'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Sonuçları ekrana yaz
                while ($row = $result->fetch_assoc()) {
                    echo "Soyad: " . $row['soyad'] . "<br>";
                    echo "Email: " . $row['email'] . "<br>";
                }
            } else {
                echo "Kişi bulunamadı.";
            }
        }

        // Bağlantıyı kapat
        $conn->close();
        ?>
    </p>
</body>
</html>

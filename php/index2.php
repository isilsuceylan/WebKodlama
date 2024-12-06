<!DOCTYPE html>
<html lang="tr">
<head>
    <title>PHP Görevler</title>
</head>
<body>
    <h2>PHP Görevler</h2>
    
    <form method="post">
        <label for="message">Mesaj Yaz:</label>
        <input type="text" id="message" name="message" placeholder="Mesajınızı yazınız">
        <br><br>
        <button type="submit" name="save">1. Mesajı Kaydet</button>
        <button type="submit" name="clear">2. Dosyayı Temizle</button>
        <button type="submit" name="random">3. Rastgele Satır Göster</button>
    </form>

    <h3>çıktı:</h3>
    <p>
        <?php
        $filename = "mesajlar.txt";
        if (isset($_POST['save'])) {
            $message = $_POST['message'];
            if (!empty($message)) {
                // girilen mesajı alt alta eklemek için
                file_put_contents($filename, $message . PHP_EOL, FILE_APPEND);
                echo "mesaj kaydedildi: $message";
            } else {
                echo "lütfen bir mesaj yazınız.";
            }
        }

        // buton 2
        if (isset($_POST['clear'])) {
            file_put_contents($filename, ""); //temizlemek için
            echo "içerik temizlendi";
        }

        // buton 3 rastgele text getirme
        if (isset($_POST['random'])) {
            if (file_exists($filename) && filesize($filename) > 0) {
                $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $randomLine = $lines[array_rand($lines)];
                echo "rastgele satır: $randomLine";
            } else {
                echo "dosyada içerik yok.";
            }
        }
        ?>
    </p>

    <h3>yazılan tüm textler </h3>
    <p>
        <?php
        // rastgele ekranda gösterme
        if (file_exists($filename) && filesize($filename) > 0) {
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                echo htmlspecialchars($line) . "<br>";
            }
        } else {
            echo "henüz bir mesaj bulunmamaktadır.";
        }
        ?>
    </p>
</body>
</html>

<?php
$servername = "localhost";
$username = "root"; // MySQL varsayılan kullanıcı adı
$password = ""; // MySQL varsayılan şifre (boş olabilir)

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Veritabanı oluştur
$sql = "CREATE DATABASE test";
if ($conn->query($sql) === TRUE) {
    echo "Veritabanı başarıyla oluşturuldu!<br>";
} else {
    echo "Veritabanı oluşturulurken hata: " . $conn->error . "<br>";
}

// "test" veritabanına bağlan
$conn->select_db("test");

// "kisi" tablosunu oluştur
$sql = "CREATE TABLE kisi (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "'kisi' tablosu başarıyla oluşturuldu!";
} else {
    echo "Tablo oluşturulurken hata: " . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>




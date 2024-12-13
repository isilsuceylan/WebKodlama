<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb="bote24";
// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



// Sorgu
$sql = "SELECT * FROM persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Her bir satırı döndür ve yazdır
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["PersonID"] . " - Name: " . $row["Firstname"] . " - Surname: " . $row["Lastname"] . " - Address " . $row["Address"] . <br>";
    }
} else {
    echo "Sonuç bulunamadı.";
}

?>



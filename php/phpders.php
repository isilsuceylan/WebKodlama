<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tek Sayılar</title>
</head>
<body>
    <h1>1-100 Arası Tek Sayılar</h1>
    <ul>
        <?php
        for ($i = 1; $i <= 100; $i += 2) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>
</body>
</html>

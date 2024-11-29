<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamik Tablo</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        td {
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Tablo Oluştur</h1>
    <form method="POST" action="">
        <label for="rows">Satır Sayısı:</label>
        <input type="number" name="rows" id="rows" min="1" required>
        <label for="columns">Sütun Sayısı:</label>
        <input type="number" name="columns" id="columns" min="1" required>
        <button type="submit">Tabloyu Oluştur</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rows = (int)$_POST['rows'];
        $columns = (int)$_POST['columns'];

        echo "<h2>$rows x $columns Tablosu</h2>";
        echo "<table>";
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columns; $j++) {
                $randomNumber = rand(1, 100);
                echo "<td>$randomNumber</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>

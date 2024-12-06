<!DOCTYPE html>
<html lang="tr">
<body>
<?php
echo "php öğreniyorum <br>"
echo "bu benim php projem"

$dosya1 = fopen(filename: "phpproje.txt", mode:"w" or)
$txt ="satir1/n";
fwirte(stream: $dosya1, data: $txt);

$txt = "satir2/n";
fwrite(stream: $dosya1, data: $txt);
fclose(stream: $dosya1);



   
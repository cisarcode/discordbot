<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de endpoints de ngrok</title>
</head>
<body>
<h1>Lista de endpoints de ngrok</h1>
<?php
$api_key = "1088459887173963887";
$endpoint = "https://5f76-190-128-235-50.sa.ngrok.io";

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $api_key,
    "Ngrok-Version: 2"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$response = json_decode($response, true);

if (curl_errno($ch)) {
    echo "Error al obtener los endpoints: " . curl_error($ch);
} else {
    echo "<table>";
    echo "<tr><th>ID</th><th>URL</th><th>Tipo</th></tr>";
    foreach ($response['endpoints'] as $endpoint) {
        echo "<tr>";
        echo "<td>" . $endpoint['id'] . "</td>";
        echo "<td>" . $endpoint['public_url'] . "</td>";
        echo "<td>" . $endpoint['type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

curl_close($ch);
?>
</body>
</html>

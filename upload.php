<?php
// Datenbankverbindung herstellen
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "speedtest";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ergebnisse aus dem POST-Array erhalten
$downloadSpeed = $_POST['downloadSpeed'];
$uploadSpeed = $_POST['uploadSpeed'];
$ping = $_POST['ping'];

// Ergebnisse in die Datenbank schreiben
$sql = "INSERT INTO speedtest (download_speed, upload_speed, ping) VALUES ('$downloadSpeed', '$uploadSpeed', '$ping')";
if ($conn->query($sql) === TRUE) {
    echo "Ergebnisse erfolgreich gespeichert.";
} else {
    echo "Fehler beim Speichern der Ergebnisse: " . $conn->error;
}
$conn->close();
?>

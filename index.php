<?php
$servername = "host.docker.internal"; // conecta al MySQL local
$username = "root";                   // tu usuario de MySQL
$password = "ledesma2109";          // cambia esto por la real
$database = "testdb";

// Conexión
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión ❌: " . $conn->connect_error);
}

echo "<h2>¡Hola Mundo! Conectado a la base de datos ✅</h2>";

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h3>Usuarios en la base de datos:</h3><ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nombre"] . " - " . $row["correo"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No hay usuarios en la base de datos.";
}

$conn->close();
?>

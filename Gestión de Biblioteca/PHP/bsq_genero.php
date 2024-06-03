<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['genero'])) {
        $genero = $_POST['genero'];
        $sql = "SELECT Libros.Titulo FROM Libros
                JOIN Generos ON Libros.GeneroID = Generos.GeneroID
                WHERE Generos.Nombre = '$genero'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Título: " . $row["Titulo"] . "<br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "Por favor, ingrese un género.";
    }
}
$conn->close();
?>
<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['autor'])) {
        $autor = $_POST['autor'];
        $sql = "SELECT Libros.Titulo FROM Libros
                JOIN Autores ON Libros.AutorID = Autores.AutorID
                WHERE Autores.Nombre = '$autor'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Título: " . $row["Titulo"] . "<br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "Por favor, ingrese un autor.";
    }
}
$conn->close();
?>
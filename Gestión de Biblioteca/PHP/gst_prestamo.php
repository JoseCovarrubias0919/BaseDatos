<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['libroID']) && !empty($_POST['fechaPrestamo']) && !empty($_POST['fechaDevolucion'])) {
        $libroID = $_POST['libroID'];
        $fechaPrestamo = $_POST['fechaPrestamo'];
        $fechaDevolucion = $_POST['fechaDevolucion'];

        $sql = "INSERT INTO Prestamos (LibroID, FechaPrestamo, FechaDevolucion)
                VALUES ($libroID, '$fechaPrestamo', '$fechaDevolucion')";

        if ($conn->query($sql) === TRUE) {
            echo "Préstamo registrado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Por favor, complete todos los campos para registrar un préstamo.";
    }
}
$conn->close();
?>
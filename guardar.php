<?php
include 'conexion.php';

header('Content-Type: application/json');

$accion = $_POST['accion'] ?? '';

// 1. Guardar Confirmación de Asistencia
if ($accion === 'asistencia') {
    $nombre = trim($_POST['nombre'] ?? '');
    $seccion = trim($_POST['seccion'] ?? '');
    $evento = trim($_POST['evento'] ?? '');

    if (!empty($nombre) && !empty($seccion) && !empty($evento)) {
        // Nombre de tabla corregido a: confirmacion_asistencia
        $stmt = $conexion->prepare("INSERT INTO confirmacion_asistencia (nombre, seccion, evento) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $seccion, $evento);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => '¡Asistencia confirmada con éxito!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al guardar la asistencia: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Por favor completa todos los campos de asistencia.']);
    }
    exit;
}

// 2. Guardar Mensaje de Contacto
if ($accion === 'contacto') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if (!empty($nombre) && !empty($telefono) && !empty($mensaje)) {
        $stmt = $conexion->prepare("INSERT INTO contactos (nombre, telefono, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $telefono, $mensaje);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => '¡Gracias por tu mensaje! Nos pondremos en contacto pronto.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al guardar el mensaje: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Por favor completa todos los campos del contacto.']);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Acción no válida.']);
?>
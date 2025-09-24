<?php
// require_once 'conexion.php';
// // Verificar que todos los datos estén presentes
// if (
//     isset($_POST['temperatura']) &&
//     isset($_POST['ph']) &&
//     isset($_POST['oxigeno']) &&
//     isset($_POST['sensor_temperatura']) &&
//     isset($_POST['sensor_ph']) &&
//     isset($_POST['sensor_oxigeno'])
// ) {
//     // Escapar los datos para evitar inyecciones SQL
//     $temperatura = $conn->real_escape_string($_POST['temperatura']);
//     $ph = $conn->real_escape_string($_POST['ph']);
//     $oxigeno = $conn->real_escape_string($_POST['oxigeno']);
//     $sensor_temperatura = $conn->real_escape_string($_POST['sensor_temperatura']);
//     $sensor_ph = $conn->real_escape_string($_POST['sensor_ph']);
//     $sensor_oxigeno = $conn->real_escape_string($_POST['sensor_oxigeno']);

//     // Crear consulta SQL
//     $sql = "INSERT INTO parametros_agua (
//                 temperatura, ph, oxigeno,
//                 sensor_temperatura, sensor_ph, sensor_oxigeno, fecha_hora
//             ) VALUES (
//                 '$temperatura', '$ph', '$oxigeno',
//                 '$sensor_temperatura', '$sensor_ph', '$sensor_oxigeno', NOW()
//             )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Datos guardados correctamente.";
//     } else {
//         echo "Error al guardar: " . $conn->error;
//     }
// } else {
//     echo "Faltan parámetros.\n";
//     print_r($_POST); // ← VERÁS QUÉ LLEGA EXACTAMENTE DESDE EL ESP32
// }

// $conn->close();


require_once 'conexion.php';
// Verificar que todos los datos estén presentes
if (
    isset($_POST['temperatura']) &&
    isset($_POST['ph']) &&
    isset($_POST['oxigeno']) &&
    isset($_POST['sensor_temperatura']) &&
    isset($_POST['sensor_ph']) &&
    isset($_POST['sensor_oxigeno'])
) {
    // Escapar los datos para evitar inyecciones SQL
    $temperatura = $conn->real_escape_string($_POST['temperatura']);
    $ph = $conn->real_escape_string($_POST['ph']);
    $oxigeno = $conn->real_escape_string($_POST['oxigeno']);
    $sensor_temperatura = $conn->real_escape_string($_POST['sensor_temperatura']);
    $sensor_ph = $conn->real_escape_string($_POST['sensor_ph']);
    $sensor_oxigeno = $conn->real_escape_string($_POST['sensor_oxigeno']);

    // Obtener estanques_id a partir de sensor_temperatura
    $estanques_id = null;
    $sql_estanque = "SELECT estanques_id FROM sensores WHERE numero_serie = '$sensor_temperatura' LIMIT 1";
    $result_estanque = $conn->query($sql_estanque);
    if ($result_estanque && $result_estanque->num_rows > 0) {
        $row = $result_estanque->fetch_assoc();
        $estanques_id = $row['estanques_id'];
    } else {
        echo "Error: No se encontró estanques_id para el sensor_temperatura proporcionado.";
        $conn->close();
        exit;
    }

    // Insertar en parametros_agua
    $sql = "INSERT INTO parametros_agua (
                temperatura, ph, oxigeno,
                sensor_temperatura, sensor_ph, sensor_oxigeno, fecha_hora
            ) VALUES (
                '$temperatura', '$ph', '$oxigeno',
                '$sensor_temperatura', '$sensor_ph', '$sensor_oxigeno', NOW()
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente.";

        // Función para insertar alerta
        function insertarAlerta($conn, $estanques_id, $tipo_alerta, $descripcion) {
            $estanques_id = $conn->real_escape_string($estanques_id);
            $tipo_alerta = $conn->real_escape_string($tipo_alerta);
            $descripcion = $conn->real_escape_string($descripcion);
            $estado = 'pendiente'; // o el estado que uses por defecto

            $sql_alerta = "INSERT INTO alertas (estanques_id, fecha, tipo_alerta, descripcion, estado) 
                           VALUES ('$estanques_id', NOW(), '$tipo_alerta', '$descripcion', '$estado')";
            if ($conn->query($sql_alerta) === TRUE) {
                echo " Alerta '$tipo_alerta' registrada.";
            } else {
                echo " Error al registrar alerta '$tipo_alerta': " . $conn->error;
            }
        }

        // Verificar y crear alertas específicas
        if ($oxigeno < 3.0) {
            insertarAlerta($conn, $estanques_id, 'Oxígeno Bajo', "El nivel de oxígeno es bajo: $oxigeno mg/L");
        } elseif ($oxigeno > 5.0) {
            insertarAlerta($conn, $estanques_id, 'Oxígeno Alto', "El nivel de oxígeno es alto: $oxigeno mg/L");
        }

        if ($temperatura < 25) {
            insertarAlerta($conn, $estanques_id, 'Temperatura Baja', "La temperatura es baja: $temperatura °C");
        } elseif ($temperatura > 32) {
            insertarAlerta($conn, $estanques_id, 'Temperatura Alta', "La temperatura es alta: $temperatura °C");
        }

        if ($ph < 6) {
            insertarAlerta($conn, $estanques_id, 'pH Bajo', "El pH es bajo: $ph");
        } elseif ($ph > 8) {
            insertarAlerta($conn, $estanques_id, 'pH Alto', "El pH es alto: $ph");
        }

    } else {
        echo "Error al guardar: " . $conn->error;
    }
} else {
    echo "Faltan parámetros.\n";
    print_r($_POST); // ← VERÁS QUÉ LLEGA EXACTAMENTE DESDE EL ESP32
}

$conn->close();
?>

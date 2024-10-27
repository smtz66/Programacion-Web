<?php

$resultado = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['valor1']) || empty($_POST['valor2'])) {
        $error = "Debes completar ambos campos.";
    } elseif (!is_numeric($_POST['valor1']) || !is_numeric($_POST['valor2'])) {
        $error = "Ingresa sólo valores numéricos.";
    } else {
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];
        $operacion = $_POST['operacion'];

        switch ($operacion) {
            case 'suma':
                $resultado = $valor1 + $valor2;
                break;
            case 'resta':
                $resultado = $valor1 - $valor2;
                break;
            case 'multiplicacion':
                $resultado = $valor1 * $valor2;
                break;
            case 'division':
                if ($valor2 == 0) {
                    $error = "No se puede dividir entre cero.";
                } else {
                    $resultado = $valor1 / $valor2;
                }
                break;
            default:
                $error = "Operación no válida.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 14 - Calculadora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .contenedor {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: auto;
        }
        .btn-calcular {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Calculadora</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="valor1">Valor 1:</label>
                <input type="text" class="form-control" name="valor1" required>
            </div>
            <div class="form-group">
                <label for="valor2">Valor 2:</label>
                <input type="text" class="form-control" name="valor2" required>
            </div>
            <div class="form-group">
                <label>Operación:</label><br>
                <input type="radio" name="operacion" value="suma" required> Suma<br>
                <input type="radio" name="operacion" value="resta"> Resta<br>
                <input type="radio" name="operacion" value="multiplicacion"> Multiplicación<br>
                <input type="radio" name="operacion" value="division"> División<br>
            </div>
            <button type="submit" class="btn btn-calcular">Calcular</button>
            <button type="button" class="btn btn-secondary" onclick="recargarPagina()">Recargar</button>
        </form>
        <br>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($resultado !== ""): ?>
            <div class="alert alert-success">Resultado: <?= $resultado ?></div>
        <?php endif; ?>
    </div>

    <script>
        function recargarPagina() {
            location.reload();
        }
    </script>
</body>
</html>
<?php

require_once __DIR__ . '/src/IMC.php';

use App\IMC;

$resultadoIMC = null;
$clasificacion = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST['peso'], $_POST['altura']) &&
        is_numeric($_POST['peso']) &&
        is_numeric($_POST['altura']) &&
        $_POST['peso'] > 0 &&
        $_POST['altura'] > 0
    ) {

        $peso = floatval($_POST['peso']);
        $altura = floatval($_POST['altura']);

        try {
            $imc = new IMC($peso, $altura);

            $resultadoIMC = round($imc->calcular(), 2);
            $clasificacion = $imc->clasificacion();

        } catch (Exception $e) {
            $resultadoIMC = $e->getMessage();
        }

    } else {
        $resultadoIMC = "Por favor, introduce valores válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="number"], button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }

        .result {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Calculadora de IMC</h1>

    <form method="POST" action="">

        <label for="peso">Peso (kg):</label><br>
        <input 
            type="number" 
            id="peso" 
            name="peso" 
            step="0.1" 
            required
        ><br>

        <label for="altura">Altura (m):</label><br>
        <input 
            type="number" 
            id="altura" 
            name="altura" 
            step="0.01" 
            required
        ><br>

        <button type="submit">Calcular IMC</button>

    </form>

    <?php if ($resultadoIMC !== null): ?>
        <div class="result">
            IMC: <?= htmlspecialchars($resultadoIMC); ?><br>

            <?php if ($clasificacion !== null): ?>
                Clasificación: <?= htmlspecialchars($clasificacion); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>
</html>
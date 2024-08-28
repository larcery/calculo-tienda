<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Compra en Tienda en Línea</title>
</head>
<body>
    <h1>Calculadora de Compras</h1>
    <form method="post">
        <label for="producto1">Precio del Producto 1:</label>
        <input type="number" name="precio1" id="producto1" step="0.01" required><br><br>

        <label for="cantidad1">Cantidad del Producto 1:</label>
        <input type="number" name="cantidad1" id="cantidad1" required><br><br>

        <label for="producto2">Precio del Producto 2:</label>
        <input type="number" name="precio2" id="producto2" step="0.01" required><br><br>

        <label for="cantidad2">Cantidad del Producto 2:</label>
        <input type="number" name="cantidad2" id="cantidad2" required><br><br>

        <label for="producto3">Precio del Producto 3:</label>
        <input type="number" name="precio3" id="producto3" step="0.01" required><br><br>

        <label for="cantidad3">Cantidad del Producto 3:</label>
        <input type="number" name="cantidad3" id="cantidad3" required><br><br>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger datos del formulario
        $precios = [
            floatval($_POST['precio1']),
            floatval($_POST['precio2']),
            floatval($_POST['precio3'])
        ];

        $cantidades = [
            intval($_POST['cantidad1']),
            intval($_POST['cantidad2']),
            intval($_POST['cantidad3'])
        ];

        // Función para calcular el subtotal
        function calcularSubtotal($precios, $cantidades) {
            $subtotal = 0;
            for ($i = 0; $i < count($precios); $i++) {
                $subtotal += $precios[$i] * $cantidades[$i];
            }
            return $subtotal;
        }

        // Función para calcular el monto de impuestos
        function calcularImpuestos($subtotal, $tasa_impuesto) {
            return $subtotal * ($tasa_impuesto / 100);
        }

        // Función para calcular el descuento
        function calcularDescuento($subtotal, $tasa_descuento) {
            return $subtotal * ($tasa_descuento / 100);
        }

        // Definir la tasa de impuesto y la tasa de descuento
        $tasa_impuesto = 18; // 18% de impuestos
        $tasa_descuento = 10; // 10% de descuento

        // Realizar cálculos
        $subtotal = calcularSubtotal($precios, $cantidades);
        $impuestos = calcularImpuestos($subtotal, $tasa_impuesto);
        $descuento = calcularDescuento($subtotal, $tasa_descuento);
        $total = $subtotal + $impuestos - $descuento;

        // Mostrar resultados
        echo "<h2>Resumen de la compra:</h2>";
        echo "<p>Subtotal: $" . number_format($subtotal, 2) . "</p>";
        echo "<p>Monto de impuestos (18%): $" . number_format($impuestos, 2) . "</p>";
        echo "<p>Descuento aplicado (10%): -$" . number_format($descuento, 2) . "</p>";
        echo "<p><strong>Total final: $" . number_format($total, 2) . "</strong></p>";
    }
    ?>
</body>
</html>

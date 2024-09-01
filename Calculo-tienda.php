<?php
// Solicita al usuario que ingrese el precio y cantidad de tres productos diferentes.
$precio1 = 30.00;
$cantidad1 = 2;

$precio2 = 20.00;
$cantidad2 = 3;

$precio3 = 10.00;
$cantidad3 = 4;

// Calcula el subtotal de la compra, que es la suma del precio de cada producto multiplicado por su cantidad.
$subtotal = ($precio1 * $cantidad1) + ($precio2 * $cantidad2) + ($precio3 * $cantidad3);

// Calcula el monto de impuestos aplicado al subtotal.
$impuesto = $subtotal * 0.18;

// Calcula el descuento aplicado al subtotal.(10%)
$descuento = $subtotal * 0.10;

// Calcula el total final sumando el subtotal y el monto de impuestos, y restando el descuento aplicado.
$totalFinal = $subtotal + $impuesto - $descuento;

// Mostrar los resultados en soles
echo "Subtotal de la compra: S/" . number_format($subtotal, 2) . "<br>";
echo "Monto de impuestos (18%): S/" . number_format($impuesto, 2) . "<br>";
echo "Descuento aplicado (10%): -S/" . number_format($descuento, 2) . "<br>";
echo "Total final de la compra: S/" . number_format($totalFinal, 2) . "<br>";
?>


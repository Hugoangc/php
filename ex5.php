<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Integração Numérica</title>
</head>
<body>
    <form method="POST" action="">
        <label>Intervalo inferior (a):</label>
        <input type="number" name="a" step="any" required>
        <label>Intervalo superior (b):</label>
        <input type="number" name="b" step="any" required>
        <label>Número de subintervalos (n):</label>
        <input type="number" name="n" required>
        <button type="submit">Calcular</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        function f($x) {
            return ($x**2) / 5 + 2 * sin($x);
        }
        $a = $_POST['a'];
        $b = $_POST['b'];
        $n = $_POST['n'];

        $h = ($b - $a) / $n;
        $soma = f($a) + f($b);
        for ($i = 1; $i < $n; $i++) {
            $soma += 2 * f($a + $i * $h);
        }
        $resultado = ($h / 2) * $soma;
        echo "<p>Resultado da Integral: $resultado</p>";
    }
    ?>
</body>
</html>

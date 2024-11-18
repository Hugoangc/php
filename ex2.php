<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Função de Segundo Grau</title>
</head>
<body>
    <form method="POST" action="">
        <label>Coeficiente a:</label>
        <input type="number" name="a" step="any" required>
        <label>Coeficiente b:</label>
        <input type="number" name="b" step="any" required>
        <label>Coeficiente c:</label>
        <input type="number" name="c" step="any" required>
        <button type="submit">Calcular</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        if ($a == 0) {
            echo "<p>Não é uma função de segundo grau.</p>";
        } else {
            $delta = $b**2 - 4*$a*$c;
            $concavidade = $a > 0 ? "para cima" : "para baixo";
            $xVertice = -$b / (2*$a);
            $yVertice = -$delta / (4*$a);
            echo "<p>Concavidade: $concavidade</p>";
            echo "<p>Vértice: ($xVertice, $yVertice)</p>";
            if ($delta > 0) {
                $x1 = (-$b + sqrt($delta)) / (2*$a);
                $x2 = (-$b - sqrt($delta)) / (2*$a);
                echo "<p>Raízes: $x1 e $x2</p>";
            } elseif ($delta == 0) {
                echo "<p>Raiz: $xVertice</p>";
            } else {
                echo "<p>Sem raízes reais.</p>";
            }
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Derivada de uma Função</title>
</head>
<body>
    <h1>Derivada de uma Função</h1>
    <form method="POST" action="">
        <label>Digite a função:</label>
        <input type="text" name="funcao" placeholder="Exemplo: x^3+2x" required>
        <button type="submit">Calcular Derivada</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $funcao = $_POST['funcao'];

        // Estrutura de padrões de derivação
        $regras = [
            '/(\d*)x\^(\d+)/' => function ($m) {
                $coeficiente = $m[1] === '' ? 1 : (int)$m[1];
                $expoente = (int)$m[2];
                return ($coeficiente * $expoente) . "x^" . ($expoente - 1);
            },
            '/(\d*)x(?!\^)/' => function ($m) {
                $coeficiente = $m[1] === '' ? 1 : (int)$m[1];
                return $coeficiente;
            },
            '/sen\((\d*)x\)/' => function ($m) {
                $coeficiente = $m[1] === '' ? 1 : (int)$m[1];
                return $coeficiente . "cos(" . $m[1] . "x)";
            },
            '/cos\((\d*)x\)/' => function ($m) {
                $coeficiente = $m[1] === '' ? 1 : (int)$m[1];
                return "-" . $coeficiente . "sen(" . $m[1] . "x)";
            },
            '/\d+/' => function ($m) {
                return "0"; // Constantes têm derivada zero
            }
        ];

        // Aplicar regras para calcular a derivada
        $derivada = $funcao;
        foreach ($regras as $padrao => $replacar) {
            $derivada = preg_replace_callback($padrao, $replacar, $derivada);
        }

        echo "<p>Função original: $funcao</p>";
        echo "<p>Derivada: $derivada</p>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificar Palíndromo</title>
</head>
<body>
    <form method="POST" action="">
        <label>Digite uma palavra ou texto:</label>
        <input type="text" name="texto" required>
        <button type="submit">Verificar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST['texto'];
        $textoLimpo = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($texto));
        $ehPalindromo = $textoLimpo === strrev($textoLimpo);
        echo $ehPalindromo ? "<p>É um palíndromo!</p>" : "<p>Não é um palíndromo.</p>";
    }
    ?>
</body>
</html>


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
            $intersecaoY = $c;  // Interseção com o eixo Y é quando x = 0, ou seja, f(0) = c

            echo "<p>Concavidade: $concavidade</p>";
            echo "<p>Vértice: ($xVertice, $yVertice)</p>";
            echo "<p>Interseção com o eixo Y: (0, $intersecaoY)</p>";  // Exibe a interseção com o eixo Y

            if ($delta > 0) {
                // Duas raízes reais
                $x1 = (-$b + sqrt($delta)) / (2*$a);
                $x2 = (-$b - sqrt($delta)) / (2*$a);
                echo "<p>Raízes (interseções com o eixo X): $x1 e $x2</p>";
            } elseif ($delta == 0) {
                // Uma raiz real (interseção única)
                echo "<p>Raiz (interseção com o eixo X): $xVertice</p>";
            } else {
                // Não há raízes reais
                echo "<p>Sem raízes reais (sem interseções com o eixo X).</p>";
            }
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>
<body>
    <form method="POST" action="">
        <label>Operação:</label>
        <select name="operacao">
            <option value="add">Adição</option>
            <option value="sub">Subtração</option>
            <option value="mult">Multiplicação</option>
            <option value="div">Divisão</option>
            <option value="log">Logaritmo Natural</option>
            <option value="raiz">Raiz</option>
            <option value="exp">Exponenciação</option>
            <option value="sen">Seno</option>
            <option value="cos">Cosseno</option>
            <option value="tan">Tangente</option>
            <option value="retangular_polar">Retangular para Polar</option>
            <option value="polar_retangular">Polar para Retangular</option>
        </select>

        <label>Primeiro número (x ou r):</label>
        <input type="number" name="x" step="any" required>
        
        <label>Segundo número (y ou θ):</label>
        <input type="number" name="y" step="any">
        
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $operacao = $_POST['operacao'];
        $x = $_POST['x'];
        $y = $_POST['y'] ?? null;

        switch ($operacao) {
            case 'add': 
                $resultado = $x + $y;
                break;
            case 'sub': 
                $resultado = $x - $y;
                break;
            case 'mult': 
                $resultado = $x * $y;
                break;
            case 'div': 
                $resultado = $y != 0 ? $x / $y : "Erro: divisão por zero";
                break;
            case 'log': 
                $resultado = log($x);
                break;
            case 'raiz': 
                $resultado = pow($x, 1 / $y);
                break;
            case 'exp': 
                $resultado = pow($x, $y);
                break;
            case 'sen': 
                $resultado = sin($x);
                break;
            case 'cos': 
                $resultado = cos($x);
                break;
            case 'tan': 
                $resultado = tan($x);
                break;
            case 'retangular_polar': 
                // Converte de retangular (x, y) para polar (r, θ)
                $r = sqrt($x**2 + $y**2); // r = sqrt(x² + y²)
                $theta = atan2($y, $x); // θ = atan2(y, x)
                $resultado = "r = $r, θ = " . rad2deg($theta) . "°"; // Convertendo θ de radianos para graus
                break;
            case 'polar_retangular': 
                // Converte de polar (r, θ) para retangular (x, y)
                $x_resultado = $x * cos(deg2rad($y)); // x = r * cos(θ)
                $y_resultado = $x * sin(deg2rad($y)); // y = r * sin(θ)
                $resultado = "x = $x_resultado, y = $y_resultado";
                break;
            default: 
                $resultado = "Operação inválida.";
                break;
        }
        
        echo "<p>Resultado: $resultado</p>";
    }
    ?>
</body>
</html>





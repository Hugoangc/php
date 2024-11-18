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
        </select>
        <label>Primeiro número:</label>
        <input type="number" name="x" step="any" required>
        <label>Segundo número (se necessário):</label>
        <input type="number" name="y" step="any">
        <button type="submit">Calcular</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $operacao = $_POST['operacao'];
        $x = $_POST['x'];
        $y = $_POST['y'] ?? null;

        switch ($operacao) {
            case 'add': $resultado = $x + $y; break;
            case 'sub': $resultado = $x - $y; break;
            case 'mult': $resultado = $x * $y; break;
            case 'div': $resultado = $y != 0 ? $x / $y : "Erro: divisão por zero"; break;
            case 'log': $resultado = log($x); break;
            case 'raiz': $resultado = pow($x, 1 / $y); break;
            case 'exp': $resultado = pow($x, $y); break;
            case 'sen': $resultado = sin($x); break;
            case 'cos': $resultado = cos($x); break;
            case 'tan': $resultado = tan($x); break;
            default: $resultado = "Operação inválida."; break;
        }
        echo "<p>Resultado: $resultado</p>";
    }
    ?>
</body>
</html>

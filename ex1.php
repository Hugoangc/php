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

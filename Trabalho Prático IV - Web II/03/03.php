<!DOCTYPE html>
<html>
<head>
    <title>Contagem de Caracteres</title>
</head>
<body>
    <form method="post" action="">
        Digite uma palavra ou texto: <input type="text" name="texto">
        <input type="submit" value="Contar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST['texto'];
        $quantidade = strlen($texto);
        echo "A quantidade de caracteres no texto digitado é: $quantidade";
    }
    ?>
</body>
</html>

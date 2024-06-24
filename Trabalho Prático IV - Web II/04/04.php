<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simples</title>
</head>
<body>
    <form method="post" action="">
        Número 1: <input type="number" step="any" name="num1"><br>
        Número 2 (se necessário): <input type="number" step="any" name="num2"><br>
        Operação: 
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
            <option value="raiz_quadrada">Raiz Quadrada</option>
        </select><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacao = $_POST['operacao'];
        
        switch ($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                echo "Resultado: $resultado";
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                echo "Resultado: $resultado";
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                echo "Resultado: $resultado";
                break;
            case 'divisao':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo "Resultado: $resultado";
                } else {
                    echo "Erro: Divisão por zero não é permitida.";
                }
                break;
            case 'raiz_quadrada':
                if ($num1 >= 0) {
                    $resultado = sqrt($num1);
                    echo "Resultado: $resultado";
                } else {
                    echo "Erro: Raiz quadrada de número negativo não é permitida.";
                }
                break;
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contato - Livraria Imaginária</title>
<link rel="stylesheet" href="css01/styles.css">
</head>
<body>
<header>
<h1>Livraria Imaginária - Contato</h1>
</header>
<main>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $motivo = htmlspecialchars($_POST['motivo']);

    echo "<h2>Obrigado pelo seu feedback, $nome!</h2>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";
    echo "<p><strong>Motivo do Contato:</strong> $motivo</p>";
    echo '<section><a href="index.html">Voltar à Página Inicial</a></section>';
} else {
?>
<form action="" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" required></textarea>
    <label for="motivo">Motivo do Contato:</label>
    <select id="motivo" name="motivo">
        <option value="elogio">Elogio</option>
        <option value="critica">Crítica</option>
        <option value="sugestao">Sugestão</option>
        <option value="duvida">Dúvida</option>
    </select>
    <button type="submit">Enviar</button>
</form>
<section>
    <a href="livros.html">Ver Livros</a>
</section>
<section>
    <a href="index.html">Página Inicial</a>
</section>
<?php
}
?>
</main>
<footer>
<p>© 2024 Livraria Imaginária. Todos os direitos NÃO reservados.</p>
</footer>
</body>
</html>

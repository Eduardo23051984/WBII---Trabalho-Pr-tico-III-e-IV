<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xuitter_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manipulação de diferentes tipos de requisições (POST e GET)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];
    
    if ($action === 'save') {
        $texto = $_POST['texto'];
        $stmt = $conn->prepare("INSERT INTO publicacoes (texto) VALUES (?)");
        $stmt->bind_param("s", $texto);
        $stmt->execute();
        $stmt->close();
        exit;
    } elseif ($action === 'like') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE publicacoes SET curtida = NOT curtida WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        exit;
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM publicacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        exit;
    }
}

// Seleciona todas as postagens para exibir
$posts = [];
$result = $conn->query("SELECT * FROM publicacoes ORDER BY data_criacao DESC");
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Twitter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mini Twitter Pirata Edition 2.0</a>
            <span class="navbar-text">Eduardo Alves Barbosa</span>
        </div>
    </nav>

    <!-- Formulário -->
    <div class="container mt-4">
        <form id="postForm">
            <div class="mb-3">
                <textarea class="form-control" id="postContent" rows="3" placeholder="O que está acontecendo?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Postar</button>
        </form>
        <!-- Espaço para as postagens -->
        <div id="postContainer" class="mt-4">
            <?php foreach ($posts as $post): ?>
                <div class="card mb-3" data-id="<?php echo $post['id']; ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="card-text"><?php echo htmlspecialchars($post['texto']); ?></p>
                            <div>
                                <button class="btn btn-sm <?php echo $post['curtida'] ? 'btn-primary' : 'btn-outline-primary'; ?> me-2 like-button">
                                    <i class="bi bi-heart"></i> Curtir
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-button">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

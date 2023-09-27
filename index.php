<?php
require_once 'config.php';

// Inicializa a variável de sessão para armazenar a mensagem de sucesso
session_start();
$_SESSION['success_message'] = "";

// Resto do seu código para processar o formulário e inserir dados no banco de dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o texto do post do formulário
    $postText = $_POST['post_text'];

    // Insere o post no banco de dados e inclui a data
        $sql = "INSERT INTO posts (post_text) VALUES ('$postText')";
        if ($conn->query($sql) === TRUE) {
            $postDate = date("Y-m-d H:i:s"); // Obtém a data atual
            echo "Post enviado com sucesso em $postDate!";
            
            // Define a mensagem de sucesso na variável de sessão
            $_SESSION['success_message'] = "Post enviado com sucesso!";
            
            // Redireciona o usuário de volta para a página principal
            header("Location: index.php");
            exit; // Encerra o script atual
        } else {
            echo "Erro ao enviar o post: " . $conn->error;
        }

}

// Consulta o banco de dados para obter os posts, ordenando por data em ordem decrescente
$sql = "SELECT * FROM posts ORDER BY post_date DESC";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css"/>
  <title>PostSystem</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/31b2f004d5.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
        <div class="coluna">
            <div class="logo">
                <i class="fa-solid fa-feather"></i>
                <p style="color: white">© 2023 MiguelH</p>
            </div>
            <div class="postarea">
                <!-- Exibe a mensagem de sucesso da variável de sessão -->
                <?php
                if (!empty($_SESSION['success_message'])) {
                    echo '<p>' . $_SESSION['success_message'] . '</p>';
                    // Limpa a variável de sessão após exibir a mensagem
                    unset($_SESSION['success_message']);
                }
                ?>
                <form method="post"> <!-- A ação do formulário é o próprio arquivo PHP -->
                <div style="display: flex;">
                    <textarea name="post_text" placeholder="Em que você esta pensando?" required ></textarea>
                    <button class="submit-button" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
            </div>
            <div class="post-wrapper">
                    <?php
                    // Loop para exibir os posts com a data
                    while ($row = $result->fetch_assoc()) {
                        $postText = $row['post_text'];
                        $postDate = date("d/m/Y H:i:s", strtotime($row['post_date'])); // Formata a data
                        echo '<div class="post">';
                        echo '<p class="post-text">' . $postText . '</p>';
                        echo '<p class="post-date">Postado em: ' . $postDate . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Exibe a mensagem de sucesso da variável de sessão -->
                <?php
                if (!empty($_SESSION['success_message'])) {
                    echo '<p>' . $_SESSION['success_message'] . '</p>';
                    // Limpa a variável de sessão após exibir a mensagem
                    unset($_SESSION['success_message']);
                }
                ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Loop através de todos os elementos .post
        $('.post').each(function () {
            // Defina a altura do elemento com base no conteúdo
            $(this).css('height', 'auto'); // Redefinir a altura para 'auto' inicialmente
            var height = $(this).height(); // Obter a altura real do conteúdo
            $(this).css('height', height + 'px'); // Definir a altura com base no conteúdo
        });
    });
</script>
</body>
</html>

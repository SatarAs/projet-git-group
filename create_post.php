<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php'); 
    exit();
}

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$status = $_POST['status'] ?? 'DRAFT';
$visibility = 1; 
$author_id = 1; 


if (!empty($title) && !empty($content)) {
    try {
        
        $sql = "INSERT INTO post (title, content, status, visibility, author_id) VALUES (:title, :content, :status, :visibility, :author_id)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            'title' => $title,
            'content' => $content,
            'status' => $status,
            'visibility' => $visibility,
            'author_id' => $author_id
        ]);

       
        header('Location: index.php?success=1');
        exit();

    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }
} else {
    echo "Le titre et le contenu sont obligatoires.";
}
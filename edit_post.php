<?php
     $postID = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;

     if($postID <= 0) {
        header('Location:index.php');
        exit();
     }
     require_once 'database.php';

     $sql = "SELECT * FROM post WHERE id = :id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute (['id' => $postID]);
     $post = $stmt->fetch();

     if(!$post) {
        header('Location: index.php?error=not_found');
        exit();
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="" method="post">
    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">

    <label for="title">Titre</label>
         <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title']); ?>" required>

         <label for="content">Contenue de l'article</label>
         <textarea name="content" id="content" required><?= htmlspecialchars($post['content']); ?></textarea>

        <label for="status">Statut</label>
        <select name="status" id="status" required>
            <option value="DRAFT" <?= $post['status'] === 'DRAFT' ? 'selected' : '' ?>>DRAFT</option>
            <option value="PUBLISHED" <?= $post['status'] === 'PUBLISHED' ? 'selected' : '' ?>>PUBLISHED</option>
            <option value="ARCHIVED" <?= $post['status'] === 'ARCHIVED' ? 'selected' : '' ?>>ARCHIVED</option>
        </select>
        <button type="submit">Mettre à jour l'article</button>
 </form>
</body>
</html>
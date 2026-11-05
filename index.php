<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
         <label for="title">Titre</label>
         <input type="text" name="title" id="title" required>

         <label for="content">Contenue de l'article</label>
         <textarea name="content" id="content" required></textarea>

        <label for="status">Statu</label>
        <select name="status" id="status" required>
            <option value="DRAFT">DRAFT</option>
            <option value="PUBLISHED">PUBLISHED</option>
            <option value="ARCHIVED">ARCHIVED</option>
        </select>

        <button type="submit">Créer l'article</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Le blog de l'AVBN</title>
        <link href="style.css" rel="stylesheet" />
    </head>
 
    <body>
        <h1>Le super blog de l'AVBN !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['french_creation_date'] ?></em>
            </h3>
 
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="POST">
            <label for="author">Auteur : </label>
            <input type="text" name="author" id="author">
            <label for="comment">Commentaires : </label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

            <input type="submit" value="submit">
        </form>

        <h2>Commentaires</h2>
 
        <?php
        foreach ($comments as $comment) {
        ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['french_creation_date'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
    </body>
</html>

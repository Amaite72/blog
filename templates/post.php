<?php require "header.php"; ?>
    
        <div class="container">
        <h1>Bienvenue sur Potablog</h1>

        <div class="container">
            <h3>
                <?= $post['title'] ?>
                
            </h3>
 
            <p>
                <?= nl2br($post['content']) ?>
            </p>
            <em>le <?= $post['french_creation_date'] ?></em>
        </div>
        <div class="container">
        <?php require "form/formComment.php"; ?>
        </div>
        <div class="container">
        <h2>Commentaires</h2>
 
        <?php
        $comments = $comments->getComments();
        foreach ($comments as $comment) {
        ?>
        <p><strong><?= $comment['author'] ?></strong> le <?= $comment['french_creation_date'] ?></p>
        <p><?= nl2br($comment['comment']) ?></p>
        <?php
        }
        ?>
        </div>
<?php require "footer.php"; ?>

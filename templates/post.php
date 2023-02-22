<?php require "header.php"; ?>

<div class="container">
<a href="../index.php?action=deletePost&id=<?= $article['id'] ?>" class="btn btn-primary">Supprimer</a>
<a href="../index.php?action=updatePost&id=<?= $article['id'] ?>" class="btn btn-primary">Modifier</a>
    <h3>
        <?= $article['title']; ?>               
    </h3>
    
    <div class="container position-relative">
        <img src="<?php echo $article['image']; ?>" alt="image" class="img-post">   
        <p>
            <?= nl2br($article['content']); ?>
        </p>
        <div class="section-profil">
               <i class="fa-solid fa-user img-profil"></i>
               <div class="section-profil-user-date">
                  <small class="format-user">Memet</small>
                  <small class="format-date">
                     <?php
                     // we display the date and the time on the new format
                     echo separateDate($article['french_creation_date']);
                     echo separateTime($article['french_creation_date']);
                     ?>
                  </small>
               </div>
            </div>
            <button class="button button-left"><i class="fa-solid fa-chevron-left"></i></button>
            <!--<a href="#" class="add-button"><i class="fa-solid fa-xmark"></i></a>   -->     
    </div>
    
    <div class="container">
        <?php require_once "form/formComment.php"; ?>
    </div>
    <div class="container">
        <h2>Commentaires</h2>
        <?php if($getComments): ?>
            <?php foreach($getComments as $comment):?>
                <p><strong><?= $comment['author'] ?></strong> le <?= $comment['french_creation_date'] ?></p>
                <p><?= nl2br($comment['comment']) ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?= "Soyez le premier à poster un commentaire. "; ?></p>
        <?php endif; ?>
    </div>
</div>
<?php require "footer.php"; ?>

<?php require "header.php"; ?>
    <h3><?= $article['title']; ?></h3>    
    <div class="container position-relative">
        <img src="<?php echo $article['image']; ?>" alt="image" class="img-post">   
        <p><?= nl2br($article['content']); ?></p>
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
    </div>
    <div class="container-actions-post">
        <div class="actions-post position-absolute">
                <button class="button button-left"><i class="fa-solid fa-chevron-right"></i></button> 
                <button class="button button-right"><i class="fa-solid fa-chevron-left"></i></button> 
                <a class="buttonUpdate" href="../index.php?action=updatePost&id=<?= $article['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="buttonDelete" href="#"><i class="fa-solid fa-trash"></i></a>
                <!--<a href="../index.php?action=deletePost&id=--><!--<?php //"$article['id']" ?>"><i class="fa-solid fa-trash"></i></a>-->
        </div>
    </div>
    
    <div class="container">
        <?php require_once "form/formComment.php"; ?>
    </div>
    <div class="container-comment">
        <h2>Commentaires</h2>
        <?php if($getComments): ?>
            <?php foreach($getComments as $comment):?>                   
                <div class="content-user-comment">
                    <div>
                        <i class="fa-solid fa-user"></i> 
                    </div>
                    <div class="content-user-content-date">       
                        <p class="format-user"><?= $comment['author'] ?></p> 
                        <p class="p-comment"><?= nl2br($comment['comment']) ?></p>
                        <small class="format-date">
                             <?php
                             // we display the date and the time on the new format
                             echo separateDate($comment['french_creation_date']);
                             echo separateTime($comment['french_creation_date']);
                             ?>
                        </small> 
                    </div>   
                </div>                                                              
            <?php endforeach; ?>
        <?php else: ?>
            <p><?= "Soyez le premier à poster un commentaire. "; ?></p>
        <?php endif; ?>
    </div>
<?php require "footer.php"; ?>

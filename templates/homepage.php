<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Le blog de l'AVBN</title>
      <link href="style.css" rel="stylesheet" />
   </head>

<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
   <body>
      <h1>Bienvenue sur Potablog !</h1>
      <p>Derniers billets du blog :</p>
      <?php
         foreach($posts as $post){        
      ?>
         <div class="news">          
            <h3>
               <?= htmlspecialchars($post['title']); ?>
               <em>le <?= $post['frenchCreationDate']; ?></em>
            </h3>
            <p>
               <?=
                // We display the content
                nl2br(htmlspecialchars($post['content']));
               ?>
               <br/>
               <em><a href="/index.php?action=post&id=<?= urlencode($post['id'])?>">Commentaires</a></em>
            </p>
         </div>
      <?php
      } // End of the posts loop
      ?>
      
   <?php $content = ob_get_clean(); ?>
      
   <?php require('layout.php') ?>

   </body>
</html>
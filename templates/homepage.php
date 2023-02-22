<?php 
require "header.php";
$title = "Potablog"; ?>

<?php ob_start(); ?>
<h1 class="h1">ARTICLES</h1>
      <div class="container d-flex flex-wrap justify-content-center gap-5">
      
      <?php
         foreach($articles as $post){        
      ?>
      <a href="/index.php?action=post&id=<?= urlencode($post['id'])?>" class="news">
            <img class="img-posts" src=<?php echo $post['image']; ?> alt="image">
            <h3>
               <?= $post['title']; ?>
               
            </h3>
            <p>
               <?php
                // we display the content by limiting the number of characters at 120
                echo substr($post['content'], 0, 120).' . . .';
               ?>
            </p>
            <div class="section-profil">
               <i class="fa-solid fa-user img-profil"></i>
               <div class="section-profil-user-date">
                  <small class="format-user">Memet</small>
                  <small class="format-date">
                     <?php
                     // we display the date and the time on the new format
                     echo separateDate($post['frenchCreationDate']);
                     echo separateTime($post['frenchCreationDate']);
                     ?>
                  </small>
               </div>
            </div>
      </a>
      <?php
      } // End of the posts loop
      ?>
     </div> 
     <?php require "form/formPost.php"; ?>  
   <?php $content = ob_get_clean(); ?>
      
   <?php require('layout.php') ?>
      
<?php require "footer.php"; ?>  
<div class="form-fo-contain">
    <h2 class="h2">Modifier l'article : </h2>
    <form action="../index.php?action=updatePost&id=<?= $post['id'] ?>" method="POST" >
        <?php if($_POST['image'] === null): ?>
            <?php 
                $image = $_POST['image'];
                $image = $post['image'];
                 ?>
        <?php elseif(!isset($_POST['image'])): ?>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>      
            <input class="form-control" type="file" id="formFile" name="image" >       
        </div>    
        <?php  endif; ?>

        <div class="mb-3"> 
          <label for="title" class="form-label">Titre</label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo $post["title"]; ?>">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Contenu</label>
          <textarea name="content" id="content" class="form-control" ><?php echo $post["content"]; ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
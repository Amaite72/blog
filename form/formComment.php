<div class="form-fo-contain">
    <h2 class="h2">Ajouter un commentaire</h2>
    <form action="../index.php?action=addComment&id=<?= $article['id'] ?>" method="POST" >
      <div class="mb-3">
        <label for="author" class="form-label">Auteur</label>
        <input type="text" class="form-control" name="author" id="author">
      </div>
      <div class="mb-3">
        <label for="comment" class="form-label">Commentaire</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
      </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
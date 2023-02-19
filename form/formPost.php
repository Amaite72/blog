<div class="form-fo-contain">
    <h2 class="h2">Ajouter un article</h2>
    <form action="../index.php?action=article" method="POST">
      <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile" name="image">
      </div>
      <div class="mb-3"> 
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Contenu</label>
        <textarea name="content" id="content" class="form-control"></textarea>
      </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>


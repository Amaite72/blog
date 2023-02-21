<div class="form-fo-contain">
    <h2 class="h2">Ajouter un utilisateur</h2>
    <form action="../index.php?action=addUser" method="POST" >
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="lname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lname" id="lname">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="fname" class="form-label">Prénom</label>
              <input type="text" class="form-control" name="fname" id="fname">
            </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="mb-3">
        <label for="passwordConfirm" class="form-label">Ressaisir mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm">
      </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>


<?php require "header.php"; ?>
<div class="container position-relative">
    <h3 classe="title-post">Modifier</h3>
    <a href="../index.php?action=post&id=<?= $_GET['id'] ?>" class="button-return"><i class="fa-solid fa-arrow-rotate-right"></i></a>
</div>

    <?php require "form/formUpdatePost.php"; ?>


<?php require "footer.php"; ?>
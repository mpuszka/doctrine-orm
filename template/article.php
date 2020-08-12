<?php 
    include 'partials/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $article->getTitle() ?? ''; ?></h1>
                <hr />
                <p><?= $article->getBody() ?? ''; ?></p>
                <div class="float-right"><?= $article->getCreatedDate()->format('Y-m-d') ?? ''; ?></div>
            </div>
        </div>
    </div>

<?php 
    include 'partials/footer.php';
?>
<?php 
    include 'partials/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Articles</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (!isset($articles) || empty($articles)) : ?>
                    <div class="alert alert-danger" role="alert">
                        No articles found!
                    </div>
                <?php else: ?>
                    <ul>
                        <?php foreach ($articles as $article) : ?>
                            <li><?= $article->getTitle(); ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php 
    include 'partials/footer.php';
?>
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
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <?php
                    $comments = $article->getComments();

                    foreach($comments as $comment): 
                ?>
                    <div class="media mb-5">
                        <div class="media-body">
                            <h5 class="mt-0"><?= $comment->getTitle() ?? ''; ?></h5>
                            <?= $comment->getBody() ?? ''; ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php 
    include 'partials/footer.php';
?>
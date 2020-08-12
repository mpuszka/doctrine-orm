<?php 
    include 'partials/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="<?= $article->getTitle() ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" rows="6"><?= $article->getBody() ?? ''; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

<?php 
    include 'partials/footer.php';
?>
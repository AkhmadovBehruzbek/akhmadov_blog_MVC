<?php
require APPROOT . '/views/includes/head.php';
require APPROOT . '/views/includes/navigation.php';
require APPROOT . '/views/includes/header.php';
?>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <?php foreach ($data['posts'] as $post) : ?>
            <div class="post-preview">
                <a href="<?= URLROOT ?>/posts/<?= $post->id ?>">
                    <h2 class="post-title"><?= $post->title ?></h2>
                    <h3 class="post-subtitle"><?= $post->subtitle ?></h3>
                </a>
                <p class="post-meta">
                    Muallif
                    <a href="<?= URLROOT ?>/pages/about">Behruzbek Axmadov</a>
                    <?php echo date('d-m-Y H:m', strtotime($post->created_at)); ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php' ?>

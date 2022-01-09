<?php
require APPROOT . '/views/includes/head.php';
require APPROOT . '/views/includes/navigation.php';
require APPROOT . '/views/includes/postHeader.php';
?>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    <?= $data['posts']->body ?>
                </p>

<!--                <img class="img-fluid" src="assets/img/post-sample-image.jpg" alt="..." />-->
<!--                <span class="caption text-muted">To go places and do things efore – that’s what living is all about.</span>-->
<!--                <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy.or the next ten.</blockquote>-->
<!--                <h2 class="section-heading">The Final Frontier</h2>-->

<!--                <p>-->
<!--                    Placeholder text by-->
<!--                    <a href="http://spaceipsum.com/">Space Ipsum</a>-->
<!--                    &middot; Images by-->
<!--                    <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>-->
<!--                </p>-->
            </div>
        </div>
    </div>
</article>

<?php require APPROOT . '/views/includes/footer.php' ?>
<main class="page">
    <section class="clean-block features">
        <div class="container-fluid"> <!-- Changed to container-fluid for full-width layout -->
            <div class="block-heading">
                <h2 class="text-info text-center">Instagram Triop</h2> <!-- Center the heading -->
            </div>
<div class="container my-4">
    <div class="row">
        <?php foreach ($instagram as $code): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/<?= $code['link']; ?>/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> 
                        <a href="https://www.instagram.com/p/<?= $code['link']; ?>/?utm_source=ig_embed&amp;utm_campaign=loading" target="_blank">View this post on Instagram</a>
                    </div>
                </blockquote>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        </div>
        </main>

<script async src="//www.instagram.com/embed.js"></script>
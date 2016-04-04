<link href="<?= base_url('assets') .'/'.TEMPLATE?>/css/style-blogging.css" rel="stylesheet">
<div class="site-inner content-sidebar" style="margin-top:30px">
    <div class="wrap">
        <div class="content-sidebar-wrap">
            <main class="content" role="main">
                <article class="post type-post status-publish format-standard category-blog-writing entry">
                    <div class="entry-content">
                        <h2 class="entry-title">
                            <?= $page->title ?>
                        </h2>
                    </div>
                    <div class="entry-content">
                        <?= $page->content ?>
                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
<link href="<?= base_url('assets') .'/'.TEMPLATE?>/css/style-blogging.css" rel="stylesheet">
<div class="site-inner content-sidebar" style="margin-top:30px">
    <div class="wrap">
        <div class="content-sidebar-wrap">
            <main class="content" role="main">
                <article class="post type-post status-publish format-standard category-blog-writing entry">
                    <div class="entry-content">
                        <h2 class="entry-title">
                            <?= $post->title ?>
                            <small><br>by <a href="<?= base_url($author->uri) ?>"><?= $author->username ?></a></small>
                        </h2>
                        <p class="entry-meta" itemprop="text">
                            <span class="entry-comments-link"><a
                                    href="#">141
                                    Comments</a>
                            </span>
                            <span class="entry-comments-link pull-right"><a
                                    href="#">edit</a>
                            </span> |
                            <span class="entry-comments-link pull-right"><a
                                    href="#">delete</a>
                            </span>
                        </p>
                    </div>
                    <div class="entry-content">
                        <?= $post->content?>
                    </div>
                </article>
            </main>
            <aside class="sidebar sidebar-primary" style="background-color:white; width: 360px !important;" role="complementary"
                   itemscope="itemscope"
                   itemtype="http://schema.org/WPSideBar">
                <section id="popularitypostswidget-2" class="widget popularitypostswidget">
                    <div class="widget-wrap">
                        <h4 class="widget-title widgettitle"> Newest News</h4>
                    </div>
                </section>
                <section id="text-39" class="widget widget_text">
                    <div class="widget-wrap">
                        <div class="textwidget">
                        </div>
                    </div>
                </section>
                <section id="text-40" class="widget widget_text">
                    <div class="widget-wrap">
                    </div>
                </section>
            </aside>
        </div>
    </div>
</div>
<style type='text/css'>
    .gsc-input-box{
        height: 32px !important;
    }
    .cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2{
        width: 42px !important;
        height: 28px !important;
        padding: 6px 13px !important;
        margin-top: 1px !important;
    }
    .gsc-control-cse {
        font-family: Arial, sans-serif;
        border-color: #FFFFFF;
        background-color: #FFFFFF;
    }
    .gsc-control-cse .gsc-table-result {
        font-family: Arial, sans-serif;
    }
    input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus {
        border-color: #D9D9D9;
    }
    input.gsc-search-button, input.gsc-search-button:hover, input.gsc-search-button:focus {
        border-color: #666666;
        background-color: #CECECE;
        background-image: none;
        filter: none;

    }
    .gsc-tabHeader.gsc-tabhInactive {
        border-color: #FF9900;
        background-color: #FFFFFF;
    }
    .gsc-tabHeader.gsc-tabhActive {
        border-color: #E9E9E9;
        background-color: #E9E9E9;
        border-bottom-color: #FF9900
    }
    .gsc-tabsArea {
        border-color: #FF9900;
    }
    .gsc-webResult.gsc-result, .gsc-results .gsc-imageResult {
        border-color: #FFFFFF;
        background-color: #FFFFFF;
    }
    .gsc-webResult.gsc-result:hover, .gsc-imageResult:hover {
        border-color: #FFFFFF;
        background-color: #FFFFFF;
    }
    .gs-webResult.gs-result a.gs-title:link, .gs-webResult.gs-result a.gs-title:link b, .gs-imageResult a.gs-title:link, .gs-imageResult a.gs-title:link b  {
        color: #0000CC;
    }
    .gs-webResult.gs-result a.gs-title:visited, .gs-webResult.gs-result a.gs-title:visited b, .gs-imageResult a.gs-title:visited, .gs-imageResult a.gs-title:visited b {
        color: #0000CC;
    }
    .gs-webResult.gs-result a.gs-title:hover, .gs-webResult.gs-result a.gs-title:hover b, .gs-imageResult a.gs-title:hover, .gs-imageResult a.gs-title:hover b {
        color: #0000CC;
    }
    .gs-webResult.gs-result a.gs-title:active, .gs-webResult.gs-result a.gs-title:active b, .gs-imageResult a.gs-title:active, .gs-imageResult a.gs-title:active b {
        color: #0000CC;
    }
    .gsc-cursor-page {
        color: #0000CC;
    }
    a.gsc-trailing-more-results:link {
        color: #0000CC;
    }
    .gs-webResult .gs-snippet, .gs-imageResult .gs-snippet, .gs-fileFormatType {
        color: #000000;
    }
    .gs-webResult div.gs-visibleUrl, .gs-imageResult div.gs-visibleUrl {
        color: #008000;
    }
    .gs-webResult div.gs-visibleUrl-short {
        color: #008000;
    }
    .gs-webResult div.gs-visibleUrl-short  {
        display: none;
    }
    .gs-webResult div.gs-visibleUrl-long {
        display: block;
    }
    .gs-promotion div.gs-visibleUrl-short {
        display: none;
    }
    .gs-promotion div.gs-visibleUrl-long  {
        display: block;
    }
    .gsc-cursor-box {
        border-color: #FFFFFF;
    }
    .gsc-results .gsc-cursor-box .gsc-cursor-page {
        border-color: #E9E9E9;
        background-color: #FFFFFF;
        color: #0000CC;
    }
    .gsc-results .gsc-cursor-box .gsc-cursor-current-page {
        border-color: #FF9900;
        background-color: #FFFFFF;
        color: #0000CC;
    }
    .gsc-webResult.gsc-result.gsc-promotion {
        border-color: #336699;
        background-color: #FFFFFF;
    }
    .gsc-completion-title {
        color: #0000CC;
    }
    .gsc-completion-snippet {
        color: #000000;
    }
    .gs-promotion a.gs-title:link,.gs-promotion a.gs-title:link *,.gs-promotion .gs-snippet a:link  {
        color: #0000CC;
    }
    .gs-promotion a.gs-title:visited,.gs-promotion a.gs-title:visited *,.gs-promotion .gs-snippet a:visited {
        color: #0000CC;
    }
    .gs-promotion a.gs-title:hover,.gs-promotion a.gs-title:hover *,.gs-promotion .gs-snippet a:hover  {
        color: #0000CC;
    }
    .gs-promotion a.gs-title:active,.gs-promotion a.gs-title:active *,.gs-promotion .gs-snippet a:active {
        color: #0000CC;
    }
    .gs-promotion .gs-snippet, .gs-promotion .gs-title .gs-promotion-title-right, .gs-promotion .gs-title .gs-promotion-title-right * {
        color: #000000;
    }
    .gs-promotion .gs-visibleUrl,.gs-promotion .gs-visibleUrl-short  {
        color: #008000;
    }
</style>

<div id="section-post" class="section section-full" style="margin-top: 0px">
    <div class="container container-post">
        <div class="col-md-9 block-post">
            <div class="block-header">
                <h3><span><?=$post->post_type?></span></h3>
            </div>
            <div class="block-head">
                <h2 class="entry-title">
                    <?php echo $post->title ?>
                </h2>
                <?php if($editable){?>
<!--                    <span class="pull-right">-->
<!--                        <a href="#" style="float: right;">delete</a>-->
<!--                        <span style="float: right;"> &nbsp;  &nbsp; </span>-->
<!--                        <a href="#" style="float: right;">edit</a>-->
<!--                    </span>-->
                <?php }?>
            </div>
            <div class="section-more-full block-body">
                <div class="col-xs-3">
                    <div class="entry-content pull-right">
                        <img class="img img-responsive" width="150" src="<?php echo base_url($post->pict);?>">
                        <small>
                        <?php if($post->commentable){?>
                            <span class="entry-comments-link pull-right "><a href="#comments">
                                    <?php echo $post->comment_count ?> comments</a>
                            </span>
                        <?php }?>
                            <div style="width: 50px;">
                                <a href="<?php echo base_url($post->uri) ?>"><?php echo $post->username ?></a>
                            </div>
                        </small>
                    </div>
                </div>
                <article class="col-md-9 post">
                    <div class="entry-content">
                        <p><?php echo $post->content ?></p>
                    </div>
                </article>
                <?php if($post->commentable){?>
                <div class="col-md-12" style="padding-bottom: 40px; padding-left: 30px">
                    <div class="entry-comments" id="comments">
                        <h4>Comments</h4>
                        <ol class="comment-list">
                        </ol>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>

        <div class="col-md-3 block-side-post">
            <div>
                <script>
                    (function() {
                        var cx = '012670173870589121189:otzvyz1kvt8';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                            '//cse.google.com/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:search></gcse:search>
            </div>
            <div class="article-container sharable">
                <div class="block-header">
                    <h4><span>Featured Posts</span></h4>
                </div>
                <?php for ($i = 0; $i <= 2; $i++) {
                    $post = $featured[$i]?>
                    <article class="post short" id="<?=$post->permalink?>">
                        <div class="row">
                            <div class="col-md-5">
                                <p><a data-turbo-target="post-slider"
                                      href="<?=base_url($post->uri)?>">
                                        <img class="img img-responsive"
                                             src="<?php echo $post->thumbnail==""?"http://southasia.oneworld.net/ImageCatalog/no-image-icon/image":$post->thumbnail;?>">
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-7" style="padding-left: 0">
                                <h5 class="article-title" style="margin-top: 0">
                                    <a data-turbo-target="post-slider"
                                       href="<?=base_url($post->uri)?>"><?=$post->title?></a>
                                </h5>
                                <div style="overflow: hidden; height: 36px">
                                    <small><?=$post->preview?></small>
                                </div>
                                <footer>
                                    <small class="pull-right">
                                        <a class="article-category" href="<?=base_url($post->post_type)?>"><?=$post->post_type?></a>
                                    </small>
                                    <small class="article-byline"><?=$post->name?></small>
                                </footer>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
            <div class="article-container sharable">
                <?php for ($i = 3; $i <= 4; $i++) {
                    $post = $featured[$i]?>
                    <article class="post short" id="<?=$post->permalink?>">
                        <div class="row">
                            <div class="col-md-5">
                                <p><a data-turbo-target="post-slider"
                                      href="<?=base_url($post->uri)?>">
                                        <img class="img img-responsive"
                                             src="<?php echo $post->thumbnail==""?"http://southasia.oneworld.net/ImageCatalog/no-image-icon/image":$post->thumbnail;?>">
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-7" style="padding-left: 0">
                                <h5 class="article-title" style="margin-top: 0">
                                    <a data-turbo-target="post-slider"
                                       href="<?=base_url($post->uri)?>"><?=$post->title?></a>
                                </h5>
                                <div style="overflow: hidden; height: 36px">
                                    <small><?=$post->preview?></small>
                                </div>
                                <footer>
                                    <small class="pull-right">
                                        <a class="article-category" href="<?=base_url($post->post_type)?>"><?=$post->post_type?></a>
                                    </small>
                                    <small class="article-byline"><?=$post->name?></small>
                                </footer>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?=$loginmodal?>

<script>
    $(document).ready(function () {
        get_comments('#comments ol', <?=$post->post_id?>, 1, <?=$post->post_id?>);
        reply_comment('#comments ol', <?=$post->post_id?>, <?=$post->post_id?>);
    });

    function get_comments(selector, parent_id, depth, post_id) {
        $.ajax({
            url: "<?php echo base_url('comments/get_ajax')?>/" + parent_id,
            method: "post",
            data: {
                depth: depth,
                post_id: post_id
            },
            success: function (result) {
                $(selector).append(result);
            }
        })
    }

    function reply_comment(selector, parent_id, post_id) {
        $.ajax({
            url: "<?php echo base_url('comments/reply_ajax')?>",
            method: "post",
            data: {
                parent_id: parent_id,
                post_id: post_id
            },
            success: function (result) {
                $('.respond').remove();
                $(selector).first().append(result);
            }
        })
    }

    function reply_comment_submit(post_id) {
        $.ajax({
            url: "<?php echo base_url('comments/add/')?>/"+post_id,
            method: "post",
            data: $('#reply-form').serialize(),
            success: function (result) {
                if(result == 'Reply sukses'){
                    $('#comments ol').html('');
                    get_comments('#comments ol', <?=$post->post_id?>, 1, <?=$post->post_id?>);
                    reply_comment('#comments', <?=$post->post_id?>, <?=$post->post_id?>);
                } else {
                    if(result == "harap login terlebih dahulu"){
                        $('#showlogin').click();
                    } else
                    alert(result);
                }
            }
        })
    }

    function edit_comment(selector, comment_id) {
        $.ajax({
            url: "<?php echo base_url('comments/edit_ajax')?>",
            method: "post",
            data: {
                comment_id: comment_id
            },
            success: function (result) {
                $(selector).html(result);
            }
        })
    }

    function edit_comment_submit(comment_id) {
        $.ajax({
            url: "<?php echo base_url('comments/edit')?>/"+comment_id,
            method: "post",
            data: $('#edit-form-'+comment_id).serialize(),
            success: function (result) {
                if(result == 'Edit sukses'){
                    $('#comments ol').html('');
                    get_comments('#comments ol', <?=$post->post_id?>, 1, <?=$post->post_id?>);
                    reply_comment('#comments', <?=$post->post_id?>, <?=$post->post_id?>);
                } else {
                    alert(result);
                }
            }
        })
    }

    function delete_comment(selector, comment_id, post_id) {
        var r = confirm("Are you sure want to delete this comment?");
        if(r){
            $.ajax({
                url: "<?php echo base_url('comments/delete_ajax')?>/"+post_id,
                method: "post",
                data: {
                    comment_id: comment_id
                },
                success: function (result) {
                    if(result = "Comment deleted!"){
                        $(selector).remove();
                    } else
                        alert(result);
                }
            });
        }
    }
</script>
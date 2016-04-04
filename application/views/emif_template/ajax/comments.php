<?php foreach ($comments as $comment) { ?>
    <li class="comment even depth-<?= $depth>3?3:$depth; echo $comment->user_id?' byuser':''?>" id="comment-<?=$comment->comment_id?>">
        <article itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments" id="article-<?=$comment->comment_id?>">
            <div class="row">
                <div class="col-md-1 col-xs-2">
                    <img alt="<?= $comment->username ?>-img" src="<?=base_url($comment->pict)?>"
                         style="width:<?=$depth==1?"64":"48" ?>px">
                </div>
                <span itemprop="name" class="col-md-9 col-xs-9">
                    <?php if($this->mpermissions->get($this->session->userdata('role_id'), 'comment', 'update-all') ||
                        ($this->mpermissions->get($this->session->userdata('role_id'), 'comment', 'update-all') && $this->session->userdata('user_id') == $comment->user_id)){ ?>
                        <a rel="nofollow" class="comment-reply-link pull-right"  href="#comment-<?=$comment->comment_id?>"
                           onclick="delete_comment('#comment-<?=$comment->comment_id?>', <?=$comment->comment_id?>, <?=$post_id?>)"
                           aria-label="Delete Comment">Delete &nbsp; </a>
                        <a rel="nofollow" class="comment-reply-link pull-right" href="#article-<?=$comment->comment_id?>"
                           onclick="edit_comment('#article-<?=$comment->comment_id?>', <?=$comment->comment_id?>)"
                           aria-label="Edit Comment">Edit &nbsp; </a>
                    <?php } ?>
                    <b><a href="<?=base_url($comment->uri_user)!=''?base_url($comment->uri_user):($comment->website!=''?$comment->website:"mailto:".$comment->email) ?>"
                       class="comment-author-link"
                       rel="external nofollow" itemprop="url"><?=$comment->name ?></a></b>
                    <br>
                    <?= $comment->content ?>
                    <div class="comment-reply">
                        <small>
                        <a rel="nofollow" class="comment-reply-link" href="#respond"
                           onclick="reply_comment('#comment-<?=$comment->comment_id?> ul', <?=$comment->comment_id?>, <?=$post_id?>)"
                           aria-label="Reply to all">Reply</a>
                        </small>
                    </div>
                </span>
                <div class="col-md-2 col-xs-1" </div>
            </div>
        </article>
        <ul class="children">
            <?php if($comment->comment_count){?>
                <script>
                    get_comments('#comment-<?=$comment->comment_id?> ul', <?=$comment->comment_id?>, <?= $depth+1?>, <?=$post_id?>);
                </script>
            <?php }?>
        </ul>
        <!-- .children -->
    </li>
<?php } ?>
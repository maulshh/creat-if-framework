<li class="respond comment even comment-respond">
    <article itemprop="comment">
        <p class="comment-author">
            <div class="row">
                <div class="col-md-1 col-xs-2">
                    <img alt="<?= $this->session->userdata('username') ?>-img"
                         src="<?php $pict = $this->session->userdata('pict'); echo base_url($pict!=''?$pict:'assets/images/users/default.jpg') ?>"
                         style="width:48px">
                </div>
                <span itemprop="name" class="col-md-8 col-xs-9">
                    <form id="reply-form">
                        <input name="title" value="" type="hidden">
                        <input name="public" value="1" type="hidden">
                        <input name="status" value="published" type="hidden">
                        <input id="author" name="name" value="<?= $user->name; ?>" type="hidden">
                        <input name="parent_id" value="<?= $parent_id ?>" type="hidden">
                        <input id="email" name="email" value="<?= $user->email; ?>" type="hidden">

                        <p class="comment-form-comment">
                            <textarea id="comment" name="content" cols="45" rows="3" aria-required="true"
                                      required="required" class="form-control"></textarea>
                        </p>
                        <p class="form-submit">
                            <input id="submit" class="btn standard bordered" value="Post Comment" type="button"
                                   onclick="reply_comment_submit(<?= $post_id ?>)">
                        </p>
                    </form>
                </span>
                <div class="col-md-3 col-xs-1"> </div>
            </div>
        </p>
    </article>
</li>
<!-- #comment-## -->
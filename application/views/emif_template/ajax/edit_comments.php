<div id="edit-<?=$comment->comment_id?>" class="comment-respond">
    <h5 id="reply-title" class="comment-reply-title">Edit a Reply
        <small><a rel="nofollow" id="cancel-comment-reply-link"
                  href="#comment-<?=$comment->comment_id?>"
                  style="">Cancel edit</a></small>
    </h5>
    <form action="<?= base_url('comments/edit/'.$comment->comment_id) ?>"
        method="post" id="edit-form-<?=$comment->comment_id?>" class="comment-form" novalidate="">
        <p class="comment-form-comment"><label for="comment">Comment</label> <textarea
                id="comment" name="content" cols="45" rows="3" aria-required="true"
                required="required">
                <?=$comment->content?>
            </textarea>
        </p>

        <p class="form-submit">
            <input id="submit" class="submit" value="Edit Comment" type="button"
                   onclick="edit_comment_submit(<?=$comment->comment_id?>)">
        </p>
    </form>
</div>
<!-- #comment-## -->
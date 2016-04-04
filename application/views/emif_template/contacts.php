<style>
    .site-form{
        background-color: rgba(189, 189, 189, 0.100);
        margin: 0px;
        padding: 20px;
        border: solid rgba(104, 104, 104, 0.100) 1px;
    }
</style>

<div id="section-agenda" class="section section-full" style="margin-top: 0px">
    <div class="container">
        <div class="col-md-10 block-beasiswa col-md-offset-1">
            <div class="block-header">
                <h3><span></span></h3>
            </div>
            <div class="section-full block-body agenda">
                <article class="">
                    <div class="entry-content">
                        <h1><?=$page->title ?></h1>
                    </div>
                    <div class="entry-content">
                        <?=$page->content ?>
                    </div>
                    <br><br>
                    <div class="content">
                    <form id="reply-form" action="" method="post">
                        <div class="row">
                            <div class="col-md-8 site-form">
                                <?php $user = $this->musers->get($this->session->userdata('user_id')?$this->session->userdata('user_id'):-1);?>
                                <div class="form-group">
                                    <label>Ajukan Pertanyaan?</label>
                                    <input name="title" value="" type="text" class="form-control" required="required"
                                        placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" placeholder="Sampaikan pertanyaan, masukan maupun uneg-unegmu.."
                                              name="content" class="form-control" required="required"></textarea>
                                </div>
                                <div class="form-group col-xs-7">
                                    <div class="checkbox">
                                        <label>
                                            <input name="public" value="1" type="checkbox">
                                            Ingin kiriman ini dapat dilihat orang lain?
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn bordered standard pull-right" id="submit-comment">Sumbit</button>
                                <input name="status" value="unverified" type="hidden">
                                <input name="name" value="<?=$user->name ?>" type="hidden">
                                <input name="parent_id" value="<?=$page->page_id?>" type="hidden">
                                <input name="email" value="<?=$user->email ?>" type="hidden">
                                <div id="result"></div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <hr>
                        <div class="entry-comments" id="comments">
                            <h4>Saran & pertanyaan publik</h4>
                            <ul class="comment-list">
                            </ul>
                        </div>
                        <br><br>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<?=$loginmodal?>

<script>
    $(document).ready(function () {
        get_comments('#comments ul', <?=$page->page_id?>, 1, <?=$page->page_id?>);
    });

    function get_comments(selector, parent_id, depth, post_id) {
        $.ajax({
            url: "<?= base_url('comments/get_ajax')?>/" + parent_id,
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

    $('#submit-comment').click(function(){
        $.ajax({
            url: "<?= base_url('comments/add/'.$page->page_id)?>/0",
            method: "post",
            data: $('#reply-form').serialize(),
            success: function (result) {
                if(result == 'Reply sukses'){
                    $('#result').html("<span class='text-green'>Kiriman anda sedang menunggu moderasi dari admin, harap lihat balasan pada complaints akun anda</span>");
                } else if(result == "harap login terlebih dahulu"){
                    $('#showlogin').click();
                } else $('#result').html("<code>"+result+"</code>");
            }
        })
    });
</script>
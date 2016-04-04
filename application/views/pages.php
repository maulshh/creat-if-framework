<?php //print_r($all)?>
<style>
    .preview{
        background-color: rgba(185, 185, 185, 0.100);
        height:52px;
        width:300px;
        padding:2px;
        border: solid rgba(96, 96, 96, 0.100) 1px;
    }
</style>
<div class='row'>
    <div class='col-md-12'>
        <div class='box box-primary collapsed-box'>
            <div class='box-header'>
                <h3 class='box-title'><span id="page-title"></span> Pages</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm" onclick="add_page()" title="Add a New Page"><i class="fa fa-plus"></i></button>
                    <button style="display: none;" data-widget='collapse' id="plus" data-toggle="tooltip"></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <form method="post" action="<?= base_url('pages/add')?>" id="form-page">
                <div class='box-body pad'>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input name="title" id="page_1" type="text" class="input-lg form-control" placeholder="Enter title here..">
                            </div>
                            <div class="form-group" id="permalink">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><?= base_url()?></span>
                                    <input class="form-control input-sm" id="page_2" type="text" name="uri" placeholder="permalink here">
                                </div>
                            </div>
                            <textarea id="page_3" name="content" rows="15" cols="80"></textarea>
                        </div>
                        <div class="col-md-3">
                            <h4>Settings</h4>
                            <p>
                                <label>Status : </label>
                                &nbsp; <span id="status" class="text-red">not saved yet</span>
                            </p>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="commentable" id="page_4" value="1">
                                    Commentable
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>View File Name</label>
                                    <input type="text" id="page_5" class="form-control" name="view" placeholder="e.g: view_page">
                                </div>
                                <div class="form-group">
                                    <label>Cover</label>
                                    <input type="text" id="page_6" class="form-control" name="cover" placeholder="optional: assets/cover.jpg">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Posting pages</label>
                                <div class="form-group">
                                    <select class="form-control input-post" id="page_7" name="post_category">
                                        <option value="0">No Posts</option>
                                        <?php
                                        foreach($post_types as $post_type){
                                            echo "<option value='$post_type->post_type_id'>$post_type->post_type</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="submit" name="status" class="btn btn-primary pull-right" value="Publish">
                            <span class="pull-right"> &nbsp;</span>
                            <input type="submit" name="status" class="btn btn-primary pull-right" value="Save as Draft">
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.box -->
        <div class='box box-solid'>
            <div class="box-header">
            </div>
            <div class='box-body table-responsive'>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover" id="data-pages">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Commentable</th>
                                <th>View</th>
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($all as $page){ ?>
                                <tr>
                                    <td><a href="<?= base_url($page->uri)?>"><?= $page->title?></a></td>
                                    <td><?= $page->uri?></td>
                                    <td><?= $page->commentable?
                                            '<span class="text-green"><i class="fa fa-check"></i></span>':
                                            '<span class="text-red"><i class="fa fa-times"></i></span>'?></td>
                                    <td><?= $page->view?></td>
                                    <td><?= $page->cover?></td>
                                    <td width="100px">
                                        <div class="btn-group">
                                            <?php $kirim = $page->page_id.'~'.$page->title.'~'.$page->uri.'~'.$page->content.'~'.$page->commentable.'~'.$page->view.'~'.$page->cover?>
                                            <a class="btn btn-info" title="edit" href="#page-title" onclick="edit_page('<?= $page->page_id?>')"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-primary" title="delete" onclick="delete_page('<?= $page->page_id ?>')"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./row -->

<script src="<?= base_url('assets');?>/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function(){
        $('#data-pages').dataTable({
        });
        CKEDITOR.replace('page_3');
    });
    var opened = false;

    //@todo tambahkan autosave juga

    function add_page(){
        $("#page-title").text("Add");
        $('#form-page').attr('action', '<?= base_url("pages/add")?>');
        $("#page_1").val('');
        $("#page_2").val('');
        CKEDITOR.instances.page_3.setData('');
        $("#page_4").removeAttr('checked');
        $("#page_5").val('');
        $("#page_6").val('');
        if(!opened)
            $('#plus').click();
        opened = true;
    }

    function edit_page(id){
        //@todo gunakan ajax biar lebih responsive
        $("#page-title").text("Edit");
        $.ajax({
            url: "<?= base_url('pages/get_ajax')?>/"+id,
            success:function(result){
                if(result != '[]'){
                    result= JSON.parse(result);
                    $("#page_1").val(result.title);
                    $("#page_2").val(result.uri);
                    CKEDITOR.instances.page_3.setData(result.content);
                    if(result.commentable)
                        $("#page_4").attr('checked', 'checked');
                    else
                        $("#page_4").removeAttr('checked');
                    $("#page_5").val(result.view);
                    $("#page_6").val(result.cover);
                    $("#page_7").val(result.post_category);
                    $('#form-page').attr('action', '<?= base_url("pages/edit")?>/'+id);
                    if(!opened)
                        $('#plus').click();
                    opened = true;
                } else {
                    alert("page not found, or you're not eligible to edit it.");
                }
            }
        });
    }

    function delete_page(id){
        //@todo gunakan ajax biar lebih responsive
        var r = confirm("Page akan dihapus Anda yakin?\n jangan lupa untuk menghapus menu page");
        if(r)
            window.location = "<?= base_url('pages/delete')?>/"+id;
    }
</script>
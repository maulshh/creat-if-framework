<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Type Post Settings</h3>
            </div>
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" onclick="create()"><i class="fa fa-file"></i> &nbsp; Create New</button>
                        <hr>
                        <div class="col-md-12">
                            <table class="table table-stripped hover">
                                <tr>
                                    <th>Post Type</th>
                                    <th>Content Type</th>
                                    <th>Comment allowed</th>
                                    <th>Tag allowed</th>
                                    <th>Rate allowed</th>
                                    <th>File View</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                foreach($all as $type){?>
                                    <tr>
                                        <td><?= $type->post_type?></td>
                                        <td><?= $type->content_type?></td>
                                        <td><?= $type->commentable?
                                                '<span class="text-green"><i class="fa fa-check"></i></span>':
                                                '<span class="text-red"><i class="fa fa-times"></i></span>'?></td>
                                        <td><?= $type->taggable?
                                                '<span class="text-green"><i class="fa fa-check"></i></span>':
                                                '<span class="text-red"><i class="fa fa-times"></i></span>'?></td>
                                        <td><?= $type->rateable?
                                                '<span class="text-green"><i class="fa fa-check"></i></span>':
                                                '<span class="text-red"><i class="fa fa-times"></i></span>'?></td>
                                        <td><?= $type->view?></td>
                                        <td>
                                            <?php $data = $type->post_type_id.'~'.$type->post_type.'~'.$type->content_type.'~'.$type->commentable.'~'.$type->taggable.'~'.$type->rateable.'~'.$type->view;?>
                                            <div class="btn-group">
                                                <a class="btn btn-default" onclick="edit('<?= $data?>')" href="#edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-default" onclick="hapus('<?= $type->post_type_id?>')" href="#remove"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>

<div title="Create New" class="col-md-12" id="form-tambah">
    <form id="form-post-type" method="post" action="<?= base_url('post_types/add')?>">
        <br>
        <div class="col-md-4">
            Post Type
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input class="form-control" id="input-1" type="hidden" name="post_lama">
                <input class="form-control" id="input1" type="text" name="post_type">
            </div>
        </div>
        <div class="col-md-4">
            Content Type
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <select class="form-control" id="input2" name="content_type">
                    <option value="Long Post">Long Post</option>
                    <option value="Post and Image">Post and Image</option>
                    <option value="Quote">Quote</option>
                    <option value="Short Post">Short Post</option>
                </select>
            </div>
        </div><div class="col-md-4">
            File View
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input class="form-control" id="input6" type="text" name="view">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <input id="input3" type="checkbox" name="commentable" value="1">
                &nbsp; Comment allowed
            </div>
            <div class="col-md-4">
                <input id="input4" type="checkbox" name="taggable" value="1">
                &nbsp; Tag allowed
            </div>
            <div class="col-md-4">
                <input id="input5" type="checkbox" name="rateable" value="1">
                &nbsp; Rate allowed
            </div>
        </div>
        <div class="col-md-12">
            <br>
            <input type="submit" class="btn btn-primary pull-right" id="input" value="Submit">
        </div>
    </form>
</div>

<script>
    $("#form-tambah").dialog({
        autoOpen : false,
        height : 340,
        width : 600,
        modal : true
    });

    //----------------functions--------------

    function create(){
        $('#input-1').attr('disabled','disabled');
        $('#input1').val('');
        $('#input2').val('');
        $('#input3').removeAttr('checked');
        $('#input4').removeAttr('checked');
        $('#input5').removeAttr('checked');
        $('#input6').val('');
        $("#form-post-type").attr("action", "<?= base_url('post_types/add');?>");
        $("#form-tambah").dialog("open");
    }

    function edit(data){
        data = data.split('~');
        alert(data)
        $('#input-1').removeAttr('disabled');
        $('#input-1').val(data[1]);
        $('#input1').val(data[1]);
        $('#input2').val(data[2]);
        if(data[3] == '1') $('#input3').attr('checked', 'checked');
        else $('#input3').removeAttr('checked');
        if(data[4] == '1') $('#input4').attr('checked', 'checked');
        else $('#input4').removeAttr('checked');
        if(data[5] == '1') $('#input5').attr('checked', 'checked');
        else $('#input5').removeAttr('checked');
        $('#input6').val(data[6]);
        $("#form-post-type").attr("action", "<?= base_url('post_types/edit');?>/"+data[0]);
        $("#form-tambah").dialog("open");
    }
    function hapus(id){
        var r = confirm("Every post with this type will also deleted. Are you sure?");
        if(r)
            window.location = "<?= base_url('post_types/delete')?>/"+id;
    }
</script>
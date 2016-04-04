<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular-sanitize.js" type="text/javascript"></script>
<?php //print_r($all)?>
<style>
    .preview {
        overflow: auto;
        background-color: rgba(185, 185, 185, 0.100);
        height: 52px;
        width: 300px;
        padding: 2px;
        border: solid rgba(96, 96, 96, 0.100) 1px;
    }
</style>
<div class='row' id="MainCtrl" ng-app="app"  ng-controller="MainCtrl">
    <div class='col-md-12'>
        <div class='box box-primary collapsed-box'>
            <div class='box-header'>
                <h3 class='box-title'><span id="post-title"> </span> Posts</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm" title="Add a New Post" onclick="add_post()"><i class="fa fa-plus"></i></button>
                    <button style="display: none;" data-widget='collapse' id="plus" data-toggle="tooltip"></button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <form method="post" action="<?= base_url('posts/add') ?>" id="form-post">
                <div class='box-body pad'>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input name="title" type="text" id="post_1" class="input-lg form-control input-post"
                                       placeholder="Enter title here..">
                            </div>
                            <div class="form-group input-post" id="permalink">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><?= base_url('permalink') ?></span>
                                    <input class="form-control input-sm" id="post_2" type="text" name="permalink"
                                           placeholder="permalink here">
                                    <span class="input-group-addon" id="addon_permalink"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea id="post_3" class="input-post form-control" name="content" rows="20" cols="80"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Preview Text</label>
                                <textarea id="post_4" class="input-post form-control" name="preview" rows="2" cols="80"></textarea>
                            </div>
                            <input name="post_type_id" type="hidden" value="<?= $post_type->post_type_id ?>">
                        </div>
                        <div class="col-md-3">
                            <h4>Settings</h4>
                            <div class="col-md-6">
                                <div class="checkbox row">
                                    <label>
                                        <input type="checkbox" class="input-post" id="post_5" value="1"
                                               name="commentable" <?= $post_type->commentable ? "checked='checked'" : "disabled='disabled'" ?>>
                                        Commentable
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkbox row">
                                    <label>
                                        <input type="checkbox" class="input-post" id="post_9" value="1" name="featured">
                                        Featured
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Publicity</label>
                                <div class="form-group">
                                    <select class="form-control input-post" id="post_6" name="public">
                                        <option value="1">Public</option>
                                        <option value="0">Private</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="<?php if(!$post_type->taggable) echo 'display:none;'?>">
                                <label>Add Tags</label>

                                <div class="input-group input-group-sm">
                                    <input type="text" id="tags" class="form-control" name="tags"
                                           placeholder="tags, ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" onclick="submit_tags()" id="tags-btn"
                                                disabled="disabled" type="button">Add
                                        </button>
                                    </span>
                                </div>
                                <sub><i>separate by commas</i></sub>
                            </div>
                            <div id="tag"></div>

                            <div class="form-group">
                                <label>Thumbnail</label>
                                <a data-toggle="modal" data-target="#modalupload" href="#"><button value="1" class="pull-right badge upload-btn">image uploader</button></a>
                                <img ng-src="{{thumbnail == ''?'http://southasia.oneworld.net/ImageCatalog/no-image-icon/image':thumbnail}}" alt="thumbnail" width="80" class="img img-responsive">
                                <div class="form-group">
                                    <input class="form-control input-post" placeholder="http://photo.com/image.jpg" ng-model="thumbnail">
                                    <input id="post_7" name="thumbnail" type="hidden" value="{{thumbnail}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Cover Image</label>
                                <a data-toggle="modal" data-target="#modalupload" href="#"><button value="2" class="pull-right badge upload-btn">image uploader</button></a>
                                <div ng-bind-html="cover == ''?'':('<a href=\'' + cover + '\' target=\'_blank\' title=\'click to see image\'>cover image</a>')"></div>
                                <input class="form-control input-post" placeholder="http://photo.com/image.jpg" ng-model="cover">
                                <input id="post_8" name="cover" type="hidden" value="{{cover}}">
                            </div>
                            <div class="form-group">
                                <label>Custom Field</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="maybe date or anything.." id="post_10" name="note" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Subtype</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="" id="post_11" name="subtype" type="text">
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
        </div>
        <!-- /.box -->
        <div class='box box-solid'>
            <div class="box-header">
            </div>
            <div class='box-body table-responsive'>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover" id="data-posts">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Preview</th>
                                <th>Author</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Preview</th>
                                <th>Author</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col-->
    <?=$upload?>
</div><!-- ./row -->


<script src="<?= base_url('assets'); ?>/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function () {
        $('#data-posts').dataTable({
            "processing": true,
            "serverSide": true,
//            "ajax": "<?= base_url('posts/data_posts/'.$post_type->post_type_id)?>",
            "ajax": "<?= base_url('datatable/post')?>?post=<?= $post_type->post_type_id?>",
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        if (row[6] == 'published')
                            var color = "bg-green";
                        else
                            var color = "bg-orange";
                        if (row[10] == 1){
                            var color2 = "bg-olive";
                            var publicity = "public";
                        }
                        else{
                            var color2 = "bg-navy";
                            var publicity = "private";
                        }
                        return "" +
                            "<a href='<?= base_url()?>" + row[8] + "'>" +
                            data +
                            "</a> " +
                            "<small class='label " + color + "'>" + row[6] + "</small>" +
                            " <small class='label " + color2 + "'>" + publicity + "</small>" +
                            "<div class='pull-right' style='padding: 21px 6px 6px 6px;'>" +
                            "<a href='#' onclick='edit_post(" +
                            row[9] +
                            ")'>edit</a>" +
                            " <a href='#' onclick='delete_post(" +
                            row[9] +
                            ")'>delete</a>" +
                            "</div>";
                    },
                    "targets": 0
                },
                {
                    "render": function (data) {
                        return "<div class='preview'>" + data + "</div>";
                    },
                    "targets": 1
                },
                {
                    "render": function (data, type, row) {
                        return "<a href='<?= base_url()?>" + row[7] + "'>" + data + "</a>";
                    },
                    "targets": 2
                },
                {
                    "bSearchable": false,
                    "render": function (data) {
                        var str = '';
                        if (data != null) {
                            var tags = data.split(', ');
                            for (var i = 0; i < tags.length; i++) {
                                str += "<a href='<?= base_url('posts/tags')?>/" + tags[i] + "'>" + tags[i] + "</a>, ";
                            }
                        }
                        str += '-';
                        return str;
                    },
                    "targets": 3
                },
                {
                    "render": function (data, type, row) {
                        if(row[11] == 0){
                            data = "not available";
                        }
                        return data;
                    },
                    "targets": 4
                },
                {
                    "render": function (data) {
                        if (data != null) {
                            data = data.split(',')
                            if (data.length < 2 || data[0] == data[1])
                                var stat = 'Created : <br>';
                            else
                                var stat = 'Modified : <br>';
                            return stat + data[0];
                        }
                        return data;
                    },
                    "targets": 5
                },
                {"visible": false, "targets": [6, 7, 8, 9, 10, 11]}
            ]
        });
        CKEDITOR.replace('post_3');

        var available = true;

        $("#post_2").change(function(){
            $.ajax({
                url: "<?= base_url('posts/ajax')?>",
                method: "post",
                data: {
                    query: "permalink from posts where permalink = '" + $(this).val() +"'"
                },
                success: function(result){
                    if(result == "[]"){
                        available = true;
                        $("#addon_permalink").html("<i class='text-green fa fa-check'></i>");
                    } else {
                        available = false;
                        $("#addon_permalink").html("<i class='text-red fa fa-times'></i>");
                    }
                }
            });
        });

        var save_countdown = 10;
        var saved = false;

        $(".input-post").change(function(){
            //@todo, after 10 sec idle, autosave post that have been changed
            //if haven't saved at all, save it first
            //when update, saved changed to true
            //if idle less than 10 sec, countdown cancelled
        });
    });

    var opened = false;

    function add_post(){
        $("#post-title").text("Add New");
        $('#form-post').attr('action', '<?= base_url("posts/add")?>');
        $("#post_1").val('');
        $("#post_2").val('');
        CKEDITOR.instances.post_3.setData('');
        $("#post_4").val('');
        $("#post_6").val('');
        angular.element($('#MainCtrl')).scope().set_thumb(1, '');
        angular.element($('#MainCtrl')).scope().set_thumb(2, '');
        angular.element($('#MainCtrl')).scope().$apply();
        $("#post_9").removeAttr('checked');
        $("#post_10").val('');
        $("#post_11").val('');
        $("#tag").html('');
        $("#tags-btn").attr('disabled', 'disabled');
        if(!opened)
            $('#plus').click();
        opened = true;
    }

    function edit_post(id){
        $("#post-title").text("Edit");
        $.ajax({
            url: "<?= base_url('posts/get_ajax')?>/"+id,
            success:function(result){
                if(result != '[]'){
                    result= JSON.parse(result);
                    $("#post_1").val(result.title);
                    $("#post_2").val(result.permalink);
                    CKEDITOR.instances.post_3.setData(result.content);
                    $("#post_4").val(result.preview);
                    if(result.commentable)
                        $("#post_5").attr('checked', 'checked');
                    else
                        $("#post_5").removeAttr('checked');
                    $("#post_6").val(result.public);
                    angular.element($('#MainCtrl')).scope().set_thumb(1, result.thumbnail);
                    angular.element($('#MainCtrl')).scope().set_thumb(2, result.cover);
                    angular.element($('#MainCtrl')).scope().$apply();
                    if(result.featured)
                        $("#post_9").attr('checked', 'checked');
                    else
                        $("#post_9").removeAttr('checked');
                    $("#post_10").val(result.note);
                    $("#post_11").val(result.subtype);
                    $("#tags-btn").attr('onclick', 'submit_tags('+id+')');
                    $("#tags-btn").removeAttr('disabled');
                    var str = '<b>';
                    if (result.tags != null) {
                        var tags = result.tags.split(', ');
                        for (var i = 0; i < tags.length; i++) {
                            str += tags[i] +
                                " <a href='#' onclick='hapus_tag(" +  id + ', "' + tags[i] + '"' + ")'>" +
                                "<small class='badge bg-olive' style='font-size:9px'>x</small>" +
                                "</a> ";
                        }
                    }
                    str += '</b>';
                    $("#tag").html(str);
                    $('#form-post').attr('action', '<?= base_url("posts/edit")?>/'+id);
                    if(!opened)
                        $('#plus').click();
                    opened = true;
                } else {
                    alert("post not found, or you're not eligible to edit it.");
                }
            }
        });
    }

    function delete_post(id){
        //@todo gunakan ajax biar lebih responsive
        var r = confirm("This post with all the comments will be deleted. Are you sure?");
        if(r)
            window.location = "<?= base_url('posts/delete')?>/"+id;
    }

    function submit_tags(id) {
        $.ajax({
            url: "<?= base_url('posts/add_tags')?>",
            method: "POST",
            data: {
                id: id,
                tags: $('#tags').val()
            },
            success:function(result){
                result= JSON.parse(result);
                var str = '<b>';
                if (result.tags != null) {
                    var tags = result.tags.split(', ');
                    for (var i = 0; i < tags.length; i++) {
                        str += tags[i] +
                            " <a href='#' onclick='hapus_tag(" +  id + ', "' + tags[i] + '"' + ")'>" +
                            "<small class='badge bg-olive' style='font-size:9px'>x</small>" +
                            "</a> ";
                    }
                }
                str += '</b>';
                $("#tag").html(str);
            }
        });
    }

    function hapus_tag(id, tag) {
        $.ajax({
            url: "<?= base_url('posts/del_tag')?>",
            method: "POST",
            data: {
                id: id,
                tag: tag
            },
            success:function(result){
                result= JSON.parse(result);
                var str = '<b>';
                if (result.tags != null) {
                    var tags = result.tags.split(', ');
                    for (var i = 0; i < tags.length; i++) {
                        str += tags[i] +
                            " <a href='#' onclick='hapus_tag(" +  id + ', "' + tags[i] + '"' + ")'>" +
                            "<small class='badge bg-olive' style='font-size:9px'>x</small>" +
                            "</a> ";
                    }
                }
                str += '</b>';
                $("#tag").html(str);
            }
        });
    }

    //------------------------------------------
    var count = 1;

    $('.upload-btn').click(function(){
        count = $(this).val();
    });

    function upload(){
        angular.element($('#MainCtrl')).scope().set_thumb(count, 'upload');
        angular.element($('#MainCtrl')).scope().$apply();
    }

    angular.module('app', []).controller('MainCtrl', function($scope) {
        $scope.set_thumb = function(count, val) {
            if(val == false)
                val = '';
            if(val == 'false')
                val = '';
            if(val == 'upload')
                val = this.path + '/' + this.saveas + ".jpg";
            if(count == 1)
                this.thumbnail = val;
            else
                this.cover = val;
        };
        $scope.thumbnail = '';
        $scope.path = "<?=base_url($path)?>";
        $scope.saveas = '';
        $scope.cover = '';
    });
</script>

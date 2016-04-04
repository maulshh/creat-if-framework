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
        <div class='box box-solid'>
            <div class="box-header">
            </div>
            <div class='box-body table-responsive'>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover" id="data-comments">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th>Parent</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th>Parent</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./row -->

<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function(){
        $('#data-comments').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?= base_url('datatable/complaint')?>",
            "columnDefs": [
                {
                    "render": function( data, type, row ) {
                        if(row[6] == 'published')
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
                        return "<a href='<?=base_url()?>" + row[9] + "'>" + data + "</a> " +
                            "<small class='label "+color+"'>"+row[6]+"</small> "+
                            "<small class='label "+color2+"'>"+publicity+"</small>";
                    },
                    "targets": 0
                },
                {
                    "render": function( data, type, row ) {
                        dot = data.length>80?'...':'';
                        return "<div class='preview'>"+data.substr(0,80) + dot +"</div>";
                    },
                    "targets": 1
                },
                {
                    "render": function( data, type, row ) {
                        return "<a href='<?=base_url()?>"+row[7]+"'>"+data+"</a>";
                    },
                    "targets": 2
                },
                {
                    "render": function( data, type, row ) {
                        return "<a href='<?=base_url()?>"+row[5]+"'>"+data+"</a>";
                    },
                    "targets": 3
                },
                {
                    "render": function( data, type, row ) {
                        if (data != null) {
                            data = data.split(',')
                            if(data.length < 2 || data[0] == data[1])
                                var stat = 'Created : <br>';
                            else
                                var stat = 'Modified : <br>';
                            return stat+data[0];
                        }
                        return data;
                    },
                    "targets": 4
                },
                {
                    "render": function( data, type, row ) {
                        var str = '<div class="btn-group">';
                        if(row[6] != 'published' && row[10] == 1){
                            str += '<button class="btn btn-success" title="verify" onclick="verify_comment('+row[8]+')"><i class="fa fa-check"></i></button>';
                        }
                        str +='<a class="btn btn-info" title="reply" href="#data-comments" onclick="reply_comment()"><i class="fa fa-reply"></i></a>'+
                            '<button class="btn btn-primary" title="delete" onclick="delete_comment('+row[8]+')"><i class="fa fa-times"></i></button>'+
                            '</div>';
                        return str;
                    },
                    "targets": 5
                },
                { "visible": false,  "targets": [6, 7, 8, 9, 10]}
            ]
        });
    });

    function verify_comment(comment_id){
        $.ajax({
            url: "<?= base_url('comments/edit')?>/"+comment_id,
            method: "post",
            data: {
                status : "published"
            },
            success: function (result) {
                if(result == 'Edit sukses'){

                } else {
                    alert(result);
                }
            }
        })
    }

    function reply_comment(){

    }

    function delete_comment(comment_id){
        var r = confirm("Are you sure want to delete this comment?");
        if(r){
            $.ajax({
                url: "<?= base_url('comments/delete_ajax/45')?>/",
                method: "post",
                data: {
                    comment_id: comment_id
                },
                success: function (result) {
                    if(result = "Comment deleted!"){
                    } else
                        alert(result);
                }
            });
        }
    }
</script>

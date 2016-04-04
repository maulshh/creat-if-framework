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
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th>Parent</th>
                                <th>Date</th>
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
            "ajax": "<?= base_url('datatable/comment')?>",
            "columnDefs": [
                {
                    "render": function( data, type, row ) {
                        if(row[6] == 'published')
                            var color = "bg-green";
                        else
                            var color = "bg-orange";
                        return "<a href='<?=base_url()?>" + row[9] + "'>" + data + "</a> " +
                            "<small class='label "+color+"'>"+row[6]+"</small>";
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
                        data = data==""?"a comment":data;
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
                { "visible": false,  "targets": [0, 5, 6, 7, 8, 9, 10] }
            ]
        });
    });
</script>

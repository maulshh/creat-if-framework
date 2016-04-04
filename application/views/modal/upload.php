<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Upload
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="upload-form">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <input type="file" name="image_field" id="file" title="pilih file dari komputer anda">
                            <p class="help-block">pilih file dari komputer anda</p>
                        </div>
                        <button class="btn btn-lg btn-github" type="submit"><i class="fa fa-upload"> </i> Upload</button>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <input name="path" id="path" type="hidden" value="<?=$path?>">
                                <input name="allowed_types" type="hidden" value="<?=$types?>">
                                <label>Save as</label>
                                <input name="name" required="required" type="hidden" onchange="" value="{{saveas}}">
                                <div class="input-group">
                                    <input class="form-control" ng-model="saveas" required="required" type="text" placeholder="nama_file">
                                    <span class="input-group-addon">.jpg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#upload-form')
        .submit(function(e){
            $.ajax({
                url: '<?= base_url('dashboard/upload_image/1')?>',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result){
                    if(result != ''){
                        alert(result);
                    }
                    if (typeof upload === "function") {
                        upload();
                    }
                }
            });
            e.preventDefault();
        });
</script>

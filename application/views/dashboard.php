<style>
    .site-form{
        background-color: rgba(189, 189, 189, 0.100);
        margin: 0px;
        padding: 10px;
        border: solid rgba(104, 104, 104, 0.100) 1px;
    }
    .site-body{
        min-height: 440px;
    }
</style>
<div class="row">
    <div class="col-md-5">
        <div class="box box-solid site-body">
            <div class="box-body">
                <?php if (isset($success_message) && $success_message) { echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$success_message.'</div>'; }  ?>
                <?php if (isset($message) && $message) { echo '<div class="alert alert-dismissable alert-primary"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>'; }  ?>
                <div class="row site-form">
                    <form enctype="multipart/form-data" method="post" action="dashboard/upload_image">
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <input type="file" size="32" name="image_field" title="pilih file dari komputer anda" value="">
                                <p class="help-block">pilih file dari komputer anda</p>
                            </div>
                            <button class="btn btn-lg btn-github" type="submit"><i class="fa fa-upload"> </i> Upload</button>
                            <div class="col-xs-12">
                                <label>Save as</label>
                                <div class="input-group">
                                    <input name="name" required="required" type="text" class="form-control" value="">
                                    <span class="input-group-addon">.jpg</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
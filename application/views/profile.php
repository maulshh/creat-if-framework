<style>
    .site-form{
        background-color: rgba(189, 189, 189, 0.100);
        border: solid rgba(104, 104, 104, 0.100) 1px;
        padding: 20px;
    }
    .site-body{
        padding:20px;
        min-height: 440px;
    }
    .right{
        margin-left: 3%;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body site-body">
                <div class="row">
                    <div class="col-xs-4 col-md-3">
                        <img class="img img-responsive" src="<?= base_url($profile->pict)?>" alt="foto-profile">
                        <br>
                        <?php if($editable){ ?>
                            <center><a data-toggle="modal" data-target="#modalupload" href="#foto">ubah foto profil</a></center>
                        <?php }?>
                    </div>
                    <div class="col-xs-7 col-md-8 right site-form">
                        <?php if($editable){?>
                        <form method="post" action="<?= base_url('users/edit/'.$profile->user_id)?>">
                            <?php }?>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" value="<?= $profile->username?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="pull-right">
                                        <?php if($editable){ ?>
                                        <br>
                                        <a data-toggle="modal" data-target="#modalpass" href="#chpass">ubah password</a>
                                        <?php }?>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" type="text" name="name" value="<?= $profile->name?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="email" value="<?= $profile->email?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No Telp</label>
                                    <input class="form-control" type="text" name="no_telp" value="<?= $profile->no_telp?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Posisi</label>
                                    <p class="form-control" ><?= $profile->role_name?></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <p class="form-control <?= $profile->status=='active'?'text-green':'text-red'?>"><?= $profile->status?></p>
                                </div>
                                <?php if($editable){ ?>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-edit"></i> Edit</button>
                                    </div>
                                <?php }?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Upload
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/change_pict')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="user_id" value="<?= $profile->user_id?>">
                        <div class="form-group col-md-8">
                            <input type="file" name="file" title="pilih file dari komputer anda">
                            <p class="help-block">pilih file dari komputer anda</p>
                        </div>
                        <button class="btn btn-lg btn-github" type="submit"><i class="fa fa-upload"> </i> Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <form action="<?= base_url('users/change_pass')?>" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Ubah Password
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="user_id" value="<?= $profile->user_id?>">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="old-pass">
                            <br>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Retype Password</label>
                            <input type="password" class="form-control" name="re-pass">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-github pull-right" type="submit"> </i> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
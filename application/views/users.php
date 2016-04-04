<?php //print_r($users);?>
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
                <h3 class='box-title'>Add Users</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm" title="Add a New User" onclick="add_user()"><i class="fa fa-plus"></i></button>
                    <button style="display: none;" data-widget='collapse' id="plus" data-toggle="tooltip"></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <form method="post" id="form-user" action="<?= base_url('users/add')?>">
                <div class='box-body pad'>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Username <small>(required)</small></label>
                                <input type="text" class="form-control" name="username" id="user_1">
                            </div>
                            <div class="form-group">
                                <label>Email <small>(required)</small></label>
                                <input type="text" class="form-control" name="email" id="user_2">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name" id="user_3">
                            </div>
                            <div class="form-group">
                                <label>Password <small>(required)</small></label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="form-group">
                                <label>Retype Password <small>(required)</small></label>
                                <input type="password" class="form-control" name="re-pass">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="user_5">
                                    <option value="active" selected="selected">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="banned">Banned</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <div class="form-group">
                                    <select class="form-control" name="role_id" id="user_4">
                                        <option value="3" selected="selected">User Biasa</option>
                                        <option value="2">User Lumayan</option>
                                        <option value="1">User Sangar</option>
                                    </select>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label>Send Password?</label>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="send">-->
<!--                                        Send this password to the new user by email.</label>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit">
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
                        <table class="table table-stripped table-hover" id="data-posts">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user){?>
                                <tr>
                                    <td style="min-width:150px !important;">
                                        <div>
                                            <div class="pull-left" style="padding:4px; min-width:54px;"><img alt="foto" src="<?= base_url($user->pict)?>" class="img img-thumbnail" style="height:48px; width:48px"></div>
                                            <div style="padding: 2px 6px 6px 6px; font-weight:bold;"><a href="<?= base_url($user->uri)?>"><?= $user->username?></a></div>
                                        </div>
                                        <div>
                                            <?php $kirim = "$user->user_id~$user->username~$user->email~$user->name~$user->role_id~$user->status";?>
                                            <a href="<?= base_url($user->uri)?>">edit</a> - <a href="#delete" onclick="delete_user('<?= $user->user_id?>')">remove</a>
                                        </div>
                                    </td>
                                    <td><?= $user->name?></td>
                                    <td><?= $user->role_name?></td>
                                    <td><a href="mailto:<?= $user->email?>"><?= $user->email?></a></td>
                                    <td min-width="100px">
                                        <?= $user->status?>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
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
        $('#data-posts').dataTable();
    });

    function add_user(){
        $('#form-user').attr('action', '<?= base_url("users/add")?>');
        $('#user_1').val('');
        $('#user_2').val('');
        $('#user_3').val('');
        $('#user_5').val('active');
        $('#user_4').val('3');
        $('#plus').click();
    }

    function delete_user(id){
        if(confirm('Apakah anda yakin?'))
            window.location.assign('<?= base_url("users/delete");?>/' + id);
    }
</script>

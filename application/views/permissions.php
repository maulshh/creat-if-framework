<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pengaturan Permission</h3>
            </div>
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#form-tambah"><i class="fa fa-file"></i> &nbsp; Create New
                            Permission
                        </button>
                        <hr>
                        <div class="col-md-12">
                            <table class="table table-stripped hover">
                                <tr>
                                    <th>Module</th>
                                    <?php foreach ($type as $a) {
                                        echo "<th>$a->role_name</th>";
                                    } ?>
                                    <th></th>
                                    <?php
                                    $per = '';
                                    $count = count($type) + 1;
                                    foreach ($all as $permission){
                                    if ($per != $permission->module){
                                    $per = $permission->module;
                                    while ($count < count($type) + 1){
                                    ++$count ?>
                                    -</td>
                                    <td>
                                        <?php }
                                        $count = 1; ?>
                                </tr>
                                <tr>
                                    <th><?= $per ?></th>
                                    <td>
                                        <?php }
                                        while ($count < $permission->role_id){
                                        ++$count;
                                        ?>
                                        -
                                    </td>
                                    <td>
                                        <?php }
                                        echo $permission->permission ?> <a href="#remove"
                                                                           onclick="hapus('<?= $permission->permission_id ?>')"><i
                                                class="fa fa-times"></i></a> |
                                        <?php
                                        if ($count != $permission->role_id) {
                                            echo "</td><td>";
                                            ++$count;
                                        }
                                        }
                                        while ($count < count($type) + 1){
                                        ++$count; ?>
                                        -
                                    </td>
                                    <td>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="form-tambah" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width:540px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                Buat Permission Baru
            </div>
            <form id="form-permission" method="post" action="<?= base_url('permissions/add') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            Module
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" id="input1" type="text" name="module">
                        </div>
                        <div class="col-md-4">
                            Role
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" id="input2" name="role_id">
                                <?php foreach ($type as $a) {
                                    echo "<option value='$a->role_id'>$a->role_name</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Permission
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" id="input3" type="text" name="permission">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary pull-right" id="input" value="Buat Baru">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function hapus(id) {
        var r = confirm("Are you sure?");
        if (r)
            window.location = "<?= base_url('permissions/delete')?>/" + id;
    }
</script>
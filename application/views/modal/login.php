<input data-toggle="modal" data-target="#modallogin" id="showlogin" type="hidden">
<div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                &nbsp;
            </div>
            <div class="modal-body">
                <body class="login-post">
                <div class="login-box">
                    <div class="login-logo">
                        <?= SITE_NAME?>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <p class="login-box-msg">Sign in untuk masuk ke dalam Sistem</p>
                        <form id="form-login">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="email" placeholder="Username"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="pass" placeholder="Password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div id="notice"></div>
                        <div class="row">
                            <div class="col-xs-4 pull-right">
                                <button type="button" id="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                            </div><!-- /.col -->
                        </div>
                        </form>
                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" class="init">
$("#login").click(function(){
    $.ajax({
        url: "<?= base_url('login/login_auth/1');?>",
        data: $("#form-login").serialize(),
        method: "post",
        success:function(result){
            $('#notice').html(result);
            if(result == "Anda telah masuk kedalam sistem<br><br>"){
                location.reload();
            }
        }
    });
});
</script>
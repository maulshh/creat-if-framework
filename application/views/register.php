<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE?> | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url('assets');?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url('assets');?>/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('assets')?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets')?>/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the post via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="col-md-12" style="background-color: rgba(185, 185, 185, 0.100)">
    <form action="<?= base_url('login/signup')?>" method="post">
        <div class="row">
            <div class="col-md-7" style="margin-left:20%; width: 60%">
                <br>
                <h1>
                    Registrasi Akun.
                </h1>
                <p>Data berikut ini wajib diisi dengan benar dan sesuai dengan kartu identitas yang masih
                    berlaku. Gunakanlah alamat email yang sering Anda gunakan.</p>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Username
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="text" name="username" id="input" class="form-control" value="<?php if(isset($data)) echo $data["username"]?>" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Nama Lengkap
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="text" name="name" id="input" class="form-control" value="<?php if(isset($data)) echo $data["name"]?>" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Alamat Email<br>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="email" name="email" id="input" class="form-control" value="<?php if(isset($data)) echo $data["email"]?>" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Konfirmasi Alamat Email<br>
                        <small>Masukkan ulang alamat email anda</small>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="email" name="re_email" id="input" class="form-control" value="<?php if(isset($data)) echo $data["re_email"]?>" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Pengaturan Password
                    </div>
                    <div class="col-md-7">
                        <div style="background-color: white;">
                            <ul>
                                <li>Terdiri dari minimal 8 karakter</li>
                                <li>Minimal sebuah angka</li>
                                <li>Minimal sebuah huruf kecil</li>
                                <li>Minimal sebuah huruf kapital</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Password
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="password" name="password" id="input" class="form-control" value="" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="col-md-5 text">
                        Konfirmasi Password<br>
                        <small>Masukkan Ulang Password Anda</small><br><br>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <input type="password" name="re_password" id="input" class="form-control" value="" required="required" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" required="required">
                            Saya bersedia mengikuti syarat dan ketentuan yang berlaku
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <span><?= $notice==""?"":"$notice";?></span>
                    <div class="pull-right"><br>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
                    </div>
                </div>
                <div class="col-md-12"><br>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
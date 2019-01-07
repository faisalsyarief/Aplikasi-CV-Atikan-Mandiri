<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="<?php echo base_url();?>aset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>aset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/css/style.css" rel="stylesheet">
  </head>
  <body class="gray-bg">
  <div class="page-header container">
    <h1>Pendaftaran User Baru</h1>
  </div>
    <div class="col-md-11">
       <?=form_open_multipart('register',['class'=>'form-horizontal'])?>
       <?php $error = form_error("name", "<p class='text-danger'>", '</p>'); ?>
         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
         	<label class="col-sm-2 control-label">Nama Lengkap</label>
            <div class="col-sm-10">
            <?php if(!empty($userData['name'])) { ?>
              <input type="text" class="form-control" name="name" value="<?= $userData['name'] ?>">
            <?php }else{ ?>
              <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>">
            <?php } ?>
            <?php echo $error; ?>
            </div>
          </div>
          
          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
            <?php if(!empty($userData['email'])) { ?>
              <input type="email" class="form-control" name="email" value="<?= $userData['email'] ?>">
            <?php }else{ ?>
              <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
            <?php } ?>
            <?php echo $error; ?>
            </div>
          </div>
          
          <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
              <?php echo $error; ?>
            </div>
          </div>
          
          <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>">
              <?php echo $error; ?>
            </div>
          </div>

          <?php $error = form_error("alamat", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat') ?>">
              <?php echo $error; ?>
            </div>
          </div>          
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary pull-right">Daftar</button>
              <?=anchor(base_url(),'Kembali',['class'=>'btn btn-default'])?>
            </div>
          </div>
        </form>
    </body>
</html>
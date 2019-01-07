<!DOCTYPE html>
<html>


<!-- Site: HackForums.Ru | E-mail: abuse@hackforums.ru | Skype: h2osancho -->
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

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h1 class="font-bold">CV ATIKAN MANDIRI</h1>

                <p>
                    Silahkan Login.
                </p>

                <p>
                    Pastikan Annda Sudah Daftar.
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <?php
                        $message = $this->session->flashdata('error');
                            if($message){
                                echo '<div class="text-center alert alert-danger">' .$message. '</div>';
                    } ?>

                        <?=form_open('login',['class'=>'form-horizontal'])?>
                        <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="">
                            <?php echo $error; ?>
                        </div>

                        <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                            <?php echo $error; ?>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary block full-width m-b">Login</button>
                        <a href="<?php echo base_url();?>index.php/Register" class="btn btn-info">Daftar Agen</a>      
                        <?=anchor('https://accounts.google.com/signin/oauth?client_id=1093905424350-7l86v9kp2do47tt1af8q4kb0k3tehmp6.apps.googleusercontent.com&as=bfqza-PzGXeigHsu1WG6uD9l6CyJUuPyAJHMc6e40hzcr9uVOtY4Zclr_AUL6v0WkgFBE5ivR2rzw2gZwrbGu1jhOaNn88cK9hqJBIHS0GcSoGZIhPEiaLL-UL8JFngGEqMcpRWHM8OPwd1sdT5oveJSWJoB4Hya5RCFWdLNIJA&destination=http://localhost&approval_state=!ChRDdVJnSm0tMnUzam9SLVZEa0dGWBIfODJuTldQYzR5MDRZVU9xWmlfQjdtUi1VTzlQQUZoWQ%E2%88%99ACThZt4AAAAAWnswBKHv2_J0rS3m97caPVYI61duteSo&xsrfsig=AHgIfE_6JBDQos9XKaAdAro3_P-TDF7pQg','Login with Google',['class'=>'btn btn-danger'])?>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                CV ATIKAN MANDIRI
            </div>
            <div class="col-md-6 text-right">
               <small>© 2018</small>
            </div>
        </div>
    </div>

</body>


<!-- Site: HackForums.Ru | E-mail: abuse@hackforums.ru | Skype: h2osancho -->
</html>
<?php if($this->session->userdata('log') == '1') {
    redirect(base_url().'admin/home');
} ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login Form</title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href='<?php echo base_url();?>admin-css/login.css'>
    <style type="text/css"><!--
        .error { border:2px solid red; }
        #error { color:red;}
        --></style>
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script>
        var siteurl ="<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url();?>admin-js/custom.js'></script>
</head>
<body>
<section class="container">

    <?php if($this->session->flashdata('login') != null){?>
        <div class="message_error">
            <?php echo $this->session->flashdata('login');?>
        </div>
    <?php }?>
    <?php if($this->session->flashdata('msg') != null){?>
        <div class="message_success">
            <?php echo $this->session->flashdata('msg');?>
        </div>
    <?php }?>


    <div class="login">
        <h1>Login</h1>
        <form method="post" action='<?php echo base_url();?>admin/adminlogin' id="login">
            <p><input type="text" name="user_email" value="" placeholder="Admin Email"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p class="remember_me" >
            <div id="resp"><p id="error"></p></div>
            </p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
    </div>
</body>
</html>

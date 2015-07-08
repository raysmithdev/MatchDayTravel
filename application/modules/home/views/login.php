<?php
    if($this->session->userdata('user_id') != '')
    {
        redirect(base_url());
    }
?>
<?php include "common/application_top.php"; ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
	<!-- Breadcrumb and title -->
	<section id="bc-t">
		<div class="container">
            <style>
                .label_width{
                    width: 120px;
                }
            </style>
		
		</div>
	</section>
    <!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="club">
		<div class="container">
		   <br/>
            <div class="tab">Login</div>
			<!-- POST -->
			<article class="club-post">
				<div class="club-content">
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
					<div class="img-wrap col-3">
					</div>
				     <form method="post" action="<?php echo base_url();?>index.php/home/login" class="form-signin" role="form">
                      
                        <label class="label_width">Email address</label><input type="email" name="email" class="form-control" placeholder="Email address" required autofocus><br/>
                         <label class="label_width">Password</label><input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                            <div class="checkbox">
                                <input type="checkbox" value="remember-me"><label>Remember me</label>
                            </div>
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" style="color: #000000;">Sign in</button><br /><p>
                         <a href="<?= $fbUrl ?>"><img src="<?php echo base_url();?>images/facebook_login.jpg" style="width:200px;"/></a></p>
                    </form>
                    <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div>
                <div>    <a id="forget" style="display: none; color: #000">Forget Password?</a></div>
             <div id="forgot" style="display: none;">
                        <form method="post" action="<?php echo base_url();?>index.php/home/forget_password">
                            <label class="label_width">Email address</label><input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                            <button class="btn btn-lg btn-primary btn-block" id="fadein_submit" type="submit" style="color: #000000;">Submit</button>
                            <button class="btn btn-lg btn-primary btn-block" id="fadeout_cancel" type="submit" style="color: #000000;">Cancel</button>
                        </form>
                    </div>
                    <br/>
					</div>
				</div>
			</article>
		</div>
	</section>
<?php include "common/application_bottom.php";?>
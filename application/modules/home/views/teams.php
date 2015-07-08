<?php include "common/application_top.php"; ?>
	<!-- Breadcrumb and title -->
	<section id="bc-t">
		<div class="container">
            <style>
                .label_width{
                    width: 120px;
                }
            </style>
		
		<h1>Team</h1>
		</div>
	</section>
    <!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="club">
		<div class="container">
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
				     <form method="post" action="<?php echo base_url();?>index.php/home/create_team" class="form-signin" role="form">
                        <h2 style="color: #000000">Create Team</h2>
                        <label class="label_width">Name</label><input type="text" name="t_name" class="form-control" placeholder="Team Name" required autofocus><br/>
                        <label class="label_width">Address</label><input type="text" name="t_address" class="form-control" placeholder="Team Address" required autofocus><br/>
                        <label class="label_width">Post Code</label><input type="text" name="t_postcode" class="form-control" placeholder="Team Post Code" required><br/>
                        <label class="label_width">Divion</label><input type="text" name="t_division" class="form-control" placeholder="Team Divion" required><br/>
                        <label class="label_width"></label>
                        <?php if($this->session->userdata('user_id') != null){?>
                         <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" style="color: #000000;">Create<button>
                        <?php } else{ ?>
                        <a href="<?php echo base_url();?>home/pg_login"><button class="btn btn-lg btn-primary btn-block"  type="button" style="color: #000000;">Please Login<button></a>
                        <?php } ?>
                    </form>
                    </div>
                    <br/>
					</div>
				</div>
			</article>
		</div>
	</section>
    <script type="text/javascript">
        $("form").validate();
    </script>
<?php include "common/application_bottom.php";?>
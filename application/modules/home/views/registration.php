<?php
    if($this->session->userdata('user_id') != '')
    {
        redirect(base_url());
    }
?>
<style>
    .label_width{
        width: 120px;
    }
</style>

<?php include "common/application_top.php";?>
	<!-- Breadcrumb and title -->
	<section id="bc-t">
	
	</section>
    <!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="club">
   
		<div class="container">
		      <br/>
            <div class="tab">Register</div>
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
					<div class="img-wrap col-3"></div>
               
				        <form class="form-signin"  method="post" action="<?php echo base_url();?>index.php/home/registration" role="form">
                            <label class="label_width">First name</label>
                            <input type="text" name="fname" class="form-control" placeholder="First name" required autofocus><br/>
                            <label class="label_width">Last name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last name" required=""><br/>
                               <label class="label_width">Your Team</label>
                             <select class="form-control" name="team" required>
                            <?php
                         //   $fixture_detail = fixture_all_detail();
                            
                             if(!empty($teams)){
                             
                              foreach($teams as $rows){
                              ?>
                                <option value="<?php echo $rows->id;?>"><?php echo $rows->name;?></option>
                            <?php }}else{?>
                                <option>No teams found</option>
                            <?php }?>


                        </select><br />
                            <label class="label_width">Date Of Birth</label>
                            <input type="text" name="dob" id="dob" class="form-control" placeholder="Data of Birth" required><br/>
                            <label class="label_width">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required><br/>
                            <label class="label_width">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                            <label class="label_width">Retype Password</label>
                            <input type="password" name="retype" class="form-control" placeholder="Retype Password" required><br/>
                            <label class="label_width"></label>
                            <input type="submit" value="Submit" name="submit">
                        </form>
					</div>
				</div>
			</article>
			
		</div>
	</section>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript">
    $("#dob").datepicker();
</script>
<script type="text/javascript">
    $("form").validate();
</script>
<?php include "common/application_bottom.php";?>
<?php include "common/application_top.php"; ?>
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

            <br/><br/><br/><br/>
            <div class="tab">Facebook Registration</div>
            <!-- POST -->
            <article class="club-post">
                <div class="club-content">
                    <div class="img-wrap col-3">
                    </div>
                    
                    <form method="post" action="<?php echo base_url();?>index.php/home/set_password"  class="form-signin" role="form">
                        <label class="label_width">Your Team</label>
                             <select class="form-control" id="team" name="team" required>
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
                        <label class="label_width">New Password</label><input type="password" name="new_pass"  class="form-control"  id="new_pass" placeholder="Your New Password" required/><br />
                        <label class="label_width">Retype Password</label><input type="password" name="Conf_pass"   class="form-control" id="new_pass" placeholder="Retype Password" required/><br />
                        <input type="submit" value="Submit" />
                    </form>
                    <br/>
                    <br/>
                </div>
                <br/>
        </div>
        </div>
        </article>
        </div>
    </section>
    <script src="<?= base_url(); ?>js/jquery.js"></script>
    <script src="<?= base_url(); ?>js/jquery.datetimepicker.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <script>
        $('#date').datetimepicker({
            dayOfWeekStart : 1,
            lang:'en',
            startDate:	'1986/01/05'
        });
    </script>
    <link rel="stylesheet" href="<?= base_url() ?>js/jquery.datetimepicker.css">
<?php include "common/application_bottom.php";?>
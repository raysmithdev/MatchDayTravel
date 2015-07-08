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
            <div class="tab">FIXTURES</div>
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
                    <form method="post" action="<?php echo base_url();?>index.php/home/fixture_insert" class="form-signin" role="form">
                        <h2 style="color: #000000">Create Fixture</h2>
                        <label class="label_width">Home Team</label>
                        <select class="form-control" name="home_team">
                            <?php if(!empty($fixture_detail)){?>
                            <?php foreach($fixture_detail as $rows){?>
                                <option value="<?php echo $rows->id;?>"><?php echo $rows->name;?></option>
                            <?php }}else{?>
                                <option>No Record Found</option>
                            <?php }?>


                        </select>
                        <br/>
                        <label class="label_width">Away Team</label>
                        <select class="form-control" name="away_team">
                            <?php if(!empty($fixture_detail)){?>
                                <?php foreach($fixture_detail as $rows){?>
                                    <option value="<?php echo $rows->id;?>"><?php echo $rows->name;?></option>
                                <?php }}else{?>
                                <option>No Record Found</option>
                            <?php }?>
                        </select>

                        <br/>
                        <label class="label_width">Date</label>
                        <input type="text" name="date" id="date" class="form-control date" placeholder="Date" required>
                        <br/>
                        <label class="label_width"></label>

                        <?php if($this->session->userdata('user_id') != null){?>
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" style="color: #000000;">Create<button>
                                <?php } else{ ?>
                                    <a href="<?php echo base_url();?>index.php/home/pg_login"><button class="btn btn-lg btn-primary btn-block"  type="button" style="color: #000000;">Please Login<button></a>
                                <?php } ?>

                    </form>
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

    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script>
        $('#date').datetimepicker({
            dayOfWeekStart : 1,
            lang:'en',
            startDate:	'1986/01/05'
        });
    </script>
    <link rel="stylesheet" href="<?= base_url() ?>js/jquery.datetimepicker.css">
<?php include "common/application_bottom.php";?>
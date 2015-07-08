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
            <br/>
            <div class="tab">Search Journeys</div>
			<!-- POST -->
			<article class="club-post">
				<div class="club-content">
                    <?php if($this->session->flashdata('search_error') != null){?>
                        <div class="message_error">
                            <?php echo $this->session->flashdata('search_error');?>
                        </div>
                    <?php }?>
                    <?php if($this->session->flashdata('msg') != null){?>
                        <div class="message_success">
                            <?php echo $this->session->flashdata('msg');?>
                        </div>
                        <br/>
                        <br/>
                    <?php }?>
                    <br/>
					<div class="img-wrap col-3">
					</div>
               



                    <div class="row">
                        <div class="col12 r-box-n">
                            <?php if(!empty($lastest_journey)){?>
                    
                                <article>
                                    <h3>This page is coming soon</h3>
                                </article>
                            <?php }?>
                        </div>
                    </div>
                </div>
                    <br/>
					</div>
				</div>
			</article>
		</div>
	</section>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $("#search_date").datepicker({ changeMonth: true,changeYear: true});
    </script>
<?php include "common/application_bottom.php";?>
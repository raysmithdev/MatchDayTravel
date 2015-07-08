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
    <br/>
    <br/>
    <section id="club">
		<div class="container">
			<!-- POST -->
            <div class="tab">View Journey</div>
            <div class="row">
                <div class="col12 r-box-n">
                    <?php if(!empty($teams)){?>
<!--                        --><?php //$lastest_journey = array_chunk( $lastest_journey,3)[0] ?>
                        <?php foreach($teams as $row){?>
                            <article>
                                <h3><a href="#"><?php echo $row->user_fname;?>just offered a Journey from <?php echo $row->From;?> to <?php echo $row->to;?></a></h3>
                                <p><?php echo $row->desc;?></p>
                                <span class="date-n"><?php echo date('d M', strtotime($row->create_date));?></span>
                            </article>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
	</div>

	</section>
<?php include "common/application_bottom.php";?>
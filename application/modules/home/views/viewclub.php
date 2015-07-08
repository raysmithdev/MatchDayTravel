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
			                        <?php foreach($teamdetail as $row){?>

            <div class="tab"><?php echo $row->name; ?></div>
            
            <div class="row">
                <div class="col12 r-box-n">
              <?php echo "<p style=\"color:#000000\">More details coming soon</p>"; }  ?>
                </div>
            </div>
            
	</div>

	</section>
<?php include "common/application_bottom.php";?>
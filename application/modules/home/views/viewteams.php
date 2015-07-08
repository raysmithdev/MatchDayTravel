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
            <div class="tab"><?php echo $division; ?></div>
            <div class="row">
                <div class="col12 r-box-n">
                
                	<div class="v-club">
				<ul class="clearfix">
				    
                    <?php  if(!empty($divteams)){?>
         
                            <?php foreach($divteams as $row){?>
                                <li><span><a class="text-left" href="<?php echo base_url();?>index.php/home/viewclub?id=<?php echo $row->id; ?>"><?php echo $row->name; ?></a></span></li>
                        <?php }?>
                    <?php }else{?>
                        <li><span class="text-right">No Record Found</span></li>
                    <?php }?>
				</ul>
			</div>
			
			
            </div>
	</div>

	</section>
<?php include "common/application_bottom.php";?>
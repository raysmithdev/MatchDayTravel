<?php include "common/application_top.php";?>
    <!-- Header Section. If need a menu section, use tag: <nav> -->
	<div class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img src="<?php echo base_url();?>css/images/slider.jpg" alt=""/>
					<div class="caption"><div class="container">
					<h1><span>Going to an Away Game?</span> Share or Find Your Travel</h1>
					
					</div></div>
				</li>
				<li>
					<img src="<?php echo base_url();?>css/images/slider2.jpg" alt=""/>
					<div class="caption"><div class="container">
					<h1><span>Save on Fuel</span> Share The Cost</h1>
				
					</div></div>
				</li>
				<li>
					<img src="<?php echo base_url();?>css/images/slider3.jpg" alt=""/>
					<div class="caption"><div class="container">
					<h1><span>Don't Travel alone</span>Make Friends and Find Fellow Fans</h1>
			
					</div></div>
				</li>
			</ul>
		</div>
	</div>

<!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="m-a-n">

	<div class="container">
		<div class="col-8">
			<div class="tab">Latest Fixtures</div>

			<div class="a-games">
				<ul class="clearfix">
				    
                    <?php  if(!empty($lastest_fixture)){?>
         
                        <?php foreach($lastest_fixture as $row){?>
                            <li><span class="text-right"><?php echo $row->hometeam;?></span><span class="d-g"><?php echo $row->date_created;?></span><span class="text-left"><?php echo $row->awayteam;?></span></li>
                        <?php }?>
                    <?php }else{?>
                        <li><span class="text-right">No Record Found</span></li>
                    <?php }?>
				</ul>
			</div>
		</div>

		<div class="col-4">
			<div class="tab">Just added</div>
			<div class="tab-small"><a href="<?= base_url()."index.php/home/alljourneys" ?>">see all journeys</a></div>
			<div class="r-box-n">

            <?php if(!empty($lastest_journey)){?>
                <?php $i = 0; ?>
                <?php foreach($lastest_journey as $row){
                    $i++;
                    if($i==3){
                        break;
                    }
                    ?>
				<article>
					<h3><a href="#"><?php echo $row->user_fname;?> just offered a Journey from <?php echo $row->From;?> to <?php echo $row->to;?></a></h3>
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
	
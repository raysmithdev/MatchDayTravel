<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AwayFromHome.co - Find Travel to Away Days</title>
    <meta name="description" content="HTML framework description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/general.css">
	<!-- Google fonts -->
	<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic%7COswald:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.multipage.css">

    <!-- Modernizr -->
    <script type='text/javascript' src='<?php echo base_url();?>js/libs/modernizr-2.5.3.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.multipage.js'></script>
    <!-- Semantic HTML5 Support on old IE -->
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53952514-1', 'auto');
  ga('send', 'pageview');

</script>


<script>
    $(document).ready(function(){


        $("#fadein_submit").click(function(){
            $("p").show();
        });
    });
</script>
</head>
<body>
    <header>
		<div class="top">
			<div class="container">
				<div class="col-12">
				  <div class="col-2">
					
				  </div>
					<nav id="top-menu">
						<ul class="clearfix">
							<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
							<li><a href="<?php echo base_url();?>index.php/home/search">Search</a></li>
						
							<li class="dropdown"><a href="#clubs.html">Clubs</a>
								<ul class="dropdown-menu">
								
								 <?php if(!empty($divisions)){?>
                            <?php foreach($divisions as $rows){?>
							<li><a href="<?php echo base_url();?>index.php/home/viewteams?division=<?php echo $rows->division_id; ?>"><?php echo $rows->division_name; ?></a></li>
                            <? } } ?>
								
								</ul>
							</li>

                            <li class="dropdown"><a href="#">Journeys</a>
                                <ul class="dropdown-menu">
                                  <?php if($this->session->userdata('user_type') == "2"){?>
                                    <li><a href="<?php echo base_url();?>index.php/home/team">Create Team</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/home/fixture">Create Fixtures</a></li>
                                    <? } ?>
                                     <li><a href="<?php echo base_url();?>index.php/home/alljourneys">All Journeys</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/home/post_journey">Post a journey</a></li>

                                </ul>
                            </li>
					
						</ul>

					</nav>
                    <nav class="mobilemenu">
                        <select>
                            <option value="index.html">Home</option>
                            <option value="#search.html">Search</option>
                            <option value="#post.html">Offer</option>
                            <option value="#clubs.html">Clubs</option>


                            <option value="#contact.html">Contact</option>
                        </select>
                    </nav>

					<div class="login">

                        <?php if($this->session->userdata('user_id') == null){?>
						<a href="<?php echo base_url();?>index.php/home/pg_login">
                            <span id="icon-user">
                                <i class="fa fa-user"></i>log in</span>
                        </a>

                        <a href="<?php echo base_url();?>index.php/home/pg_reg"><span>register</span></a>
                        <?php }else{?>
                            <a href="<?php echo base_url();?>index.php/home/logout">
                            <span id="icon-user">
                                <i class="fa fa-user"></i>logout</span>
                            </a>
                        <?php }?>
					</div>

				</div>
			</div>
		</div>

    </header>
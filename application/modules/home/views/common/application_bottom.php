    <footer>
		<div class="container">
			<div class="col-2"></div>
			<div class="col-6">
				<p>Away-Days.co.uk was founded by fans to help make the process of finding and offering lifts to away games a more enjoyable experience. We hope by using our free of charge service you will enjoy an excellent day out and meet like minded fans. </p>
			<div class="col-4">
				<div class="social-icon">
					<ul id="social">
						<li><a href="index.html#"><img src="<?php echo base_url();?>css/images/soc-twitter.png" alt=""/></a></li>
						<li><a href="index.html#"><img src="<?php echo base_url();?>css/images/soc-facebook.png" alt=""/></a></li>
						<li><a href="index.html#"><img src="<?php echo base_url();?>css/images/soc-g.png" alt=""/></a></li>
						<li><a href="index.html#"><img src="<?php echo base_url();?>css/images/soc-play.png" alt=""/></a></li>
					</ul>
				</div>
			</div><div class="col-6"><p class="copyright">© 2014  - All Rights Reserved </p></div>
			</div>
			<div class="col-4">
			<h3>Information</h3>
				<ul >
					<li><a href="#contact.html">Contact</a></li>
					

				</ul>
			</div>
			
		</div>
    </footer>

    <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap-responsive.min.css"/>
    <!-- Libs -->
    <script src="<?= base_url() ?>js/libs/jquery-1.10.2.min.js"></script>
    <script type='text/javascript' src='<?= base_url() ?>js/libs/jquery.flexslider-min.js'></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="<?= base_url() ?>js/jquery.bxslider.min.js"></script>

    <!-- Custom -->
    <script src="<?= base_url() ?>js/scripts.js"></script>
    <script src="<?= base_url() ?>js/bootstrap-tab.js"></script>
    <script src="<?= base_url() ?>js/jquery.validate.min.js"></script>
    
        <script type="text/javascript" src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>

     <link rel="stylesheet"  href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css" />

    <script>
        $(document).ready(function(){
   
       
            $("input:password").keypress(function(){
                var passwordRegex = '/^[a-z0-9_-]{6,18}$/';
                var inputVal = $(this).val();
                if (this.value.match(passwordRegex)) {
                    this.value = this.value.replace(passwordRegex, '');
                }
            });
            $("input:password").keyup(function(){
                var passwordRegex = '/^[a-z0-9_-]{6,18}$/';
                var inputVal = $(this).val();
                if (this.value.match(passwordRegex)) {
                    this.value = this.value.replace(passwordRegex, '');
                }
            });
            
     
        });
    </script>
    <script>
        $('#addDistance a').click(function(){
            $('.showing').show();
            $(this).hide();
            $('#addCustomPostCodes a').css('top','15px');
        });

        $('#fixture').change(function(){
            var away = $(this).find(':selected').attr('data-away');
            var home = $(this).find(':selected').attr('data-home');
            var date = $(this).find(':selected').attr('data-date');
            // console.log(away+'------'+home);

            $('#leavingTo').val(home);
            $('#leavingFrom').val(away);
            $('#fixtureDate').val(date);
        });
    </script>
</body>
</html>
<?php 

include "includes/application_top.php";

?>
	<!-- Breadcrumb and title -->
	<section id="bc-t">
		<div class="container">
	
		
		<h1>Login</h1>
		</div>
	</section>
    <!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="club">
		<div class="container">
			<!-- POST -->
			<article class="club-post">
				<div class="club-content">
					<div class="img-wrap col-3">
				
					</div>
				     <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
		
					</div>
				
				
				</div>
			</article>
			
		</div>
	</section>
	<?php
	
	include "includes/application_bottom.php";
	
	?>
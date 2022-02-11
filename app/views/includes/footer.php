<footer class="footer">
  <div class="footer-item">
	<h3>Explore</h3>
		<ul>
			<li>
				<a href="<?php echo URLROOT; ?>/index">Home</a>
			</li>
			<li>
				<a href="<?php echo URLROOT; ?>/about">About</a>
			</li>
			<li>
				<a href="<?php echo URLROOT; ?>/work">Our work</a>
			</li>

			<li>
				<a href="<?php echo URLROOT; ?>/contact">Contact us</a>
			</li>
		</ul>
  </div>
  <div class="footer-item">
	<h3>Brain stimulation</h3>
		<ul>
			<li>
				<a href="<?php echo URLROOT; ?>/posts">Blog</a>
			</li>
			<li>
				<a href="<?php echo URLROOT; ?>/news">News</a>
			</li>
		</ul>
  </div>
  <div class="footer-item">
	<h3>Controls</h3>
	  	<ul>
		  	<?php if(isset($_SESSION['account']) && $_SESSION['account'] == 'admin') : ?>
					<li class="btn-login">
						<a href="<?php echo URLROOT; ?>/users/register">Create account</a>
					</li> 	
					<li class="btn-login">
						<a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
					</li>
			<?php elseif(isset($_SESSION['account']) && $_SESSION['account'] == 'author') : ?>
					<li class="btn-login">
						<a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
					</li>
			<?php else: ?>
						<li class="btn-login">
						<a href="<?php echo URLROOT; ?>/users/login">Log in</a>
					</li> 
			<?php endif; ?>
	  	</ul>
  </div>
</footer>

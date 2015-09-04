
		<footer class="group">
		
			<div class="wrap">
				<div class="group grid-25 no-margin contact-us">
					<p class="address"><?php the_field('address', 'options'); ?></p>
					<p class="phone"><?php the_field('phone_number', 'options'); ?></p>
					<p class="fax"><?php the_field('fax_number', 'options'); ?></p>
				</div>
				<div class="group grid-25 no-margin sign-up">
					<h3>Sign Up for the Kunzler Link</h3>
					<hr class="zig" /><hr class="zag" />
					<p class="aligncenter">Get exclusive offers, first look at our new recipes and special coupons!</p>
				</div>
				<div class="group grid-25 no-margin frankly-speaking">
					<div class="intro">
						<h3>Frankly Speaking</h3>
						<hr class="zig" /><hr class="zag" />
						<p class="aligncenter">The Kunzler blog, your source of tips, tricks and our favorite recipes.</p>
					</div>
					<div class="excerpt">
						<h4>Latest Post</h4>
						<hr class="zig full" /><hr class="zag full" />
						<p class="meta">Post Title | Date</p>
						<p>Kunzler Kunzler Kunzler. Can we auto fill two sentences from a post please, or maybe we can fit three!</p>
						<a class="button" href="#">Read Blog</a>
					</div>
				</div>
				<div class="group grid-25 no-margin social">
					<h3>Connect with Kunzler on social</h3>
					<hr class="zig" /><hr class="zag" />
					<p class="aligncenter">Follow us on Facebook, Pinterest and Instagram for instant access to the most recent Kunzler updates.</p>
					<p class="social-links">
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-pinterest-p"></i></a>
						<a href=""><i class="fa fa-instagram"></i></a>
					</p>
				</div>
			</div>
			
		</footer>
		
		<colophon>
			<div class="wrap">
				<a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a><span> | </span><br />&copy;<?= Date('Y'); ?> Kunzler & Company, Inc.
			</div>
		</colophon>
		
		<?php wp_footer(); ?>
	</div>
</body>
</html>
<?php wp_footer(); ?>

<footer>
	<div class="wrapper">
		<div class="column two-thirds">
			<?php // Menu footer ?>
	
			<nav class="footerNav">
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'footer-menu',
						'container' => false
					) 
				); ?>
			</nav>
		</div>

		<div class="column third">
			<nav class="footerNav">
				<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
				<?php dynamic_sidebar( 'footer-widget' ); ?>
				<?php endif; ?>
			</nav>
		</div>
	</div>
</footer>



	
</body>

</html>

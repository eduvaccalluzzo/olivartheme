
<section id="form-popup" class="popup mfp-hide">

	<?php 

		if (is_page('24')) {
			echo do_shortcode ('[contact-form-7 id="295" title="Eventos"]');

		} else {
			echo do_shortcode ('[contact-form-7 id="294" title="Formulario Genérico"]');

		}
	?>	
</section>


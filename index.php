
<?php get_header(); ?>



<!-- Seccion Slider -->

<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>

<section class="hero" style="background-image: url(<?php if(has_post_thumbnail() ) { echo $thumb[0]; } else{header_image();}?> );">
	
	<?php 

	$titulo = get_field('titulo_claim');
	$subtitulo = get_field('subclaim_h1');
	$urlVideo = get_field('video_claim');
	$video = '<iframe src="https://www.youtube.com/embed/' . $urlVideo . '?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';

	?>

	<?php if($titulo || $subtitulo ): ?>	
		<div class="claim"> 
			
			<?php if($subtitulo): ?>
				<h1 class="subclaim">
					<?php echo $subtitulo; ?>
				</h1>
			<?php endif; ?>

			<?php if($titulo): ?>
				<h2>
					<?php echo $titulo; ?>
				</h2>
			<?php endif; ?>
		</div>	

	<?php endif; ?>


	<?php if($urlVideo): ?>
	<div id="btnvideo">
		<a class="btn redonda open-popup-link"  href="#video-popup">play</a>
	</div>
	
	<section id="video-popup" class="mfp-hide">

		<?php echo $video;?>

	</section>
	<?php endif; ?>


</section>







<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->

<article class="main">
	<h2> <?php the_title(  ); ?> </h2>	
	<?php the_content(); ?>
</article>


<?php endwhile; else: ?>
<!-- no posts found -->
<?php _e( 'No se han encontrado entradas', 'byadr' ); ?>


<?php endif; ?>



<!-- Formulario de Contacto -->
<?php get_template_part ('content','form'); ?>


<?php get_footer(); ?>












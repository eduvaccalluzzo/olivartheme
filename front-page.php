
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






<!-- Seccion Contenido -->

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






<!-- Seccion Servicios -->

<?php  
	
	$arga = array (
		'post__in' => array( 24, 87, 22, 26),
		'post_per_page' => 4,
		'post_type' => 'page',
		'order' => 'ASC',
		'orderby' => 'title',
	);


	$queryserv = new WP_Query( $arga );

?>

<?php  if ($queryserv->have_posts() ) : ?>

<section class="servicios-azul">
	<div class="wrapper">
		<div class="clearfix">
			
			<?php while ($queryserv->have_posts() ) : $queryserv->the_post();?>
				
					<div class="column fourth">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
						</a>
					</div>
				
			<?php endwhile; ?>			
		
		</div>
	</div>
</section>

	<?php endif; ?>
<?php wp_reset_query(); ?>





<!-- Seccion Fincas -->

<?php 

	$arg = array (
		'post__in' => array( 18, 20),
		'post_per_page' => 2,
		'post_type' => 'page',
		'order' => 'ASC',
		'orderby' => 'title'
	);


	$querythumb = new WP_Query( $arg );

?>

<?php  if ($querythumb->have_posts() ) : ?>

<section class="fincas clearfix">	

	<?php while ($querythumb->have_posts() ) : $querythumb->the_post(); ?>

		<div class="clearfix fincas-container">

			<?php  $thumbfincas = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>
			<div class="column half imgzone">
				<div class="img-area" style="background-image: url(<?php echo $thumbfincas[0];?>);"> 
				</div>
			</div>
			
			<div class="column half txt-area">
				<div class="text-center">
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="btn oscura"><?php  _e( 'Visita', 'byadr' );?></a>
				</div>
			</div>
		</div>


	<?php endwhile; ?>

</section>

	<?php endif; ?>
	<?php wp_reset_query(); ?>







<!-- Seccion Agradecimientos -->
	
	<?php 

		$args = array (
			'post_type' => 'agradecimientos',
			'orderby' => 'rand',
			'posts_per_page' => 1

		);


		$myquery = new WP_Query( $args );
	?>
	

	<?php if ($myquery->have_posts() ) : ?>	
	
	<section class="gracias">

		<?php while ($myquery->have_posts() ) : $myquery->the_post(); ?>
			
			
				<blockquote><?php the_content(); ?></blockquote>
				<div class="caja">
					<em><?php the_title(); ?></em>
					<div class="date"><?php the_date(); ?></div>
				</div>
			
			
		<?php endwhile; ?>
		
	</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>



<!-- Formulario de Contacto -->

<?php get_template_part ('content','form'); ?>



<?php get_footer(); ?>












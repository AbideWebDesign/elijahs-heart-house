<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ehh
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="wrapper-footer wrapper-sm" id="wrapper-footer">

	<div class="container">

		<div class="row justify-content-between">

			<div class="col-lg-5 mb-4 mb-mb-0">

				<h2><?php the_field('col_1_title', 'options'); ?></h2>
				
				<?php the_field('col_1_text', 'options'); ?>
				
				<a href="<?php the_field('col_1_button_link', 'options'); ?>" class="btn btn-primary btn-white"><?php the_field('col_1_button_label', 'options'); ?></a>

			</div>
			
			<div class="col-lg-5">

				<h2><?php the_field('col_2_title', 'options'); ?></h2>
				
				<?php the_field('col_2_text', 'options'); ?>
				
				<a href="<?php the_field('col_2_button_link', 'options'); ?>" class="btn btn-primary btn-white"><?php the_field('col_2_button_label', 'options'); ?></a>

			</div>		

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

<div id="wrapper-footer-bottom" class="wrapper-sm bg-secondary">
	
	<div class="container-fluid">
		
		<div class="row justify-content-between">
			
			<div class="col-lg-6 mb-4 mb-mb-0">
				
				<p class="mb-1"><?php the_field('top_text', 'options'); ?></p>
				
				<div class="mb-1"><?php echo wp_get_attachment_image( get_field('foundation_logo', 'options'), 'Full', false, array('class'=>'img-fluid') ); ?></div>
				
				<p class="text-sm mb-0"><?php the_field('bottom_text', 'options'); ?></p>
				
			</div>
			
			<div class="col-lg-6 align-self-center text-lg-right">
				
				<p class="mb-0"><a href="https://abidewebdesign.com" target="_blank">Website Design and Maintenance by Abide Web Design</a></p>
			
			</div>
			
		</div>
		
	</div>
	
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


<?php
/**
 * Block Name: Call to Action
 *
 * This is the template that displays the cta block.
 */

?>

<div class="wrapper-cta <?php the_field('padding_type'); ?>">
	
	<div class="container">
		
		<div class="row justify-content-center text-center">
			
			<div class="col-12 text-center mb-5">
			
				<img src="<?php echo home_url('wp-content/uploads/2020/05/ehh-heart.png'); ?>" class="divider" />
				
			</div>
			
			<div class="col-lg-8">
				
				<div class="cta-text mb-5">
					
					<?php the_field('cta_text'); ?>
					
				</div>
				
				<a href="<?php the_field('button_link'); ?>" class="btn btn-primary btn-lg"><?php the_field('button_label'); ?></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>
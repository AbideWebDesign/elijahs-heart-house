<?php
/**
 * Block Name: Card
 *
 * This is the template that displays the card block.
 */

?>

<div class="wrapper-card <?php the_field('padding_type'); ?>">
	
	<div class="container">
		
		<div class="row position-relative">
			
			<div class="col-lg-6">
				
				<?php echo wp_get_attachment_image( get_field('image'), 'Full', false ); ?>
				
			</div>
				
			<div class="col-lg-6 align-self-center card-text">	
				
				<div class="p-3 p-md-5 bg-blue text-secondary">
									
					<?php if ( get_field('main_title') ): ?>
					
						<h1 class="mb-3 sm"><?php the_field('main_title'); ?></h1>
					
					<?php endif; ?>
					
					<?php if ( get_field('secondary_title') ): ?>
					
						<h4><?php the_field('secondary_title'); ?></h4>
					
					<?php endif; ?>
					
					<?php the_field('card_text'); ?>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>
<div id="banner-block" class="bg-secondary text-white py-5 py-xl-3">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-lg-6 align-self-center">
				
				<h1 class="mb-0"><?php the_field('title'); ?></h1>
				
				<?php if ( get_field('type') == 'full' ): ?>
				
					<div class="banner-text mt-3"><?php the_field('banner_text'); ?></div>
					
					<?php if ( get_field('include_button') ): ?>
					
						<div class="banner-button mt-4">
							
							<a href="<?php the_field('button_link'); ?>" class="btn btn-primary"><?php the_field('button_label'); ?></a>
						
						</div>
					
					<?php endif; ?>
				
				<?php endif; ?>
				
			</div>
			
			<?php if ( get_field('type') == 'full' ): ?>
			
				<div class="col-lg-6">
					
					<div class="banner-image">
						
						<div class="img-bg img-bg-right d-none d-md-block"></div>
						
						<?php echo wp_get_attachment_image( get_field('image'), 'Large', false, array('class'=>'img-fluid') ); ?>
					
					</div>
					
				</div>
			
			<?php endif; ?>
			
		</div>
		
	</div>
	
</div>
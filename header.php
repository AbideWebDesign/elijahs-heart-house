<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ehh
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$logo = get_field('logo', 'options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div class="site" id="page">

		<div id="page-header" class="py-3">
			
			<div class="container">
				
				<div class="row justify-content-between">
					
					<div class="col-12 col-md-auto text-center text-md-left">
						
						<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( $logo['id'], 'full', false, array( 'id'=>'logo', 'class'=>'img-fluid' ) ); ?></a>
						
					</div>
					
					<div class="col-auto d-none d-md-block align-self-center">
						
						<div class="d-flex">
							
							<div class="mr-3">
								
								<a href="<?php the_field('header_button_1_link', 'options'); ?>" class="btn btn-primary"><?php the_field('header_button_1_label', 'options'); ?></a>
								
							</div>
							
							<div>
							
								<a href="<?php the_field('header_button_2_link', 'options'); ?>" class="btn btn-secondary"><?php the_field('header_button_2_label', 'options'); ?></a>
								
							</div>
							
						</div>
						
					</div>
					
					<div class="col-12 d-md-none d-lg-none d-xl-none mt-3">
						
						<div class="row no-gutters">
							
							<div class="col-6">
								
								<a href="<?php the_field('header_button_1_link', 'options'); ?>" class="btn btn-primary btn-sm btn-block"><?php the_field('header_button_1_label', 'options'); ?></a>
								
							</div>
							
							<div class="col-6">
							
								<a href="<?php the_field('header_button_2_link', 'options'); ?>" class="btn btn-secondary btn-sm btn-block"><?php the_field('header_button_2_label', 'options'); ?></a>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
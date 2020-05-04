<?php
/**
 * Block Name: Side by Side
 *
 * This is the template that displays the side by side block.
 */

// get group field (array)
$group_settings = get_field('side_by_side_settings');
$group_content = get_field('side_by_side_content');

// Setup Setting Fields
$text_position = $group_settings['text_position'];
$bg_color = $group_settings['background_color'];
$bg_color_class = get_color_class($bg_color);
$light_color_check = get_color_text_class($bg_color_class);

// Setup Content Fields
$title = $group_content['title'];
$text = $group_content['text'];
$image = wp_get_attachment_image_src( $group_content['image']['id'], 'Side Cover' );

?>
<div class="container-fluid bg-<?php echo $bg_color_class; ?> <?php echo ( $light_color_check ? 'text-white' : ''); ?>">
	<div class="side-by-side row <?php echo ($text_position == 'Right' ? 'flex-row-reverse' : ''); ?>">
		<div class="side col-6 align-self-center">
			<div class="inner text-center">
				<h1><?php echo $title ?></h1>
				
				<?php echo $text; ?>
				
				<?php if ( $group_settings['include_button'] ): ?>
				
					<?php echo get_button( $group_content ); ?>
				
				<?php endif; ?>
				
			</div>
		</div>
		<div class="side col-6 cover-image" style="background-image: url(<?php echo $image[0]; ?> );"></div>
	</div>
</div>

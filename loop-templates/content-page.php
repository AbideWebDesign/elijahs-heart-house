<?php
/**
 * Partial template for content in page.php
 *
 * @package ehh
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php the_content(); ?>

<footer class="entry-footer">

	<?php edit_post_link( __( 'Edit', 'ehh' ), '<span class="edit-link">', '</span>' ); ?>

</footer><!-- .entry-footer -->


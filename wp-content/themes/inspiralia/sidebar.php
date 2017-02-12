<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package inspiralia
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area" role="complementary">
	<div id="sidebar-right" class="inspiralia-sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->

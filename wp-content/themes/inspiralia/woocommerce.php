<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @package inspiralia
 */
get_header(); ?>
<?php get_template_part('index','banner');
$woo_layout= get_theme_mod('woo_layout','sidebar_off');
?>
<main id="content">
    <div class="container">
		<div class="row">
		<?php
			if(is_single())
		{ ?>
		<div class="col-md-12">
		<?php }
		elseif($woo_layout == 'sidebar_off')
		{?>
		<div class="col-md-12">
		<?php }
		elseif($woo_layout == 'left')
		{
		?>
		<aside class="col-md-3 col-sm-4">
			<div id="sidebar-right" class="inspiralia-sidebar">
			<?php dynamic_sidebar( 'sidebar-woo' ); ?>
			</div>
		</aside>
		<div class="<?php if(is_active_sidebar('sidebar-woo')) echo "col-md-9 col-sm-8"; else echo "col-md-12";?>">
		<?php }
		elseif($woo_layout == 'right')
		{ ?>
		<div class="<?php if(is_active_sidebar('sidebar-woo')) echo "col-md-9 col-sm-8"; else echo "col-md-12";?>">
		<?php } woocommerce_content();
		$woo_layout= get_theme_mod('woo_layout','sidebar_off');
		if($woo_layout == 'left')
		{
		echo '</div></div>';
		}
		else
		{
		echo '</div>';
		}
		if($woo_layout == 'right')
		{
		?>
		<!-- #primary -->
			<aside class="col-md-3 col-sm-4">
				<div id="sidebar-right" class="inspiralia-sidebar">
				<?php
					dynamic_sidebar( 'sidebar-woo' );
					?>
				</div>
			</aside><!-- .content-left-wrap -->
		<?php } ?>
	</div><!-- .container -->
   </div>
</main><!-- #main -->
<?php get_footer(); ?>
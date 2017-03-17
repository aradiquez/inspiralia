<?php 
/* variable */	
list( $template_name ) = explode( '.', $atts['template'] );
$lemongrid_options = json_encode( array(
	'cell_height'		=> (int) $atts['cell_height'],
	'vertical_margin'	=> (int) $atts['space'],
	'animate'			=> true,
	) );

	function is_video_post() {
		return false;
	}

/**
 * lgItemPostTemp
 *
 * @param array $atts
 * @return HTML
 */
if( ! class_exists( 'lgItemPostTemp' ) ) :
	function lgItemPostTemp( $atts )
	{
		$output = '';
		$gridLayout = lgGetLayoutLemonGridPerPage( get_the_ID(), $atts['element_id'] );
		$grid = empty( $gridLayout ) ? lgRenderGridDefault( count( $atts['posts']->posts ) ) : $gridLayout;
		$posts = $atts['posts'];
		$k = 0;

		while( $posts->have_posts() ) : 
			$posts->the_post();

			if( has_post_thumbnail() ):
				$thumbnail_data = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				$thumbnail = $thumbnail_data[0];
			else:
				$thumbnail = '';
			endif;
			$style = implode( ';', array( 
				"background: url('" . $thumbnail . "') no-repeat center center / cover, #333", 
				) );

			/**
			 * Title
			 */
			$_title = '<h2 class=\'title\' title=\''. get_the_title() .'\'>'. get_the_title() .'</h2>';

			/**
			 * Data
			 */
			$_topic = '';
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
			    $_topic = '<span class=\'topic\'>'.( $categories[0]->name ).'</span>';   
			}

			/**
			 * Icon Comment & Author
			 */
			$comments_count = wp_count_comments( get_the_ID() );
			$_comment_author = '';

			# <a title=\''. get_the_title() .'\' href=\''. get_permalink() .'\'><i class=\'fa fa-link\'></i></a>
			
			$play_button = '
				<div class=\'lemongrid-icon\'>
					<a href=""><i class="fa fa-play-circle" aria-hidden="true"></i></a>
				</div>';
				
			$info_text = '
				<div class=\'info-text\'>
					<a title=\''. get_the_title() .'\' href=\''. get_permalink() .'\'>'. $_title .'</a>
					'. $_topic .'
				</div>';
				
			$lemon_icon = '
				<div class=\'lemongrid-icon\'>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url=' . the_permalink() .'" class="linkedin-share-button" target="_blank">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
          <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
				</div>';

			$info_content = (is_video_post() ? $play_button : $lemon_icon) . '<br/>' . $info_text;

			$info = '
			<div class=\'lemongrid-info\'>
				' . $info_content . '
			</div>';

			$output .= '
				<div class=\'lemongrid-item lg-animate-fadein grid-stack-item\' data-gs-x=\''. esc_attr( $grid[$k]['x'] ) .'\' data-gs-y=\''. esc_attr( $grid[$k]['y'] ) .'\' data-gs-width=\''. esc_attr( $grid[$k]['w'] ) .'\' data-gs-height=\''. esc_attr( $grid[$k]['h'] ) .'\'>
					<div class=\'grid-stack-item-content\' style=\''. esc_attr( $style ) .'\'>
						'. esc_attr( $info ).'
					</div>
				</div>';

			$k += 1;
		endwhile;

		wp_reset_postdata();

		return $output;
	}
endif;
?>
<div class="lemongrid-wrap <?php esc_attr_e( $atts['class_id'] ); ?> lemongrid--element <?php esc_attr_e( $template_name ) ?> <?php esc_attr_e( $atts['class'] ); ?>">
	<?php echo apply_filters( 'lemongrid_toolbar_frontend', lgToolbarFrontend( array( 'atts' => $atts ) ), array() ); ?>
	<?php echo apply_filters( 'lemongrid_before_content', '', array() ); ?>
	<div class="lemongrid-inner grid-stack" data-lemongrid-options="<?php esc_attr_e( $lemongrid_options ); ?>">
		<?php 
		if( isset( $atts['posts']->posts ) && ( count( $atts['posts']->posts ) > 0 ) ) :
			_e( call_user_func( 'lgItemPostTemp', $atts ) );
		else :
			_e( '...', TB_NAME );
		endif;
		?>
	</div>
	<?php echo apply_filters( 'lemongrid_after_content', '', array() ); ?>
</div>
<?php

$args = array(
        'depth'        => 2,
        'link_before'  => '<pre>',
        'link_after'   => '</pre>',
        'item_spacing' => 'preserve',
				'exclude' 		 => ' '.get_ID_by_page_name('Careers').', '.get_ID_by_page_name('Accesibility').', '.get_ID_by_page_name('Home').', '.get_ID_by_page_name('Private Policy').', '.get_ID_by_page_name('Sitemap').', '.get_ID_by_page_name('Terms').' ',
				'title_li'     => ' '
    );

echo wp_list_pages($args);
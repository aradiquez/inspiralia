<?php

$args = array(
        'depth'        => 2,
        'title_li'     => '',
        'link_after'   => '<span>',
        'link_before'  => '</span>'
    );
$services = get_ID_by_page_name('Services');
$markets = get_ID_by_page_name('Markets');
$team = get_ID_by_page_name('team_members');
$careers = get_ID_by_page_name('Careers');
$clients = get_ID_by_page_name('Clients');
$case_studies = get_ID_by_page_name('Case Studies');
$blog = get_ID_by_page_name('Blog');
$contact = get_ID_by_page_name('Contact');



$markets_args = array_merge($args, array('child_of'     => $markets));
$services_args = array_merge($args, array('child_of'     => $services));
?>
<div class="sitemap">
    <ul>
        <li>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Homepage</a>
            <ul>
                <li>
                    <a href="<?php echo get_page_link($services); ?>">Services</a>
                    <ul class="childs services"><?php echo wp_list_pages($services_args); ?></ul>
                </li>
                <li>
                    <a href="<?php echo get_page_link($markets); ?>">Markets</a>
                    <ul class="childs markets"><?php echo wp_list_pages($markets_args); ?></ul>
                </li>
                <li>
                  <a href="<?php echo get_page_link($team); ?>">Team</a>
                    <ul class="childs team">
                        <li>
                            <a href="<?php echo get_page_link($careers); ?>">Work with us</a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo get_page_link($clients); ?>">Clients</a></li>
                <li><a href="<?php echo get_page_link($case_studies); ?>">Case Studies</a></li>
                <li><a href="<?php echo get_page_link($blog); ?>">Blog</a></li>
                <li>
                  <a href="<?php echo get_page_link($contact); ?>">Contact</a>
                  <ul class="childs contact">
                    <li><a href="<?php echo get_page_link($contact); ?>">Contact</a></li>
                    <li><a href="<?php echo get_page_link($careers); ?>">Work with us</a></li>
                  </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div style="clear: both;"></div>
</div>

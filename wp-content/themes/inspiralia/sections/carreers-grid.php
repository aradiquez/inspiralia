<?php
$args = array(
    'post_type' => 'carreers',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'post_parent' => 0
);
$loop = new WP_Query( $args );
?>
<div class="carreers_wrapper">

    <!-- Modal -->
    <div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="applying_for_carreer" action="<?php echo get_template_directory_uri() . '/inc/carreers/carreers_apply.php' ?>" method="POST" name="applying_for_carree" enctype="multipart/form-data">
                    <div class="modal-header">
                        <a href="" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                        <h4 class="modal-title" id="myModalLabel">Tell us more about you</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <label for="title">Email</label><br />
                            <input type="email" required id="email" value="" tabindex="1" size="20" name="email" />
                        </p>

                        <p>
                            <label for="phone">Phone</label><br />
                            <input type="number" required value="" tabindex="5" size="16" name="phone" id="phone" />
                        </p>

                        <p>
                            <label for="box__file__select">Resume</label><br/>
                            <div class="box__file">
                                <div class="box_file_name"></div>
                                <label for="file"><i class="fa fa-upload" aria-hidden="true"></i><br/><strong>Browse files to upload</strong><br/><span class="box__dragndrop">Microsoft Word or PDF only (5MB Max)</span>.</label>
                            </div>
                            <input class="box__file__select" type="file" name="inspiralia_application_file_list" id="inspiralia_application_file_list" accept=".doc,.docx,.pdf" />
                        </p>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="post_type" id="post_type" value="applications" />
                        <input type="hidden" name="action" value="post" />
                        <input type="hidden" name="post_parent" id="post_parent" value="" />
                        <?php wp_nonce_field( 'inspiralia_application_file_list', 'inspiralia_application_file_list_nonce' ); ?>

                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="carreers_list row">
        <div class="content">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); $id = get_the_ID(); ?>
            <article class="col-lg-12 col-md-12 col-sm-12 item">
                <a href="#" title="<?php the_title(); ?>" data-post_id="<?php echo $id ?>" class="display_details">
                    <?php the_title(); ?>
                </a>
                <!-- Modal -->
                <div class="carreers_details_modal">
                    <a href="#" class="details_modal_close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    <h3 class="details_modal_title"><?php the_title(); ?></h3>

                    <div class="clearfix"></div>
                    <div class="details_modal_content">
                        <div class="details_modal_wrapper">
                            <div class="details_modal_left">
                                <div class="details_modal_body"><?php the_content(); ?></div>
                            </div>
                            <div class="details_modal_right">
                                <div class="details_modal_body"><?php echo get_post_meta($id, "client_extra_fields_aside_description", true); ?></div>
                            </div>
                            <div class="action">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn show_carreer" data-post_id="<?php echo $id ?>" data-toggle="modal" data-target="#apply">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /.modal -->
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

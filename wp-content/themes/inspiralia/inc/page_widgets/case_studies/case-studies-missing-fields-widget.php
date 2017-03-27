<?php
add_action( 'admin_init', 'add_case_studies_extra_fields_meta_boxes' );
function add_case_studies_extra_fields_meta_boxes() {
    add_meta_box( 'case_studies_extra_fields_metabox', 'Case Studies Extra Fields', 'case_studies_extra_fields', 'page', 'normal', 'high', null );
}

add_action( 'save_post', 'save_case_studies_extra_fields' );
function save_case_studies_extra_fields( $post_id ) {
    // only run this for series
    if ( 'page' != get_post_type( $post_id ) )
        return $post_id;

    // verify nonce
    if ( empty( $_POST['services_nonce'] ) || !wp_verify_nonce( $_POST['services_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    // save
    if(isset($_POST["related_services"])) {
        $related_services= $_POST["related_services"];
    }
    update_post_meta($post_id, "related_services", $related_services);
}

function case_studies_extra_fields() {
    global $post;
    $selected_services = get_post_meta( $post->ID,'related_services', true ) ? get_post_meta( $post->ID, 'related_services', true ) : [] ;
    $all_services = get_posts( array(
        'post_type' => 'page',
        'post_parent' => 0,
        'numberposts' => -1,
        'orderby' => 'page_title',
        'order' => 'ASC'
    ) );
    ?>
    <input type="hidden" name="services_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <label for="related_services">Services</label>
            </th>
            <td>
                <select multiple name="related_services" size='10'>
                    <?php echo option_idented_parent($all_services, $selected_services); ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

function option_idented_parent($all_services, $selected_services) {
    foreach ( $all_services as $service ) {
        $args = array(
            'post_parent' => $service->ID,
            'post_type'   => 'page',
            'numberposts' => -1
        );
        $children = get_children( $args );
        if ( count($children) > 0 ) { ?>
            <optgroup label='<?php echo $service->post_title ?>'>
                <?php foreach ($children as $child) { ?>
                    <option value="<?php echo $child->ID; ?>"<?php echo (in_array( $child->ID, $selected_services )) ? ' selected="selected"' : ''; ?>><?php echo $child->post_title; ?></option>
                <?php } ?>
            </optgroup>
        <? } else { ?>
            <option value="<?php echo $service->ID; ?>"<?php echo (in_array( $service->ID, $selected_services )) ? ' selected="selected"' : ''; ?>><?php echo $service->post_title; ?></option>
    <?php }
    }
}

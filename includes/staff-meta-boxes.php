<?php
/**
 * Add the GFC Staff Meta Box
 */
 
// create the box
add_action( 'admin_init', 'gfc_staff_meta_box' );

function gfc_staff_meta_box() {
    add_meta_box( 'gfc_staff_details',
        'Staff Details',
        'display_staff_details',
        'staff', 'normal', 'high'
    );
}

// draw the box
function display_staff_details( $staff_member ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $staff_title = esc_html( get_post_meta( $staff_member->ID, 'staff_title', true ) );
    $staff_email = esc_html( get_post_meta( $staff_member->ID, 'staff_email', true ) );
    $staff_facebook = esc_html( get_post_meta( $staff_member->ID, 'staff_facebook', true ) );
    $staff_twitter = esc_html( get_post_meta( $staff_member->ID, 'staff_twitter', true ) );
    $staff_blog = esc_html( get_post_meta( $staff_member->ID, 'staff_blog', true ) );
    $staff_instagram = esc_html( get_post_meta( $staff_member->ID, 'staff_instagram', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 150px">title</td>
            <td><input type="text" size="80" name="staff_member_title" value="<?php echo $staff_title; ?>" /></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="text" size="80" name="staff_member_email" value="<?php echo $staff_email; ?>" /></td>
        </tr>
        <tr>
            <td>facebook link</td>
            <td><input type="text" size="80" name="staff_member_facebook" value="<?php echo $staff_facebook; ?>" /></td>
        </tr>
        <tr>
            <td>twitter link</td>
            <td><input type="text" size="80" name="staff_member_twitter" value="<?php echo $staff_twitter; ?>" /></td>
        </tr>
        <tr>
            <td>blog link</td>
            <td><input type="text" size="80" name="staff_member_blog" value="<?php echo $staff_blog; ?>" /></td>
        </tr>
        <tr>
            <td>instagram link</td>
            <td><input type="text" size="80" name="staff_member_instagram" value="<?php echo $staff_instagram; ?>" /></td>
        </tr>
    </table>
    <?php
}

// save the data
add_action( 'save_post', 'add_staff_detail_filds', 10, 2 );

function add_staff_detail_filds( $staff_member_id, $staff_member ) {
    if ( $staff_member->post_type == 'staff' ) {
        if ( isset( $_POST['staff_member_title'] ) && $_POST['staff_member_title'] != '' ) {
            update_post_meta( $staff_member_id, 'staff_title', $_POST['staff_member_title'] );
        }
        if ( isset( $_POST['staff_member_email'] ) && $_POST['staff_member_email'] != '' ) {
            update_post_meta( $staff_member_id, 'staff_email', $_POST['staff_member_email'] );
        }
        if ( isset( $_POST['staff_member_facebook'] ) ) {
            update_post_meta( $staff_member_id, 'staff_facebook', $_POST['staff_member_facebook'] );
        }
        if ( isset( $_POST['staff_member_twitter'] ) ) {
            update_post_meta( $staff_member_id, 'staff_twitter', $_POST['staff_member_twitter'] );
        }
         if ( isset( $_POST['staff_member_blog'] ) ) {
            update_post_meta( $staff_member_id, 'staff_blog', $_POST['staff_member_blog'] );
        }
        if ( isset( $_POST['staff_member_instagram'] ) ) {
            update_post_meta( $staff_member_id, 'staff_instagram', $_POST['staff_member_instagram'] );
        }
   }
}

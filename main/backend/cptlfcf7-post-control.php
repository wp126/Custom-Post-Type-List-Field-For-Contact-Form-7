<?php

if (!defined('ABSPATH')){
    exit;
}

function wpacptdcf7_add_post_control_generator_menu() {
    if (class_exists('WPCF7_TagGenerator')){
        $tag_generator = WPCF7_TagGenerator::get_instance();
        $tag_generator->add( 'posts', __( 'Posts drop-down menu', 'custom-post-type-list-field-for-contact-form-7' ),
            'wpacptdcf7_post_control_generator_menu' );
    }
}

function wpacptdcf7_post_control_generator_menu( $contact_form, $args = '' ) {
    $args = wp_parse_args( $args, array() );
    $type = 'posts';
    $description = __( "Generate a form-tag for a group of post drop-down menu. For more details, see %s.", 'custom-post-type-list-field-for-contact-form-7' ); ?>
    <div class="control-box">
        <fieldset>
            <legend><?php echo esc_html( $description ) ; ?></legend>

            <table class="form-table">
            <tbody>
                <tr>
                <th scope="row"><?php echo esc_html( __( 'Field type', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></th>
                <td>
                    <fieldset>
                    <legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></legend>
                    <label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label>
                    </fieldset>
                </td>
                </tr>
                <tr>
                <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                <td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><label><?php echo esc_html( __( 'Post Type', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <?php
                        $cptlfcf7_args = array(
                                        'public'   => true
                                    );
                        $cptlfcf7_output = 'names'; // names or objects, note names is the default
                        $cptlfcf7_operator = 'and'; // 'and' or 'or'
                        $cptlfcf7_post_types = get_post_types( $cptlfcf7_args, $cptlfcf7_output, $cptlfcf7_operator ); 
                        foreach ( $cptlfcf7_post_types  as $cptlfcf7_post_type ) { 
                            if ($cptlfcf7_post_type == 'product' && is_plugin_active( 'woocommerce/woocommerce.php' )) {
                                ?>
                                    <label>
                                        <input type="radio" name="post_type" value="<?php echo esc_attr($cptlfcf7_post_type); ?>" class="option" id="<?php echo esc_attr($cptlfcf7_post_type.'_cptlfcf7'); ?>"  <?php if($cptlfcf7_post_type == 'post'){echo "checked";} ?>>
                                        <?php echo esc_attr($cptlfcf7_post_type); ?>
                                    </label>
                                <?php
                            }else{
                                ?>
                                <label>
                                    <input type="radio" name="post_type" value="<?php echo esc_attr($cptlfcf7_post_type); ?>" class="option" id="<?php echo esc_attr($cptlfcf7_post_type.'_cptlfcf7'); ?>"  <?php if($cptlfcf7_post_type == 'post'){echo "checked";} ?>>
                                    <?php echo esc_attr($cptlfcf7_post_type); ?>
                                </label>
                                <?php 
                            }
                        } 
                        ?>
                    </td>
                </tr>
                <tr id='hide_filter_cat_box'>
                    <th scope="row"><label><?php echo esc_html( __( 'Filter Option', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <select name="filter_post_options" id="filter_post_options">
                            <option value=""><?php echo esc_html( __( '--- Select Option ---', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></option>
                            <option value="category"><?php echo esc_html( __( 'Category', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></option>
                            <option value="tags"><?php echo esc_html( __( 'Tags', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></option>
                        </select>
                    </td>
                </tr>
                <tr id='hide_post_cat_box' style="display: none">
                    <th scope="row"><label><?php echo esc_html( __( 'Category', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <?php
                            $cat_x = 1;
                            $cptlfcf7_categories = get_categories( array(
                                                    'orderby' => 'name',
                                                    'order'   => 'ASC'
                                                ) ); 
                            foreach ( $cptlfcf7_categories  as $cptlfcf7_category ) { ?>
                                <label>
                                    <input type="radio" name="post_category" value="<?php echo esc_attr($cptlfcf7_category->slug); ?>" class="option"> <?php echo esc_html($cptlfcf7_category->name); ?><br>
                                </label>
                            <?php }  ?>
                    </td>
                </tr>
                <tr id='hide_post_tags_box' style="display: none">
                    <th scope="row"><label><?php echo esc_html( __( 'Tags', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <?php
                            $cptlfcf7_tags = get_tags();
                            $tags_x = 1;
                            foreach ( $cptlfcf7_tags  as $cptlfcf7_tag ) { ?>
                                <label>
                                    <input type="radio" name="post_tag" value="<?php echo esc_attr($cptlfcf7_tag->slug); ?>" class="option">
                                        <?php echo esc_html($cptlfcf7_tag->name); ?><br>
                                </label>
                        <?php } ?>
                    </td>
                </tr>
                <br>
                <tr><th><a href="https://www.plugin999.com/plugin/custom-post-type-list-field-for-contact-form-7/" target="_blank" class="cptlfcf7_pro_link">Go Pro</a></th></tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><label><?php echo esc_html( __( 'Order by', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <label>
                            <input type="radio" name="orderby" value="date" class="option"><?php echo esc_html( __( 'Date', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                        <label>
                            <input type="radio" name="orderby" value="id" class="option"><?php echo esc_html( __( 'Order by post ID', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                        <label>
                            <input type="radio" name="orderby" value="author" class="option"><?php echo esc_html( __( 'Author', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                        <label>
                            <input type="radio" name="orderby" value="random" class="option"><?php echo esc_html( __( 'Random order', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                    </td>
                </tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><label><?php echo esc_html( __( 'Sort order', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                    <td>
                        <label>
                            <input type="radio" name="sortorder" value="DESC" class="option"><?php echo esc_html( __( 'Descending', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                        <label>
                            <input type="radio" name="sortorder" value="ASC" class="option"><?php echo esc_html( __( 'Ascending', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </label>
                    </td>
                </tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><?php echo esc_html( __( 'Options', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></th>
                    <td>
                        <fieldset>
                        <label><input type="checkbox" name="multiple" class="option" /> <?php echo esc_html( __( 'Allow multiple selections', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label><br />
                        <label><input type="checkbox" name="include_blank" class="option" /> <?php echo esc_html( __( 'Insert a blank item as the first option', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label>
                        <label><input type="checkbox" name="enable_search_box" class="option" /> <?php echo esc_html( __( 'Enable Search box on List Dropdown.', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label>
                        </fieldset>
                    </td>
                </tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><?php echo esc_html( __( 'Metadata', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></th>
                    <td>
                        <fieldset>
                        <input type="text" name="meta_data" class="meta_data oneline option" id="<?php echo esc_attr( $args['content'] . '-meta_data' ); ?>" />
                        <br>
                        <span class="description">
                            <?php echo esc_html( __( 'Use pipe-separated post attributes (e.g.date|time|slug|author|category|tags|meta_key) per field.', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </span>
                        </fieldset>
                    </td>
                </tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><?php echo esc_html( __( 'Image Options', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></th>
                    <td>
                        <fieldset>
                        <label><input type="checkbox" name="show_image" class="option" checked/> <?php echo esc_html( __( 'Show Or Hide Image', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label><br />
                        <label><input type="number" name="image_size" class="image_size oneline option" id="<?php echo esc_attr( $args['content'] . '-image_size' ); ?>"  min="0" placeholder="80"/> <?php echo esc_html( __( 'Custom Image Size (Width)', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label>
                        </fieldset>
                    </td>
                </tr>
                <tr class="cptlfcf7pro_fetures">
                    <th scope="row"><?php echo esc_html( __( 'Content Options', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></th>
                    <td>
                        <fieldset>
                        <label><input type="checkbox" name="show_content" class="option" checked/> <?php echo esc_html( __( 'Show Or Hide Content', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label><br />
                        <input type="number" name="content_limit" class="content_limit oneline option" id="<?php echo esc_attr( $args['content'] . '-content_limit' ); ?>"  min="0" placeholder="15"/>
                        <br>
                        <span class="description">
                         <?php echo esc_html( __( 'Define the number of words for the excerpt. Default "15"', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>
                        </span>
                        </fieldset>
                    </td>
                </tr>

                <tr>
                <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                <td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
                </tr>
                <tr>
                <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'custom-post-type-list-field-for-contact-form-7' ) ); ?></label></th>
                <td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
                </tr>
            </tbody>
            </table>
        </fieldset>
    </div>
    <div class="insert-box">
        <input type="text" name="<?php echo esc_attr($type); ?>" class="tag code" readonly="readonly" onfocus="this.select()" />

        <div class="submitbox">
        <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'custom-post-type-list-field-for-contact-form-7' ) ); ?>" />
        </div>

        <br class="clear" />

        <p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'custom-post-type-list-field-for-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>
    </div>
    <?php
}

if ( is_admin() ) {
    add_action( 'admin_init', 'wpacptdcf7_add_post_control_generator_menu', 25 );
}
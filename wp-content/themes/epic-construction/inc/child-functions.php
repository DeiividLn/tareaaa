<?php

/**
 * Customize register settings and controls 
 */
function epic_construction_customize_register( $wp_customize ){

    $wp_customize->remove_setting( 'construction_landing_page_services_post_seven' );
    $wp_customize->remove_control( 'construction_landing_page_services_post_seven' );
    $wp_customize->remove_setting( 'construction_landing_page_services_post_eight' );
    $wp_customize->remove_control( 'construction_landing_page_services_post_eight' );

    // Load our custom control.
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';

    // Modify default parent theme controls
    $wp_customize->get_control( 'construction_landing_page_phone' )->priority   = -1;

    /** Header Phone Label */
    $wp_customize->add_setting(
        'epic_construction_header_phone_label',
        array(
            'default'           => __( 'Phone Number','epic-construction' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    // Selective referesh for header email
    $wp_customize->selective_refresh->add_partial( 'epic_construction_header_phone_label', array(
        'selector'        => '.site-header .header-t .right-panel .col span.header-phone',
        'render_callback' => 'epic_construction_header_phone_label',
    ) );

    $wp_customize->add_control(
        'epic_construction_header_phone_label',
        array(
            'type'            => 'text',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Phone # Label', 'epic-construction' ),
        )
    );

    /** Header Email Address */
    $wp_customize->add_setting(
        'epic_construction_header_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
        )
    );

    $wp_customize->add_control(
        'epic_construction_header_email',
        array(
            'type'            => 'email',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Email Address', 'epic-construction' ),
        )
    );

     /** Header Phone Label */
    $wp_customize->add_setting(
        'epic_construction_header_email_label',
        array(
            'default'           => __( 'Email','epic-construction' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    // Selective referesh for header email
    $wp_customize->selective_refresh->add_partial( 'epic_construction_header_email_label', array(
        'selector'        => '.site-header .header-t .right-panel .col span.header-email',
        'render_callback' => 'epic_construction_header_email_label',
    ) );

    $wp_customize->add_control(
        'epic_construction_header_email_label',
        array(
            'type'            => 'text',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Email # Label', 'epic-construction' ),
        )
    );

    /** Header Phone Label */
    $wp_customize->add_setting(
        'epic_construction_header_get_a_quote_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'epic_construction_header_get_a_quote_url',
        array(
            'type'            => 'text',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Button link for Get A Quote', 'epic-construction' ),
            'description'     => __( 'You can find this in the end of navigation menu..', 'epic-construction' ),
        )
    );

    /** Enable Social Links */
    $wp_customize->add_setting(
        'epic_construction_ed_header_social_links',
        array(
            'default' => true,
            'sanitize_callback' => 'construction_landing_page_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'epic_construction_ed_header_social_links',
        array(
            'label'       => __( 'Enable Social Links', 'epic-construction' ),
            'description' => __( 'Enable to show social links at header.', 'epic-construction' ),
            'section'     => 'construction_landing_page_phone_number',
            'type'        => 'checkbox',
        )
    );
    
    /** Add social link repeater control */
    $wp_customize->add_setting( 
        new Epic_Construction_Repeater_Setting( 
            $wp_customize, 
            'epic_construction_header_social_links', 
            array(
                'default' => array(),
                'sanitize_callback' => array( 'Epic_Construction_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Epic_Construction_Control_Repeater(
            $wp_customize,
            'epic_construction_header_social_links',
            array(
                'section' => 'construction_landing_page_phone_number',               
                'label'   => __( 'Social Links', 'epic-construction' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'epic-construction' ),
                        'description' => __( 'Example: fa-bell', 'epic-construction' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'epic-construction' ),
                        'description' => __( 'Example: http://facebook.com', 'epic-construction' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'links', 'epic-construction' ),
                    'field' => 'link'
                ),
                'choices'   => array(
                    'limit' => 10
                ),             
                'active_callback' => 'epic_construction_customizer_active_callback',                 
            )
        )
    );

    //Testimonials added

    $wp_customize->add_setting(
        'construction_landing_page_testimonials_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'construction_landing_page_sanitize_select',
        )
    );

     $wp_customize->add_control(
        'construction_landing_page_testimonials_post_five',
        array(
            'label'   => __( 'Select Post/Page Five', 'epic-construction' ),
            'section' => 'construction_landing_page_testimonials_settings',
            'type'    => 'select',
            'choices' => epic_construction_get_posts( array( 'post','page' ) ),
        )
    );

    $wp_customize->add_setting(
        'construction_landing_page_testimonials_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'construction_landing_page_sanitize_select',
        )
    );

     $wp_customize->add_control(
        'construction_landing_page_testimonials_post_six',
        array(
            'label'   => __( 'Select Post/Page Six', 'epic-construction' ),
            'section' => 'construction_landing_page_testimonials_settings',
            'type'    => 'select',
            'choices' => epic_construction_get_posts( array( 'post','page' ) ),
        )
    );

}
add_action( 'customize_register', 'epic_construction_customize_register', 100 );

/**
 * Customizer active callback function
 */
function epic_construction_customizer_active_callback( $control ){
    $ed_social_link = $control->manager->get_setting( 'epic_construction_ed_header_social_links' )->value();
    $control_id     = $control->id;
    // Phone number, Address, Email and Custom Link controls
    if ( $control_id == 'epic_construction_header_social_links' && $ed_social_link ) return true;
    return false;
}

function epic_construction_header_email_label(){
    $header_email    = get_theme_mod( 'epic_construction_header_email_label',__( 'Email','epic-construction' ) );
    if( ! empty( $header_email ) ){
        return esc_html( $header_email );
    }                                     
    return false; 
}

function epic_construction_header_phone_label(){
    $phone_label  = get_theme_mod( 'epic_construction_header_phone_label',__( 'Phone Number','epic-construction' ) );
    if( ! empty( $phone_label ) ){
        return esc_html( $phone_label );
    }
    return false; 
}


/**
* Callback for Social Links
*/
function epic_construction_social_links_cb(){
    $social_icons = get_theme_mod( 'epic_construction_header_social_links', array() );

    if( $social_icons ){
    ?>
    <ul class="social-networks">
		<?php
        foreach( $social_icons as $socials ){
            if( $socials['link'] ){ ?>
                <li><a href="<?php echo esc_url( $socials['link'] );?>" <?php if( $socials['font'] != 'skype' ) echo 'target="_blank"'; ?> title="<?php echo esc_attr( $socials['font'] ); ?>"><i class="<?php echo esc_attr( $socials['font'] );?>"></i></a></li>
        <?php
            }
        }?>
	</ul>
    <?php
    }
}
add_action( 'epic_construction_social_link', 'epic_construction_social_links_cb' );

function epic_construction_get_section_header( $section_title , $section_name ){

        $header_query = new WP_Query( array( 
                'p'         => $section_title,
                'post_type' => array( 'post', 'page' ),
            )
        );
        if( $section_name == 'about' ){
            $readmore = __( 'More About Us','epic-construction' );
        }
        if( $section_name == 'projects' ){
            $readmore = __( 'View More Projects','epic-construction' );
        }
        if( $section_name == 'services' ){
            $readmore = __( 'View More Projects','epic-construction' );
        }
        
        if( $section_title && $header_query->have_posts() ){ 
            while( $header_query->have_posts() ){ $header_query->the_post();
        ?>
                <div class="btn-holder">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html( $readmore ); ?></a>
                </div>
        <?php   
        }
        wp_reset_postdata();
    }
}

/**
 * Register custom fonts.
 */
function epic_construction_fonts_url() {
    $fonts_url = '';

    /*
    * translators: If there are characters in your language that are not supported
    * by Muli, translate this to 'off'. Do not translate into your own language.
    */
    $muli = _x( 'on', 'Muli font: on or off', 'epic-construction' );
    
    /*
    * translators: If there are characters in your language that are not supported
    * by Poppins, translate this to 'off'. Do not translate into your own language.
    */
    $poppins = _x( 'on', 'Poppins font: on or off', 'epic-construction' );

    if ( 'off' !== $muli || 'off' !== $poppins ) {
        $font_families = array();

        if( 'off' !== $muli ){
            $font_families[] = 'Muli:400,400i,700,700i';
        }

        if( 'off' !== $poppins ){
            $font_families[] = 'Poppins:400,400i,500,500i,600,600i,700,700i';
        }

        $query_args = array(
            'family'  => urlencode( implode( '|', $font_families ) ),
            'display' => urlencode( 'fallback' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url( $fonts_url );
}

function epic_construction_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initiate an empty array
    $post_options = array();
    $post_options[''] = __( 'Choose Post/Page', 'epic-construction' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}

if ( ! function_exists( 'epic_construction_get_fontawesome_ajax' ) ) :
/**
 * Return an array of all icons.
 */
function epic_construction_get_fontawesome_ajax() {
    // Bail if the nonce doesn't check out
    if ( ! isset( $_POST['epic_construction_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['epic_construction_customize_nonce'] ), 'epic_construction_customize_nonce' ) ) {
        wp_die();
    }

    // Do another nonce check
    check_ajax_referer( 'epic_construction_customize_nonce', 'epic_construction_customize_nonce' );

    // Bail if user can't edit theme options
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die();
    }

    // Get all of our fonts
    $fonts = epic_construction_get_fontawesome_list();
    
    ob_start();
    if( $fonts ){ ?>
        <ul class="font-group">
            <?php 
                foreach( $fonts as $font ){
                    echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
                }
            ?>
        </ul>
        <?php
    }
    echo ob_get_clean();

    // Exit
    wp_die();
}
endif;
add_action( 'wp_ajax_epic_construction_get_fontawesome_ajax', 'epic_construction_get_fontawesome_ajax' );

function epic_construction_customize_script(){
    wp_localize_script( 'epic-construction-repeater', 'epic_construction_customize',
        array(
            'nonce' => wp_create_nonce( 'epic_construction_customize_nonce' )
        )
    );
}
add_action( 'customize_controls_enqueue_scripts', 'epic_construction_customize_script' );
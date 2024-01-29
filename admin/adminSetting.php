<?php

class WC_Settings_Tab_Thekua_s{
 
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_thekua', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_thekua', __CLASS__ . '::update_settings' );
    }
   
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_thekua'] = __( 'Settings Thekua', 'woocommerce-settings-tab-thekua-s' );
        return $settings_tabs;
    }
 
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }
  
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }

  
    public static function get_settings() {
			 // Fetching Woocommerce Product Category
		$args = array(
			'taxonomy'               => 'product_cat',
			'orderby'                => 'name',
			'order'                  => 'ASC',
			'hide_empty'             => false,
		);
		$the_query = new \WP_Term_Query($args);
		
		$product_categories = $the_query->terms;
		$pregories =  array();
		
		if(!empty($product_categories)) {
			foreach($product_categories as $cat){
				$pregories[$cat->term_id] = $cat->name;
			}
		}
		 
        $settings = array(
            'section_title' => array(
                'name'     => __( 'Product Categories on Shop Page', 'woocommerce-settings-tab-thekua-s' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_settings_tab_thekua_s_section_title'
            ),
            'title' => array(
                'name' => __( 'Choose Multiple Product Categories', 'woocommerce-settings-tab-thekua-s' ),
                'type' => 'multiselect',  
				'options' => $pregories, 
                'desc' => __( 'Use Ctrl Keyboard to  Select Multiple Categories', 'woocommerce-settings-tab-thekua-s' ),
                'id'   => 'wc_settings_tab_thekua_s_categories'
            ),  
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_settings_tab_thekua_s_section_end'
            )
        );

        return apply_filters( 'wc_settings_tab_thekua_s_settings', $settings );
    }

}

WC_Settings_Tab_Thekua_s::init();
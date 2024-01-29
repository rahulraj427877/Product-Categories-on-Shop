<?php
 
 // Banner on Cart Page
add_filter( 'woocommerce_before_shop_loop', 'woocommerce_banner_on_shop_thekua_o' ); 

function woocommerce_banner_on_shop_thekua_o() {
	// Fetch Woocommerce Admin input field
	$woo_categories =   get_option( 'wc_settings_tab_thekua_s_categories'  );  
	
	?>
	<style>.woo-cat-info{padding: 1%;margin: 10px;background-color: #f7f6f7;color: #515151;border-top: 3px solid #1e85be;list-style: none outside;}</style>
	<div style='display:block;margin:16px;'>
	<?php
	if(!empty($woo_categories)) {
		foreach($woo_categories as $catid) {
			$catinfo = get_term_by('id', $catid, 'product_cat');
			
			$catlink = get_term_link( (int)$catinfo->term_id, 'product_cat' );
		?>			
			<span class='woo-cat-info'> <a href='<?php echo esc_attr( $catlink ); ?>'> <?php echo esc_html_e( $catinfo->name,'thekua-categoryonshop' ); ?> </a></span> 
		<?php	
		}
	?>
	</div>
	<?php
	}
} 
 

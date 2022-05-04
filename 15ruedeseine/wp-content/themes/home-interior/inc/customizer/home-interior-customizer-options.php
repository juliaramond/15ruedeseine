<?php
/**
 * Customizer section options.
 *
 * @package home-interior
 *
 */

function home_interior_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting('awpbusinesspress_footer_copright_text',array(
				'sanitize_callback'	=>  'home_interior_sanitize_text',
				'default'			=> __('Copyright &copy; 2021 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Home Interior theme by <a target="_blank" href="http://awplife.com/">A WP Life</a>', 'home-interior'),
				'transport'			=> $selective_refresh,
		));
		
		$wp_customize->add_control('awpbusinesspress_footer_copright_text', array(
			'label'			=> esc_html__('Footer Copyright','home-interior'),
			'section'		=> 'awpbusinesspress_footer_copyright',
			'priority'		=> 10,
			'type'			=> 'textarea'
		));

}
add_action( 'customize_register', 'home_interior_customizer_theme_settings' );

function home_interior_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}
<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Comparison_Form
 * @subpackage Comparison_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Comparison_Form
 * @subpackage Comparison_Form/admin
 * @author     Developer Junayed <admin@easeare.com>
 */
class Comparison_Form_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	function comparison_menupage(){
		add_options_page( "Comparison Setting", "Comparison Form", "manage_options", "comparison-setting", [$this, "comparison_menu_setting"], null );

		add_settings_section( 'comparison_form_settings_section', '', '', 'comparison_form_page' );

		// Shortcode
		add_settings_field( 'comparison_shortcode', 'Shortcode', [$this,'fn_comparison_shortcode'], 'comparison_form_page', 'comparison_form_settings_section');
		register_setting( 'comparison_form_settings_section', 'comparison_shortcode');
		// Comparison URL
		add_settings_field( 'comparison_url', 'Comparison URL', [$this,'fn_comparison_url'], 'comparison_form_page', 'comparison_form_settings_section');
		register_setting( 'comparison_form_settings_section', 'comparison_url');
		// Parameter
		add_settings_field( 'comparison_url_parameter', 'Parameter', [$this,'fn_comparison_url_parameter'], 'comparison_form_page', 'comparison_form_settings_section');
		register_setting( 'comparison_form_settings_section', 'comparison_url_parameter');
		
	}

	function fn_comparison_shortcode(){
		echo '<input type="text" readonly value="[comparison_form]">';
	}

	function fn_comparison_url(){
		echo '<input type="url" name="comparison_url" placeholder="https://hostations.net/compare" id="comparison_url" class="widefat" value="'.get_option('comparison_url').'">';
	}

	function fn_comparison_url_parameter(){
		echo '<input type="url" name="comparison_url_parameter" placeholder="compareids" id="comparison_url_parameter" value="'.get_option('comparison_url_parameter').'">';
	}

	function comparison_menu_setting(){
		?>
		<div class="comparison_form">
			<h3>Comparison Form</h3>
			<hr>
			<form style="width: 50%" action="options.php" method="post">
				<?php
				settings_fields( 'comparison_form_settings_section' );
				do_settings_sections( 'comparison_form_page' );
				echo get_submit_button( "Save changes", "button-primary", "comparison-form" );
				?>
			</form>
		</div>
		<?php
	}
	
}

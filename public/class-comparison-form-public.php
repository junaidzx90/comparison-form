<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Comparison_Form
 * @subpackage Comparison_Form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Comparison_Form
 * @subpackage Comparison_Form/public
 * @author     Developer Junayed <admin@easeare.com>
 */
class Comparison_Form_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode( 'comparison_form', [$this, 'comparison_form_callback'] );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Comparison_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Comparison_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'selectize', plugin_dir_url( __FILE__ ) . 'css/selectize.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/comparison-form-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Comparison_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Comparison_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'selectize', plugin_dir_url( __FILE__ ) . 'js/selectize.min.js', array(  ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/comparison-form-public.js', array( 'jquery', 'selectize' ), $this->version, true );
		wp_localize_script( $this->plugin_name, "comparison_ajax", array(
			'url' => $this->get_comparing_url()
		) );

	}

	function get_comparing_url(){
		$url = ((get_option('comparison_url')) ? get_option('comparison_url') : "https://hostations.net/compare");
		$url = rtrim($url, '/\\');
		$parameter = ((get_option('comparison_url_parameter')) ? get_option('comparison_url_parameter') : "compareids");

		$fullUrl = "$url?$parameter=";
		return $fullUrl;
	}

	function get_products(){
		$args = array(
			'post_type'   => 'product',
			'post_status'    => 'publish',
			'numberposts' => -1,
			'orderby'     => 'date',
			'order'       => 'DESC',
		);

		$productsObj = get_posts($args);
		$options = [];

		if($productsObj){
			foreach($productsObj as $product){
				$options[] = '<option value="'.$product->ID.'">'.$product->post_title.'</option>';
			}
			return $options;
		}
	}

	function comparison_form_callback(){
		ob_start();
		require_once plugin_dir_path( __FILE__ )."partials/comparison-form-public-display.php";
		return ob_get_clean();
	}
}

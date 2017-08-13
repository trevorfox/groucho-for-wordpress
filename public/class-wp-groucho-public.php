<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Groucho
 * @subpackage WP_Groucho/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Groucho
 * @subpackage WP_Groucho/public
 * @author     Your Name <email@example.com>
 */
class WP_Groucho_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_groucho    The ID of this plugin.
	 */
	private $wp_groucho;

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
	 * @param      string    $wp_groucho       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_groucho, $version ) {

		$this->wp_groucho = $wp_groucho;
		$this->version = $version;

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
		 * defined in WP_Groucho_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Groucho_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_groucho, plugin_dir_url( __FILE__ ) . 'css/wp-groucho-public.css', array(), $this->version, 'all' );

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
		 * defined in WP_Groucho_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Groucho_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_groucho, plugin_dir_url( __FILE__ ) . 'js/wp-groucho-public.js', array( 'jquery' ), $this->version, false );

	}

	public function hello_groucho() {
		if( is_single() ) {
		?>
			<meta name="wp_groucho" content="<?php echo("Hello World") ?>" />
		<?php
		}
	}

}

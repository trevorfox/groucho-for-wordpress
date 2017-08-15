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
		// below function call is for demo only
		//wp_enqueue_script( $this->wp_groucho, plugin_dir_url( __FILE__ ) . 'js/wp-groucho-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'json2', plugin_dir_url( __FILE__ ) . 'js/json2.js');
		wp_enqueue_script( 'jquery', plugin_dir_url( __FILE__ ) . 'js/jquery.js');
		wp_enqueue_script( 'dataLayerHelper', plugin_dir_url( __FILE__ ) . 'js/data-layer-helper.js');
		wp_enqueue_script( 'jStorage', plugin_dir_url( __FILE__ ) . 'js/jstorage.js'); //array('jquery'));
		wp_enqueue_script( 'groucho', plugin_dir_url( __FILE__ ) . 'js/groucho.js');// array('jquery','jStorate','dataLayerHelper'));
	}

	public function hello_groucho() {
		if( is_singular() ) {
			$taxonomy = array();

			$postCategories = get_the_category();
			if ( $postCategories ) {
				$taxCats = array();
				foreach( $postCategories as $cat ) {
					$taxCats[$cat->term_id] = $cat->slug;
				}
				$taxonomy["categories"] = $taxCats;
			}

			?>
			<!--Begin Groucho data-->
			<script type="text/javascript">

					var dataLayer = dataLayer||[];
					var groucho = window.groucho || {};
					groucho.config = {
					  'taxonomyProperty' : 'grouchoTaxonomy',
					  'trackExtent' : 50,
					  'favThreshold' : 1,
					  'trackProperties' : [
					    'grouchoTaxonomy',
					    'authorId',
					    'tags',
							'categories'
					  ]
					}
					dataLayer.push({'grouchoTaxonomy': <?php echo(json_encode($taxonomy)); ?>});
			</script>
			<!--End Groucho data-->
			<?php
		} // is single
	} // hello
}

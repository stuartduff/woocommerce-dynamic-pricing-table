<?php
/**
 * Plugin Name:       WooCommerce Dynamic Pricing Table
 * Plugin URI:        https://github.com/stuartduff/woocommerce-dynamic-pricing-table
 * Description:       Adds a pricing discount table to WooCommerce products that are offering bulk discounts or special offer discounts via the WooCommerce Dynamic Pricing plugin.
 * Version:           1.0.0
 * Author:            Stuart Duff
 * Author URI:        http://stuartduff.com
 * Requires at least: 4.5.0
 * Tested up to:      4.5.2
 *
 * Text Domain: woocommerce-dynamic-pricing-table
 * Domain Path: /languages/
 *
 * @package WC_Dynamic_Pricing_Table
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Returns the main instance of WC_Dynamic_Pricing_Table to prevent the need to use globals.
 *
 * @since   1.0.0
 * @return  object WC_Dynamic_Pricing_Table
 */
function WC_Dynamic_Pricing_Table() {
  return WC_Dynamic_Pricing_Table::instance();
} // End WC_Dynamic_Pricing_Table()
WC_Dynamic_Pricing_Table();

/**
 * Main WC_Dynamic_Pricing_Table Class
 *
 * @class WC_Dynamic_Pricing_Table
 * @version   1.0.0
 * @since     1.0.0
 * @package   WC_Dynamic_Pricing_Table
 */
final class WC_Dynamic_Pricing_Table {

  /**
   * WC_Dynamic_Pricing_Table The single instance of WC_Dynamic_Pricing_Table.
   * @var     object
   * @access  private
   * @since   1.0.0
   */
  private static $_instance = null;

  /**
   * The token.
   * @var     string
   * @access  public
   * @since   1.0.0
   */
  public $token;

  /**
   * The version number.
   * @var     string
   * @access  public
   * @since   1.0.0
   */
  public $version;

  /**
   * Constructor function.
   * @access  public
   * @since   1.0.0
   * @return  void
   */
  public function __construct() {
    $this->token          = 'woocommerce-dynamic-pricing-table';
    $this->plugin_url     = plugin_dir_url( __FILE__ );
    $this->plugin_path    = plugin_dir_path( __FILE__ );
    $this->version        = '1.0.0';

    register_activation_hook( __FILE__, array( $this, 'install' ) );

    add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

    add_action( 'init', array( $this, 'plugin_setup' ) );

  }

  /**
   * Main WC_Dynamic_Pricing_Table Instance
   *
   * Ensures only one instance of WC_Dynamic_Pricing_Table is loaded or can be loaded.
   *
   * @since   1.0.0
   * @static
   * @see     WC_Dynamic_Pricing_Table()
   * @return  Main WC_Dynamic_Pricing_Table instance
   */
  public static function instance() {
    if ( is_null( self::$_instance ) )
      self::$_instance = new self();
    return self::$_instance;
  } // End instance()

  /**
   * Load the localisation file.
   * @access  public
   * @since   1.0.0
   * @return  void
   */
  public function load_plugin_textdomain() {
    load_plugin_textdomain( 'woocommerce-dynamic-pricing-table', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }

  /**
   * Installation.
   * Runs on activation. Logs the version number.
   * @access  public
   * @since   1.0.0
   * @return  void
   */
  public function install() {
    $this->log_plugin_version_number();
  }

  /**
   * Log the plugin version number.
   * @access  private
   * @since   1.0.0
   * @return  void
   */
  private function log_plugin_version_number() {
    // Log the version number.
    update_option( $this->token . '-version', $this->version );
  }

  /**
   * Setup all the things.
   * Only executes if WooCommerce Dynamic Pricing is active.
   * If WooCommerce Dynamic Pricing is inactive an admin notice is displayed.
   * @return void
   */
  public function plugin_setup() {
    if ( class_exists( 'WC_Dynamic_Pricing' ) ) {
      add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'output_dynamic_pricing_table' ) );
    } else {
      add_action( 'admin_notices', array( $this, 'install_wc_dynamic_pricing_notice' ) );
    }
  }

  /**
   * WooCommerce Dynamic Pricing plugin install notice.
   * If the user activates this plugin while not having the WooCommerce Dynamic Pricing plugin installed or activated, prompt them to install WooCommerce Dynamic Pricing.
   * @since   1.0.0
   * @return  void
   */
  public function install_wc_dynamic_pricing_notice() {
    echo '<div class="notice is-dismissible updated">
      <p>' . __( 'The WooCommerce Dynamic Pricing Table extension requires that you have the WooCommerce Dynamic Pricing plugin installed and activated.', 'woocommerce-dynamic-pricing-table' ) . ' <a href="https://www.woothemes.com/products/dynamic-pricing/">' . __( 'Get WooCommerce Dynamic Pricing now', 'woocommerce-dynamic-pricing-table' ) . '</a></p>
    </div>';
  }

  /**
   * Gets the dynamic pricing rules sets from the post meta.
   * @access  public
   * @since   1.0.0
   * @return  get_post_meta()
   */
  public function get_pricing_array_rule_sets() {
    return get_post_meta( get_the_ID(), '_pricing_rules', true );
  }

  /**
   * Outputs the dynamic bulk pricing table.
   * @access  public
   * @since   1.0.0
   * @return  $output
   */
  public function bulk_pricing_table_output() {

    $array_rule_sets = $this->get_pricing_array_rule_sets();

    $output = '<table>';

    $output .= '<th>' . __( 'Quantity' , 'woocommerce-dynamic-pricing-table' ) . '</th><th>' . __( 'Bulk Purchase Pricing' , 'woocommerce-dynamic-pricing-table' ) . '</th>';

    foreach( $array_rule_sets as $pricing_rule_sets ) {

      foreach ( $pricing_rule_sets['rules'] as $key => $value ) {

        $output .= '<tr>';

        $output .= '<td><span class="discount-quantity">' . intval( $pricing_rule_sets['rules'][$key]['from'] ) . ' - ' . intval( $pricing_rule_sets['rules'][$key]['to'] ) . '</span></td>';

        switch ( $pricing_rule_sets['rules'][$key]['type'] ) {

          case 'price_discount':
            $output .= '<td><span class="discount-amount">' . get_woocommerce_currency_symbol() . sprintf( __( '%1$s Discount Per Item', 'woocommerce-dynamic-pricing-table' ), intval( $pricing_rule_sets['rules'][$key]['amount'] ) ) . '</span></td>';
          break;

          case 'percentage_discount':
            $output .= '<td><span class="discount-amount">' . intval( $pricing_rule_sets['rules'][$key]['amount'] ) . __( '% Discount', 'woocommerce-dynamic-pricing-table' ) . '</span></td>';
          break;

          case 'fixed_price':
            $output .= '<td><span class="discount-amount">' . get_woocommerce_currency_symbol() . sprintf( __( '%1$s Price Per Item', 'woocommerce-dynamic-pricing-table' ), intval( $pricing_rule_sets['rules'][$key]['amount'] ) ) . '</span></td>';
          break;

        }

        $output .= '</tr>';

      }

    }

    $output .= '</table>';

    echo $output;

  }

  /**
   * Outputs the dynamic special offer pricing table.
   * @access  public
   * @since   1.0.0
   * @return  $output
   */
  public function special_offer_pricing_table_output() {

    $array_rule_sets = $this->get_pricing_array_rule_sets();

    $output = '<table>';

    $output .= '<th>' . __( 'Quantity', 'woocommerce-dynamic-pricing-table' ) . '</th><th>' . __( 'Special Offer Pricing', 'woocommerce-dynamic-pricing-table' ) . '</th>';

    foreach( $array_rule_sets as $pricing_rule_sets ) {

      foreach ( $pricing_rule_sets['blockrules'] as $key => $value ) {

        $output .= '<tr>';

        $output .= '<td><span class="discount-quantity">' . sprintf( __( 'Buy %1$s get %2$s more discounted', 'woocommerce-dynamic-pricing-table' ), intval( $pricing_rule_sets['blockrules'][$key]['from'] ) , intval( $pricing_rule_sets['blockrules'][$key]['adjust'] ) ) . '</span></td>';

        switch ( $pricing_rule_sets['blockrules'][$key]['type'] ) {

          case 'fixed_adjustment':
            $output .= '<td><span class="discount-amount">' . get_woocommerce_currency_symbol() . sprintf( __( '%1$s Discount Per Item', 'woocommerce-dynamic-pricing-table' ), intval( $pricing_rule_sets['blockrules'][$key]['amount'] ) ) . '</span></td>';
          break;

          case 'percent_adjustment':
            $output .= '<td><span class="discount-amount">' . intval( $pricing_rule_sets['blockrules'][$key]['amount'] ) . __( '% Discount', 'woocommerce-dynamic-pricing-table' ) . '</span></td>';
          break;

          case 'fixed_price':
            $output .= '<td><span class="discount-amount">' . get_woocommerce_currency_symbol() . sprintf( __( '%1$s Price Per Item', 'woocommerce-dynamic-pricing-table' ), intval( $pricing_rule_sets['blockrules'][$key]['amount'] ) ) . '</span></td>';
          break;

        }

        $output .= '</tr>';

      }

    }

    $output .= '</table>';

    echo $output;

  }

  /**
   * Outputs the dynamic pricing table.
   * @access  public
   * @since   1.0.0
   */
  public function output_dynamic_pricing_table() {

    $array_rule_sets = $this->get_pricing_array_rule_sets();

    if ( $array_rule_sets && is_array( $array_rule_sets ) && sizeof( $array_rule_sets ) == 1 ) {
      foreach( $array_rule_sets as $pricing_rule_sets ) {
        if ( $pricing_rule_sets['mode'] == 'continuous' ) :
          $this->bulk_pricing_table_output();
        elseif ( $pricing_rule_sets['mode'] == 'block' ) :
          $this->special_offer_pricing_table_output();
        endif;
      }
    }
  }

} // End Class

=== WooCommerce Dynamic Pricing Table ===
Contributors: stuartduff
Tags: ecommerce, e-commerce, store, sales, sell, shop, cart, checkout, storefront
Requires at least: 4.5
Tested up to: 4.5.2
Stable tag: 1.0.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Adds a pricing discount table to WooCommerce products that are offering bulk discounts or special offer discounts and user role discount messages to WooCommerce sections via the [WooCommerce Dynamic Pricing](https://www.woothemes.com/products/dynamic-pricing/) plugin. 

== Installation ==

1. Download the plugin from it's GitHub Repository Download [WooCommerce Dynamic Pricing Table](https://github.com/stuartduff/woocommerce-dynamic-pricing-table).
2. Goto WordPress > Appearance > Plugins > Add New.
3. Click Upload Plugin and Choose File, then select the plugin's .zip file. Click Install Now.
4. Click Activate to use your new plugin right away.

== Minimum Requirements ==

For this extension to function [WooCommerce](https://www.woothemes.com/woocommerce/) and the [WooCommerce Dynamic Pricing](https://www.woothemes.com/products/dynamic-pricing/) extension must be installed and activated on your WordPress site.

== Changelog ==

= 1.0.3 - 27/08/16 =
* Feature - Added the ability to display User Role Pricing discounts on WooCommerce sections.

= 1.0.2 - 26/08/16 =
* Fix - Changed the quantity number output to use the WooCommerce [wc_stock_amount()](https://docs.woocommerce.com/wc-apidocs/function-wc_stock_amount.html) function.

= 1.0.1 - 25/08/16 =
* Fix - Changed the monetary number output to use the WooCommerce wc_price() function.
* Fix - If the max quantity field of a product pricing group is less than 1 or left blank "or more" text will now display instead of a 0.

= 1.0.0 - 20/06/16 =
* Initial Release - first version of the plugin released.

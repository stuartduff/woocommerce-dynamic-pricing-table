=== WooCommerce Dynamic Pricing Table ===
Contributors: stuartduff
Tags: ecommerce, e-commerce, store, sales, sell, shop, cart, checkout, storefront
Requires at least: 4.5
Tested up to: 4.5.2
Stable tag: 1.0.5
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

This extension will add a pricing table and other discount notifications for customers on the frontend of your WooCommerce store when using the [WooCommerce Dynamic Pricing](https://www.woocommerce.com/products/dynamic-pricing/) plugin.
== Installation ==

1. Download the plugin from it's GitHub Repository Download [WooCommerce Dynamic Pricing Table](https://github.com/stuartduff/woocommerce-dynamic-pricing-table).
2. Goto WordPress > Appearance > Plugins > Add New.
3. Click Upload Plugin and Choose File, then select the plugin's .zip file. Click Install Now.
4. Click Activate to use your new plugin right away.

== Minimum Requirements ==

For this extension to function [WooCommerce](https://www.woocommerce.com/) and the [WooCommerce Dynamic Pricing](https://www.woocommerce.com/products/dynamic-pricing/) extension must be installed and activated on your WordPress site.

= FAQ =

Below are the discounts that the plugin will currently display.

* [Advanced Product Discounts](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-7) on WooCommerce products that have either a bulk or special offer discount applied to them.
* [User Role Discount](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-2) will display on WooCommerce product sections.
* [Simple Category Pricing](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-4) will display category discounts on WooCommrce product categories.

== Changelog ==

= 1.0.5 - 05/09/16 =
* Fix - Added check to prevent wc_add_notice() from trying to display on admin.

= 1.0.4 - 30/08/16 =
* Feature - Added the ability to display Simple Category Pricing discounts on WooCommerce categories.

= 1.0.3 - 27/08/16 =
* Feature - Added the ability to display User Role Pricing discounts on WooCommerce sections.

= 1.0.2 - 26/08/16 =
* Fix - Changed the quantity number output to use the WooCommerce [wc_stock_amount()](https://docs.woocommerce.com/wc-apidocs/function-wc_stock_amount.html) function.

= 1.0.1 - 25/08/16 =
* Fix - Changed the monetary number output to use the WooCommerce wc_price() function.
* Fix - If the max quantity field of a product pricing group is less than 1 or left blank "or more" text will now display instead of a 0.

= 1.0.0 - 20/06/16 =
* Initial Release - first version of the plugin released.

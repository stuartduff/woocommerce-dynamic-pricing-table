# WooCommerce Dynamic Pricing Table

This extension will add a pricing table and other discount notifications for customers on the frontend of your WooCommerce store when using the [WooCommerce Dynamic Pricing](https://www.woocommerce.com/products/dynamic-pricing/) plugin.

## Advanced Product Discount Table

**Note:** The extension does not provide styling for the [Advanced Product Discount](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-7) table and any table styling must be provided by your theme itself or by CSS you write. The screenshot below is taken from the [WooCommerce Storefront Theme](https://www.woocommerce.com/storefront/) which does have table styling on product pages included within the theme.

![mixed percentage and fixed dynamic pricing woodev](https://cloud.githubusercontent.com/assets/1190565/17950726/ea7dff32-6a54-11e6-92f5-e1ca36c4868f.png)

## User Role Discount Messages

[User Role](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-2) discount notification messages are displayed on the WooCommerce product sections.

![products woodev](https://cloud.githubusercontent.com/assets/1190565/18025016/3e0735be-6c13-11e6-974b-687ffb3fa7ce.png)

## Simple Category Discount Messages

[Simple Category Pricing](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-4) discount notification messages are displayed on the on WooCommerce product category sections.

![simple-category-discount](https://cloud.githubusercontent.com/assets/1190565/18104005/05035e2e-6ef1-11e6-8364-088994355b89.png)

## Installation

1. Download the plugin from it's GitHub Repository Download [WooCommerce Dynamic Pricing Table](https://github.com/stuartduff/woocommerce-dynamic-pricing-table).
2. Goto WordPress > Appearance > Plugins > Add New.
3. Click Upload Plugin and Choose File, then select the plugin's .zip file. Click Install Now.
4. Click Activate to use your new plugin right away.

## Minimum Requirements

For this extension to function [WooCommerce](https://www.woocommerce.com/) and the [WooCommerce Dynamic Pricing](https://www.woocommerce.com/products/dynamic-pricing/) extension must be installed and activated on your [WordPress](https://wordpress.org/) site.

## FAQ

> What type of discounts does the extension display.

* [Advanced Product Discounts](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-7) on WooCommerce products that have either a bulk or special offer discount applied to them.
* [User Role Discount](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-2) will display on WooCommerce product sections.
* [Simple Category Pricing](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-4) will display category discounts on WooCommrce product categories.

> Are there any limitations to how many product tables will display on an single product.

Only one advanced product pricing group table will display on any single product, if you have more than one pricing group active on a single product the discount table will then be disabled.

> Where should I contact if I have an issue with this extension.

All support requests for this extension should be posted to the [WooCommerce Dynamic Pricing Table Issue Tracker ](https://github.com/stuartduff/woocommerce-dynamic-pricing-table/issues) here on Github.

## Changelog

**1.0.5 - 05/09/16**
* Fix - Added check to prevent wc_add_notice() from trying to display on admin.

**1.0.4 - 30/08/16**
* Feature - Added the ability to display [Simple Category Pricing](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-4) discounts on WooCommerce categories.

**1.0.3 - 27/08/16**
* Feature - Added the ability to display [User Role Pricing](https://docs.woocommerce.com/document/woocommerce-dynamic-pricing/#section-2) discounts on WooCommerce sections.

**1.0.2 - 26/08/16**
* Fix - Changed the quantity number output to use the WooCommerce [wc_stock_amount()](https://docs.woocommerce.com/wc-apidocs/function-wc_stock_amount.html) function.

**1.0.1 - 25/08/16**
* Fix - Changed the monetary number output to use the WooCommerce [wc_price()](https://docs.woocommerce.com/wc-apidocs/function-wc_price.html) function.
* Fix - If the max quantity field of a product pricing group is less than 1 or left blank "or more" text will now display instead of a 0.

**1.0.0 - 20/06/16**
* Initial Release - first version of the plugin released.

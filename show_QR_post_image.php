<?php
/*
Plugin Name: iYannis show QR post image
Description: automatically generate a QR code for your posts with this [show_QR_image] shortcode
Version: 1.0.9 
Author: iYannis
Author URI: http://www.iyannis.gr
*/

function show_QR_image() {
   	
     return '<img src="http://api.qrserver.com/v1/create-qr-code/?size=100x100&data='. get_permalink($post->ID) . '" alt="QR: by iYannis.gr"/>';
}
add_shortcode( 'show_QR_image', 'show_QR_image' );


add_action('admin_menu', 'show_QR_post_image_menu');
function show_QR_post_image_menu() {
	if (function_exists('add_menu_page')) {
		add_menu_page(__('QR post image', 'show_QR_post_image'), __('QR post image', 'show_QR_post_image'), 'manage_options', 'show_QR_post_image/show_QR_post_image_settings.php', '', plugins_url('show_QR_post_image/images/QR_Image.png'));
	}
}

add_filter('plugin_row_meta',  'Register_Plugins_Links', 10, 2);
function Register_Plugins_Links ($links, $file) {
               $base = plugin_basename(__FILE__);
               if ($file == $base) {
                       $links[] = '<a href="admin.php?page=show_QR_post_image/show_QR_post_image_settings.php">' . __('Settings') . '</a>';
                       $links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=www.iyannis.gr@gmail.com&item_name=Donate%201%20Euro%20to%20iYannis.gr&amount=1&currency_code=EUR&charset=UTF-8">' . __('Donate') . '</a>';
                       $links[] = '<a href="http://www.iyannis.gr/blog/qr_image/">' . __('Support') . '</a>';
                       $links[] = '<a href="http://www.iyannis.gr/blog/contact/">' . __('Contact') . '</a>';
                       $links[] = '<a href="http://www.facebook.com/iyannisgr/">' . __('Facebook Page') . '</a>';
               }
               return $links;
       }


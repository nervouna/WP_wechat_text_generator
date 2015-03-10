<?php
/**
 * Plugin Name: 微信公众号文章生成器
 * Plugin URI: http://blog.guanxiaoyu.com
 * Description: 将 WordPress 的文章页面组合成好棒所需的文章样式.
 * Version: 0.1.3
 * Author: 关小羽
 * Author URI: http://blog.guanxiaoyu.com/about-me
 * License: WTFPL
 *
 * DO WHATEVER THE FUCK YOU WANT, PUBLIC LICENSE
 * TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
 *
 * 0. You just DO WHATEVER THE FUCK YOU WANT.
 *
 */

define( 'WTG_ABSPATH', dirname( __FILE__ ) );
define( 'WTG_INCPATH', WTG_ABSPATH . '/includes' );

add_action( 'admin_menu', 'wtg_init');

function wtg_init() {
    add_management_page( '微信文章生成器', '微信文章', 'manage_options', 'wechat_text_generator', 'wechat_show_options' );
}

function wechat_show_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( '据说当你看到这个页面的时候……' ) );
    } else {
        include WTG_INCPATH . '/wechat_post_selector.php';
        include WTG_INCPATH . '/wechat_transformer.php';
    }
}

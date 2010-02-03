<?php
/*
Plugin Name: Hide login/logout message boxes
Plugin URI: http://www.mretzlaff.com/
Description: This plugin will hide the yellow (default) message box(es) on the login & logout screens.
Author: M. Retzlaff
Version: 1.0
Author URI: http://www.mretzlaff.com/
Update Server: http://www.mretzlaff.com/mySoftware/wp/hide-login-logout-message-boxes/
*/

/*
This plugin is (c) Copyright 2009 by M. Retzlaff (www.mretzlaff.com).
Changes, copies and reproductions are not allowed without written permission by the author.
All rights reserved. Alle Rechte vorbehalten.
Some components are copyright by their authors and not under effect of this plugin.
Your donation (http://www.mretzlaff.com/donate/) will help to upgrade and update this plugin.
All your wishes regarding this plugin can be written to: "plugin-wishes@mretzlaff.com"
*/

function wp_backend_hide_boxes() {
	echo "<style>\n p.message { height: 0px; visibility:hidden; display: none; }\n";
	echo "</style>\n";
}

function hllmb_PluginLinks($links, $file) {
	global $domain;

	$plugin = plugin_basename(__FILE__);
 	if ($file == $plugin) {
		return array_merge(
			$links,
			array(sprintf('<a href="http://www.mretzlaff.com/forum/" target="mre_website">%s</a>', __("Forum", $domain))),
			array(sprintf('<a href="http://www.mretzlaff.com/donate/" target="mre_website">%s</a>', __("Donate", $domain)))
		);
	}
 
	return $links;
}

add_action('login_head', 'wp_backend_hide_boxes');
add_filter("plugin_row_meta", "hllmb_PluginLinks", 10, 2);

?>
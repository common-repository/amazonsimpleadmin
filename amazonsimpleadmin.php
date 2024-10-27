<?php
/*
Plugin Name: Affiliate Simple Assistent (ASA1)
Plugin URI: http://www.wp-amazon-plugin.com/
Description: Lets you easily <strong>embed Amazon products</strong> into your WordPress posts by use of <strong>[asa]ASIN[/asa]</strong> shortcode. Supports the use of custom templates. You can choose from various presentation styles and of course create your own template in a few seconds.
Version: 1.5.4
Author: Timo Reith
Author URI: http://www.ifeelweb.de/
*/

/*  Copyright 2007-2013  Timo Reith (email : support@wp-amazon-plugin.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (version_compare(phpversion(), '5.5') === -1) {

    $active_plugins = get_option('active_plugins');

    if (in_array('amazonsimpleadmin/amazonsimpleadmin.php', $active_plugins)) {

        // foreach loop removes all entries if there are more than one for the same plugin
        // like I discovered in my test database
        // array_splice($active_plugins, array_search('amazonsimpleadmin/amazonsimpleadmin.php', $active_plugins), 1);
        // array_splice only removes one entry which could be not enough in some cases
        $new_plungins = array();
        foreach($active_plugins as $plugin) {
            if ($plugin != 'amazonsimpleadmin/amazonsimpleadmin.php' && !empty($plugin)) {
                $new_plungins[] = $plugin;
            }
        }
        update_option('active_plugins', $new_plungins);
    }

    die('Your PHP Version is not compatible with this Plugin. <a href="plugins.php">back</a>');
}

define('ASA_BASE_FILE', __FILE__);
define('ASA_LIB_DIR', dirname(__FILE__) . '/lib/');
include_once(dirname(__FILE__) . '/AsaCore.php');
<?php
/**
 * Plugin Name: Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated</strong>.
 * Version:     2.0
 * Author:      Ivy Group
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * @package    CoreFunctionality
 * @since      1.0.0
 * @copyright  Copyright (c) 2020, Landon Dorrier
 * @license    GPL-2.0+
 */


// Plugin Directory 
define( 'IVY_DIR', dirname( __FILE__ ) );

require_once( IVY_DIR . '/inc/general.php' ); // General - useful funtions
require_once( IVY_DIR . '/inc/reusable-blocks.php' ); // Reusable Blocks accessible in backend
require_once( IVY_DIR . '/inc/cpt-alert_banner.php' ); // Testimonial CPT
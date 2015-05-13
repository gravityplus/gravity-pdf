<?php

/**
 * Bootstrap / Router Class
 * The bootstrap is loaded on WordPress 'plugins_loaded' functionality 
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2015, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/*
    This file is part of Gravity PDF.

    Gravity PDF Copyright (C) 2015 Blue Liquid Designs

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/*
 * Load autoload functionality 
 */
require_once(PDF_PLUGIN_DIR . 'src/autoload.php');

/**
 * @since 4.0
 */
class GFPDF_Router {
    /**
     * Holds our GFPDF_Helper_Data object 
     * which we can autoload with any data needed 
     * @var Object
     */
    public $data;

    /**
     * Setup our plugin functionality
     * Note: Fires on WordPress' init hook
     * @since 4.0
     */
    public function init() {  
        /* Set up our data access layer */
        $this->data = new GFPDF_Helper_Data();
        $this->data->init();    

        /**
         * Run generic actions and filters needed to get the plugin functional 
         * The controllers will set more specific actions / filters as needed 
         */
        $this->add_actions();
        $this->add_filters();

        /* load modules */
        $this->welcome_screen();
        $this->gf_settings();

        /* Add localisation support */       
        load_plugin_textdomain('pdfextended', false,  dirname( plugin_basename( __FILE__ ) ) . '/assets/languages/' );  

    }

    /**
     * Add required plugin actions
     * @since 4.0
     * @return void
     */
    private function add_actions() {
        add_action('init', array($this, 'register_assets'), 10);
        add_action('init', array($this, 'load_assets'), 15);

        /* set our notice action */
        GFPDF_Static_Functions::set_notice_type();
    }

    /**
     * Add required plugin filters
     * @since 4.0
     * @return void
     */
    private function add_filters() {

    }

    /**
     * Register all css and js which can be enqueued when needed 
     * @since 4.0
     * @return void
     */
    public function register_assets() {        
        $this->register_styles();
        $this->register_scripts();        
    }

    /**
     * Register requrired CSS
     * @since 4.0
     * @return void
     */
    private function register_styles() {
        wp_register_style('gfpdf_styles', PDF_PLUGIN_URL . 'src/assets/css/gfpdf-styles.css', array(), PDF_EXTENDED_VERSION);
    }

    /**
     * Register requrired JS
     * @since 4.0
     * @return void
     */
    private function register_scripts() {

    }


    /**
     * Load any assets that are needed 
     * @since 4.0
     * @return void
     */
    public function load_assets() {        
        if($this->is_gfpdf_page()) {
            wp_enqueue_style('gfpdf_styles');       
        }
    }

    /**
     * Check if the current admin page is a Gravity PDF page 
     * @since 4.0
     * @return void
     */    
    private function is_gfpdf_page() {
        if(is_admin()) {
            if(isset($_GET['page']) && substr($_GET['page'], 0, 6) == 'gfpdf-') {
                return true;
            }
        }

        return false;
    }

    


    /**
     * Include Welcome Screen functionality for installation / upgrades
     * @since 4.0
     * @return void
     */
    private function welcome_screen() {

        $model = new GFPDF_Model_Welcome_Screen();
        $view  = new GFPDF_View_Welcome_Screen(array(
            'display_version' => PDF_EXTENDED_VERSION
        ));

        $class = new GFPDF_Controller_Welcome_Screen($model, $view);
        $class->init();
    }

    /**
     * Include Welcome Screen functionality for installation / upgrades
     * @since 4.0
     * @return void
     */
    private function gf_settings() {
        
        $model = new GFPDF_Model_Settings();
        $view  = new GFPDF_View_Settings(array(
        
        ));

        $class = new GFPDF_Controller_Settings($model, $view);        
        $class->init();
    }    
}


/**
 * Execute our bootstrap class 
 */
new GFPDF_Core();
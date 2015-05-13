<?php

/**
 * Settings View
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2015, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0
 */

/* Exit if accessed directly */
if (! defined('ABSPATH')) {
    exit;
}

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

/**
 * View_Welcome_Screen
 *
 * A general class for About / Intro Screen
 *
 * @since 4.0
 */
class GFPDF_View_Settings extends GFPDF_Helper_View
{

    /**
     * Set the view's name
     * @var string
     * @since 4.0
     */
    protected $ViewType = 'Settings';

    /**
     * Enable a private data cache we can set and retrive information from 
     * @var array
     * @since 4.0
     */
    private $data = array();

    public function __construct($data = array()) {
        $this->data = $data;
    }

    /**
     * Load the Update Welcome Page
     * @since 4.0
     */
    public function generalSettings()
    {
        /*
         * Set up any variables we need for the view and display 
         */
        $vars = array(

        ); 

        $vars = array_merge($vars, $this->data);

        /* load the about page view */        
        $this->load('general', $vars);
    }
}

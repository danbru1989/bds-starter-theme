<?php
/**
 * WPForms modifications.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_filter(
	'wpforms_frontend_form_data',
	function( $form_data ) {

		$form_data['settings']['submit_class'] .= ' wp-block-button__link';

		return $form_data;
	}
);

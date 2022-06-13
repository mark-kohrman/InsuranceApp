<?php

/**
 * A class that builds the View for Policy Data
 */

namespace MyApp\Policy;

use MyApp\Policy\Views\PolicyTivView;

require_once 'Views/PolicyTivView.php';

class ViewBuilder
{
	/**
	 * Get the View for the TIV by county and line
	 * 
	 * @return PolicyTivView The View for the TIV by county and line
	 */
	public function buildPolicyTivView(array $tiv_data): PolicyTivView
	{
		$view = new PolicyTivView($tiv_data);

		return $view;
	}
}

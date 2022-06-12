<?php

/**
 * A class that builds the View for Policy Data
 */

namespace MyApp\PolicyData;

use MyApp\PolicyData\Views\PolicyTivView;

require_once 'Views/PolicyTivView.php';

class ViewBuilder
{
	/**
	 * Get the View for the TIV by county and line
	 * 
	 * @return PolicyView The View for the TIV by county and line
	 */
	public function buildTivPolicyView(array $tiv_data): PolicyTivView
	{
		$view = new PolicyTivView($tiv_data);

		return $view;
	}
}

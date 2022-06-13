<?php

namespace MyApp\Policy;

require_once 'ServiceBuilder.php';
require_once 'ViewBuilder.php';


class Processor
{
	/**
	 * Method that processes the data and returns the JSON data from the View
	 * 
	 * @param string $year the TIV year and string needing to be processed
	 */
	public function processTIVData(string $year)
	{
		$service_builder = new ServiceBuilder();
		$service = $service_builder->buildPolicyService();

		$tiv_data = $service->getTivByCountyAndLine($year);

		$view_builder = new ViewBuilder();
		$tiv_view = $view_builder->buildTivPolicyView($tiv_data);

		file_put_contents('output.json2', $tiv_view->getViewOutputJson());

		echo "TIV data processed and outputted to output.json\n";
	}
}
$processor = new Processor();
$tiv_data = $processor->processTIVData('2012');
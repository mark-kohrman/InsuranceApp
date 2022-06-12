<?php

namespace MyApp\PolicyData;

require_once 'ServiceBuilder.php';
require_once 'ViewBuilder.php';


class Processor
{
	public function processTIVData()
	{
		$service_builder = new ServiceBuilder();
		$tiv_service = $service_builder->buildPolicyService();

		$tiv_data = $tiv_service->getTivByCountyAndLine('2012');

		$view_builder = new ViewBuilder();
		$tiv_view = $view_builder->buildTivPolicyView($tiv_data);

		file_put_contents('output2.json', $tiv_view->getViewOutputJson());

		echo "TIV data processed and outputted to output.json\n";
	}
}
$processor = new Processor();
$tiv_data = $processor->processTIVData();

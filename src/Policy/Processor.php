<?php

namespace MyApp\Policy;

use function PHPUnit\Framework\throwException;

require_once 'ServiceBuilder.php';
require_once 'ViewBuilder.php';


class Processor
{
	/**
	 * Method that processes the data and returns the JSON data from the View
	 * 
	 * @param string $original_data_source The file path or URL of the input data that needs to be manipulated
	 * @param string $output_file_name The name of the file to write the JSON data to
	 * @param string $year the TIV year and string needing to be processed
	 * 
	 */
	public function processTIVData(string $original_data_source, string $output_file_name, string $year)
	{
		if (file_exists('src/Policy/FileData/' . $output_file_name)) {
			throw new \Exception("File already exists in the directory");
		}

		$service_builder = new ServiceBuilder();
		$service = $service_builder->buildPolicyService();

		$tiv_data = $service->getTivByCountyAndLine($original_data_source, $year);

		$view_builder = new ViewBuilder();
		$tiv_view = $view_builder->buildPolicyTivView($tiv_data);

		file_put_contents('src/Policy/FileData/' . $output_file_name, $tiv_view->getViewOutputJson());

		echo "TIV data processed and output to " . $output_file_name . " in File Data folder\n";
	}
}
$processor = new Processor();
$tiv_data = $processor->processTIVData('src/Policy/FileData/FL_insurance_sample.csv', 'output1.json', '2012');

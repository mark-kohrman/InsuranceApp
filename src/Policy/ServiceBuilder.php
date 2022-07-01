<?php

namespace MyApp\Policy;

use \MyApp\Policy\Data\Service;
use MyApp\Policy\Data\CsvDataProvider;

require_once 'Data/CsvDataProvider.php';
require_once 'Data/Service.php';

class ServiceBuilder
{
	public function buildPolicyService(): Service
	{
		$csv_data_provider = new CsvDataProvider();

		return new Service($csv_data_provider);
	}
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MyApp\Policy\ServiceBuilder;

require_once 'src/Policy/Data/Service.php';
require_once 'src/Policy/ServiceBuilder.php';

class ServiceTest extends TestCase
{
	/**
	 * Method that tests if TIV data keys are correctly retrieved
	 * 
	 */
	public function testCanGetTivByCountyAndLine()
	{
		$service_builder = new ServiceBuilder();
		$service = $service_builder->buildPolicyService();

		$tiv_data = $service->getTivByCountyAndLine('src/Policy/FileData/FL_insurance_sample.csv', '2012');

		$this->assertIsArray($tiv_data);
		$this->assertArrayHasKey('county', $tiv_data);
		$this->assertArrayHasKey('line', $tiv_data);
	}
}

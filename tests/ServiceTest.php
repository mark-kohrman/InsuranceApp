<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MyApp\Policy\ServiceBuilder;
use MyApp\Policy\API\Service;

require_once 'src/Policy/API/API.php';
require_once 'src/Policy/API/Service.php';
require_once 'src/Policy/ServiceBuilder.php';

class ServiceTest extends TestCase
{
	public function testCanGetTivByCountyAndLine()
	{
		$service_builder = new ServiceBuilder();
		$service = $service_builder->buildPolicyService();

		$tiv_data = $service->getTivByCountyAndLine('2012');

		$this->assertIsArray($tiv_data);
		$this->assertArrayHasKey('county', $tiv_data);
		$this->assertArrayHasKey('line', $tiv_data);
	}
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MyApp\Policy\ServiceBuilder;
use MyApp\Policy\API\Service;

require_once 'src/Policy/API/Service.php';
require_once 'src/Policy/ServiceBuilder.php';

class ServiceBuilderTest extends TestCase
{
	/**
	 * Method that tests if ServiceBuilder can build a Service object
	 * 
	 */
	public function testValidServiceCreatedInServiceBuilder()
	{
		$service_builder = new ServiceBuilder();
		$service = $service_builder->buildPolicyService();

		$this->assertInstanceOf(Service::class, $service);
	}
}

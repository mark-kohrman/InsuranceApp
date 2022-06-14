<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MyApp\Policy\ServiceBuilder;
use MyApp\Policy\API\Service;

require_once 'src/Policy/API/API.php';
require_once 'src/Policy/API/Service.php';
require_once 'src/Policy/ServiceBuilder.php';

class ServiceBuilderTest extends TestCase
{
    public function testCanBeCreatedFromValidService()
    {
        $service_builder = new ServiceBuilder();
        $service = $service_builder->buildPolicyService();

        $this->assertInstanceOf(Service::class, $service);
    }
}

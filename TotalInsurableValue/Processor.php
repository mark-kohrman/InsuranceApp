<?php

namespace MyApp\TotalInsurableValue;

require_once 'ServiceBuilder.php';
require __DIR__ . '/../vendor/autoload.php';

class Processor
{
  public function processTIVData(): array
  {
    $service_builder = new ServiceBuilder();
    $tiv_service = $service_builder->buildTIVService();

    $tiv_data = $tiv_service->getTivByCountyAndLine();

    return $tiv_data;
  }
}
$processor = new Processor();
$tiv_data = $processor->processTIVData();
var_dump($tiv_data);

<?php

namespace MyApp\PolicyData;

require_once 'ServiceBuilder.php';

class Processor
{
  public function processTIVData(): array
  {
    $service_builder = new ServiceBuilder();
    $tiv_service = $service_builder->buildPolicyService();

    $tiv_data = $tiv_service->getTivByCountyAndLine('2012');

    return $tiv_data;
  }
}
$processor = new Processor();
$tiv_data = $processor->processTIVData();
var_dump($tiv_data);

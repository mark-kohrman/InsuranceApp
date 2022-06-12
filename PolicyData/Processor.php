<?php

namespace MyApp\PolicyData;

require_once 'ServiceBuilder.php';
require_once 'ViewBuilder.php';


class Processor
{
  public function processTIVData(): string
  {
    $service_builder = new ServiceBuilder();
    $tiv_service = $service_builder->buildPolicyService();

    $tiv_data = $tiv_service->getTivByCountyAndLine('2012');

    $view_builder = new ViewBuilder();
    $tiv_view = $view_builder->buildTivPolicyView($tiv_data);

    return $tiv_view->getViewOutputJson();
  }
}
$processor = new Processor();
$tiv_data = $processor->processTIVData();
var_dump($tiv_data);

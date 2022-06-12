<?php

namespace MyApp\TotalInsurableValue;

use MyApp\TotalInsurableValue\API\Api;
use MyApp\TotalInsurableValue\API\Service;

require_once 'API/API.php';
require_once 'API/Service.php';

class ServiceBuilder
{
  public function buildTIVService(): Service
  {
    $api = new API();

    return new Service($api);
  }
}

<?php

namespace MyApp\Policy;

use \MyApp\Policy\API\Api;
use \MyApp\Policy\API\Service;

require_once 'API/API.php';
require_once 'API/Service.php';

class ServiceBuilder
{
	public function buildPolicyService(): Service
	{
		$api = new Api();

		return new Service($api);
	}
}

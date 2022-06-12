<?php

namespace MyApp\PolicyData;

use \MyApp\PolicyData\API\Api;
use \MyApp\PolicyData\API\Service;

require_once 'API/API.php';
require_once 'API/Service.php';

class ServiceBuilder
{
	public function buildPolicyService(): Service
	{
		$api = new API();

		return new Service($api);
	}
}

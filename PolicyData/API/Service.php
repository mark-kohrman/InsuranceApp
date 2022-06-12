<?php

/**
 * Service Class for Total Insurable Value
 */

namespace MyApp\PolicyData\API;

use \MyApp\PolicyData\API\API;

class Service
{
	/**
	 * Setup service
	 * 
	 * @param API $api API object
	 */
	public function __construct(API $api)
	{
		$this->api = $api;
	}

	/**
	 * Get the TIV by county and line
	 * 
	 * @return array The TIV by county and line
	 */
	public function getTivByCountyAndLine(string $year): array
	{
		$file = $this->api->fetchPolicyDataCsvFile();

		$formatted_data = $this->formatFileResponse($file, $year);

		return $formatted_data;
	}

	/**
	 * Format the TIV data by county and line
	 * 
	 * @return array The TIV by county and line
	 */
	private function formatFileResponse(array $file, string $year): array
	{
		$tiv_arr = [];
		$tiv_arr['county'] = [];
		$tiv_arr['line'] = [];

		foreach ($file as $data_by_policy) {
			$county = $data_by_policy['county'];
			$line = $data_by_policy['line'];
			$tiv = $data_by_policy['tiv_' . $year];

			if (!isset($tiv_arr['county'][$county])) {
				$tiv_arr['county'][$county] = [];
				$tiv_arr['county'][$county]['tiv_' . $year] = $tiv;
			} else {
				$tiv_arr['county'][$county]['tiv_' . $year] += $tiv;
			}

			if (!isset($tiv_arr['line'][$line])) {
				$tiv_arr['line'][$line] = [];
				$tiv_arr['line'][$line]['tiv_' . $year] = $tiv;
			} else {
				$tiv_arr['line'][$line]['tiv_' . $year] += $tiv;
			}
		}

		return $tiv_arr;
	}
}

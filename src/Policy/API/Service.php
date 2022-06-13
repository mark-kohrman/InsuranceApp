<?php

/**
 * Service Class for Policy Data
 */

namespace MyApp\Policy\API;

use \MyApp\Policy\API\API;

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
	 * Formats the file data by aggregate TIV by county and line
	 * 
	 * @param array $file_data The file data to format
	 * @param string $year The TIV year to process
	 * 
	 * @return array The Aggregate TIV by county and line
	 */
	private function formatFileResponse(array $file_data, string $year): array
	{
		$tiv_arr = [];
		$tiv_arr['county'] = [];
		$tiv_arr['line'] = [];

		$array_keys = array_keys($file_data[0]);

		$this->validateTivYear($array_keys, $year);

		foreach ($file_data as $data_by_policy) {
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

	/**
	 * Validate tiv year exists as a key in the array 
	 * 
	 * @param  array $file The array to validate
	 * 
	 * @return bool True if the year exists
	 * 
	 * @throws \Exception If the year does not exist
	 */
	private function validateTivYear(array $array_keys, string $year): bool
	{
		$year_exists = false;
		$years = [];
		foreach ($array_keys as $key) {
			var_dump($key);
			if (strpos($key, 'tiv_') !== false) {
				$years[] = substr($key, 4);
			}
		}

		if (!in_array($year, $years)) {
			throw new \Exception($year . " is an invalid TIV year for this dataset. Valid years are: " . implode(', ', $years));
		}

		return true;
	}
}

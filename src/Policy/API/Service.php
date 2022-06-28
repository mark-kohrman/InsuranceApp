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
	 * @param Api $api API object
	 */
	public function __construct(Api $api)
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

		$formatted_data = $this->formatFileResponseData($file, $year);

		return $formatted_data;
	}

	/**
	 * Convert floating point numbers to two decimal places dollar amounts in tiv array
	 * 
	 * @param array $tiv_arr The TIV array to convert
	 * 
	 * @return array The TIV array with dollar amounts
	 */
	private function convertTivToDollarFormat(array $tiv_arr): array
	{
		foreach ($tiv_arr as $tiv_type => $tiv_type_category) {
			foreach ($tiv_type_category as $tiv_category => $tiv_category_data) {
				foreach ($tiv_category_data as $tiv_year => $tiv_number) {
					$tiv_arr[$tiv_type][$tiv_category][$tiv_year] = round($tiv_number, 2);
				}
			}
		}

		return $tiv_arr;
	}

	/**
	 * Formats the file data by aggregate TIV by county and line
	 * 
	 * @param array $file_data The file data to format
	 * @param string $year The TIV year to process
	 * 
	 * @return array The Aggregate TIV by county and line
	 */
	private function formatFileResponseData(array $file_data, string $year): array
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
		$tiv_arr = $this->convertTivToDollarFormat($tiv_arr);

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
		$years = [];
		foreach ($array_keys as $key) {
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

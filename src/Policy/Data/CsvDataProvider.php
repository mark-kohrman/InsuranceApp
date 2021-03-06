<?php

/**
 * Data Provider for CSV Files
 */

namespace MyApp\Policy\Data;

use MyApp\Policy\Data\DataProviderInterface;

require_once 'src/Policy/Data/DataProviderInterface.php';

class CsvDataProvider implements DataProviderInterface
{
	/**
	 * Fetches the CSV file from the file path and converts it to an array
	 * 
	 * @param  string $data_source the file to read
	 * 
	 * @return array The raw policy info as an array
	 */
	public function processData(string $data_source): array
	{
		ini_set('auto_detect_line_endings', true);
		$this->validateCsv($data_source);

		$handle = fopen($data_source, "r");
		$file_arr = [];
		$headers = fgetcsv($handle, 1000, ",");

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$file_arr[] = $data;
		}

		fclose($handle);
		$file_arr = $this->setHeadersAsKeys($file_arr, $headers);

		return $file_arr;
	}

	/**
	 * Set the headers as keys in the array
	 * @param  array $file_arr The array to set the headers as keys
	 * @param  array $headers The headers to set as keys
	 * 
	 * @return array The array with the headers as keys
	 * 
	 */
	private function setHeadersAsKeys(array $file_arr, array $headers): array
	{
		foreach ($file_arr as $key => $value) {
			$file_arr[$key] = array_combine($headers, $value);
		}

		return $file_arr;
	}


	/**
	 * Validate the file
	 * 
	 * @param  string $file The file to validate
	 * @throws \Exception    If the file is not found
	 * @throws \Exception    If the file is not readable
	 * @throws \Exception    If the file is not a CSV
	 * 
	 */
	private function validateCsv(string $file_path)
	{
		if (!file_exists($file_path)) {
			throw new \Exception("File not found");
		}

		if (!is_readable($file_path)) {
			throw new \Exception("File is not readable");
		}

		if (!is_file($file_path)) {
			throw new \Exception("File is not a regular file");
		}
	}
}

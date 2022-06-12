<?php

/**
 * Api Provider for Total Insurable Value
 */

namespace MyApp\PolicyData\API;

class API
{
	/**
	 * Get the TIV by county and line
	 * @param  string $file The file to read
	 * @return array The TIV by county and line
	 */

	const FILE_PATH = 'FileData/FL_insurance_sample.csv';

	public function fetchPolicyDataCsvFile(string $file_path = self::FILE_PATH): array
	{
		ini_set('auto_detect_line_endings', true);
		$handle = fopen($file_path, "r");
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
	 * @param  string $file The file to validate
	 * @throws \Exception    If the file is not found
	 * @throws \Exception    If the file is not readable
	 * @throws \Exception    If the file is not a CSV
	 * 
	 * @return void
	 */
	private function validateCsv($file)
	{
		// var_dump('hello');
		// var_dump($file);
		// $handle = fopen($file, "r");
		// $header = fgetcsv($handle, 1000, ",");
		// if (!file_exists($file)) {
		//   throw new \Exception("File not found");
		// }

		// if (!is_readable($file)) {
		//   throw new \Exception("File is not readable");
		// }

		// if (!is_file($file)) {
		//   throw new \Exception("File is not a file");
		// }
	}
}

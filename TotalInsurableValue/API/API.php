<?php

/**
 * Api Provider for Total Insurable Value
 */

namespace TotalInsurableValue\API;

class API
{
  /**
   * Get the TIV by county and line
   * @param  string $file The file to read
   * @return array        The TIV by county and line
   */

  const FILE_PATH = '../FileData/FL_insurance_sample_copy.csv';

  public function fetchCsvFile(string $file = self::FILE_PATH): array
  {
    $this->validateCsv($file);
    $handle = fopen($file, "r");
    $header = fgetcsv($handle, 1000, ",");
    $file_arr = [];
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $file_arr[] = $data;
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
    if (!file_exists($file)) {
      throw new \Exception("File not found");
    }

    if (!is_readable($file)) {
      throw new \Exception("File is not readable");
    }

    if (!is_file($file)) {
      throw new \Exception("File is not a file");
    }
  }
}
$api = new API();
$file = $api->fetchCsvFile();
// var_dump($file);

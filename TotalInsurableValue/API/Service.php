<?php

/**
 * Service Class for Total Insurable Value
 */

namespace MyApp\TotalInsurableValue\API;

use \MyApp\TotalInsurableValue\API\API;

class Service
{
  /**
   * Setup service
   * 
   * @param API $api API object
   */
  public function __construct(API $api)
  {
    $api = new API();
    var_dump($api->fetchCsvFile());
    exit;
    $this->api = $api;
  }

  /**
   * Get the TIV by county and line
   * 
   * @return array The TIV by county and line
   */
  public function getTivByCountyAndLine(): array
  {
    $file = $this->api->fetchCsvFile();

    $formatted_data = $this->formatFileResponse($file);

    return $formatted_data;
  }

  /**
   * Format the TIV data by county and line
   * 
   * @return array The TIV by county and line
   */
  private function formatFileResponse(array $file): array
  {
    $tiv_arr = [];
    $tiv_arr['county'] = [];
    $tiv_arr['line'] = [];
    foreach ($file as $data_by_policy) {
      $county = $data_by_policy[2];
      $line = $data_by_policy[15];
      $tiv_2012 = $data_by_policy[8];
      if (!isset($tiv_arr['county'][$county])) {
        $tiv_arr['county'][$county] = [];
        $tiv_arr['county'][$county]['tiv_2012'] = $tiv_2012;
      } else {
        $tiv_arr['county'][$county]['tiv_2012'] += $tiv_2012;
      }
      if (!isset($tiv_arr['line'][$line])) {
        $tiv_arr['line'][$line] = [];
        $tiv_arr['line'][$line]['tiv_2012'] = 0;
      } else {
        $tiv_arr['line'][$line]['tiv_2012'] += $tiv_2012;
      }
    }

    return $tiv_arr;
  }
  // $api = new API();
  // var_dump($api->fetchCsvFile());
  // exit;
}
// $service = new Service($api);
// $file = $service->getTivByCountyAndLine();
// var_dump($file);

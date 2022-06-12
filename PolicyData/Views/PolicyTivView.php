<?php

/**
 * A View for Total Insurable Value by county and line
 */

namespace MyApp\PolicyData\Views;

class PolicyTivView
{
  /**
   * @var array The TIV by county and line
   */
  private $tiv_data;



  /**
   * The constructor for the PolicyView
   * 
   * @param array $tiv_data The TIV by county and line
   * 
   */
  public function __construct(array $tiv_data)
  {
    $this->tiv_data = $tiv_data;
  }

  /**
   * Get the TIV by county and line
   * 
   * @return array The TIV by county and line
   */
  public function getTivByCountyAndLine(): array
  {
    return $this->tiv_data;
  }

  /**
   * Get View Output JSON for the TIV by county and line
   * 
   * @return string The TIV by county and line
   */
  public function getViewOutputJson(): string
  {
    return json_encode($this->tiv_data);
  }
}

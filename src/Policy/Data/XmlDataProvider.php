<?php

/**
 * Data Provider for CSV Files
 */

namespace MyApp\Policy\Data;

use MyApp\Policy\Data\DataProviderInterface;

require_once 'src/Policy/Data/DataProviderInterface.php';

class XmlDataProvider implements DataProviderInterface
{
    /**
     * Function that takes in XML data source and converts to array
     * 
     * @param string $data_source - would likely be an XML URL
     * 
     * @return array $file_arr of converted XML data
     */
    public function processData(string $data_source)
    {
        // Dummy function to show interface working with different data provider sources
    }
}

<?php

/**
 * Data Provider for CSV Files
 */

namespace MyApp\Policy\Data;

use MyApp\Policy\Data\DataProviderInterface;

require_once 'src/Policy/Data/DataProviderInterface.php';

class XmlDataProvider implements DataProviderInterface
{
    public function processData(string $data_source)
    {
        // Dummy function to show interface working with different data provider sources
    }
}

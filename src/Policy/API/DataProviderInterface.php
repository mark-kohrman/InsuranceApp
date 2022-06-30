<?php

namespace MyApp\Policy\API\DataProvider;

interface DataProviderInterface
{
    public function processData(string $data_source);
}

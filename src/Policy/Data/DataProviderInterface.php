<?php

namespace MyApp\Policy\Data;

interface DataProviderInterface
{
    public function processData(string $data_source);
}

<?php

namespace App\Contracts;

interface StatisticsServiceContract
{

    public function getColumnNames(): array;

    public function getTableData(): array;

}

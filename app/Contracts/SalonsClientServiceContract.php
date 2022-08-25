<?php

namespace App\Contracts;

interface SalonsClientServiceContract
{
    public function getSalons($limit, $random): array;
}

<?php

namespace App\Contracts;

interface SalonsClientRepositoryContract
{
    public function footerSalons($limit, $random): array;

    public function allSalons($limit, $random): array;

}

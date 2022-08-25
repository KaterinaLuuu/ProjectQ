<?php

namespace App\Repositories;

use App\Contracts\SalonsClientRepositoryContract;
use App\Contracts\SalonsClientServiceContract;

class SalonsClientRepository implements SalonsClientRepositoryContract
{
    public $salonService;

    public function __construct(SalonsClientServiceContract $salonService)
    {
        $this->salonService = $salonService;
    }

    public function footerSalons($limit, $random): array
    {
        $cache = \Cache::tags('salons')->remember('footer_salons', 300, function () use ($limit, $random) {
            return $this->salonService->getSalons($limit, $random);
        });

        if (empty($cache)) {
            \Cache::tags('salons')->flush();

            $cache = \Cache::tags('salons')->remember('footer_salons', 300, function () use ($limit, $random) {
                return $this->salonService->getSalons($limit, $random);
            });
        };

        return $cache;
    }

    public function allSalons($limit, $random): array
    {
        $salons = \Cache::tags('salons')->remember('all_salons', 3600, function () use ($limit, $random) {
            return $this->salonService->getSalons($limit, $random);
        });

        if (empty($salons)) {
            \Cache::tags('salons')->flush();

            $salons = \Cache::tags('salons')->remember('all_salons', 3600, function () use ($limit, $random) {
                return $this->salonService->getSalons($limit, $random);
            });
        }

        return $salons;
    }

}

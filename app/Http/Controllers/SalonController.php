<?php

namespace App\Http\Controllers;

use App\Contracts\SalonsClientRepositoryContract;

class SalonController extends Controller
{
    public function index(SalonsClientRepositoryContract $salonsClientRepository)
    {
        $salons = $salonsClientRepository->allSalons(null, false);

        return view('pages.salons', compact('salons'));
    }

}

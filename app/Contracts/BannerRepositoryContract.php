<?php

namespace App\Contracts;

interface BannerRepositoryContract
{
    public function getRandomBanner($limit);

}

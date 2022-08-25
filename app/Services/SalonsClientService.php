<?php

namespace App\Services;

use App\Contracts\SalonsClientServiceContract;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    private $login;
    private $password;

    protected $url;

    public function __construct($login, $password, $url)
    {
        $this->login = $login;
        $this->password = $password;
        $this->url = $url;
    }

    public function getSalons($limit, $random): array
    {
        $response = Http::withBasicAuth($this->login, $this->password)
            ->get($this->url, ['limit' => $limit, $random]);

        if ($response->status() === 200) {
            return $response->json();
        }

        return [];
    }
}

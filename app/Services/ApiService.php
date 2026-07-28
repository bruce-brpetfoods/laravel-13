<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.totvs.url');
    }

}
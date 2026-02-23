<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LmsApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.lms.base_url');
    }

    public function getFaculties()
    {
        return Cache::remember('lms_faculties', 3600, function () {
            return Http::timeout(5)
                ->withoutVerifying()
                ->retry(2, 200)
                ->get("{$this->baseUrl}/faculties")
                ->json();
        });
    }

    public function getUsers()
    {
        return Cache::remember('lms_users', 300, function () {
            return Http::timeout(5)
                ->withoutVerifying()
                ->retry(2, 200)
                ->get("{$this->baseUrl}/get-users")
                ->json();
        });
    }

    public function register(array $data)
    {
        return Http::timeout(10)
            ->withoutVerifying()
            ->post("{$this->baseUrl}/register", array_merge([
                'access_code' => 'piffersoftware'
            ], $data))
            ->json();
    }
}

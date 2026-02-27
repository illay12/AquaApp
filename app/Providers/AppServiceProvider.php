<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Folosește view-ul nostru custom pentru paginare
        Paginator::defaultView('\pagination\pagination-aquaserv');
    }
}

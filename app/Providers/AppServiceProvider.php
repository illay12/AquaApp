<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Folosește view-ul nostru custom pentru paginare
        Paginator::defaultView('pagination.pagination-aquaserv');

        // Directivă Blade pentru CSP nonce
        Blade::directive('nonce', function () {
            return '<?php echo app(\'csp-nonce\'); ?>';
        });

        // Forțează HTTPS în producție
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

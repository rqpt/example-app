<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;
use Livewire\Volt\Volt;

/**
 * Here, we register Folio and Volt, so we can get rid
 * of our routes and controller completely.
 */
class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $viewPath = resource_path('views/pages');

        Folio::path($viewPath);
        Volt::mount($viewPath);
    }
}

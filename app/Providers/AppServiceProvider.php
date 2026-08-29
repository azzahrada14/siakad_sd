<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\TahunAjaran;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pagination Tailwind
        Paginator::useTailwind();

        // Tahun ajaran aktif untuk semua halaman
        View::composer('*', function ($view) {

            $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

            $view->with('tahunAktif', $tahunAktif);

        });
    }
}
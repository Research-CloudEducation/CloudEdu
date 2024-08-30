<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ClassLevel;
use Carbon\Carbon;
use App\Models\School;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        //
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $schools = School::all();
            $categories = Category::all();
            $classLevels = ClassLevel::all();
            $view->with([
                'schools' => $schools,
                'categories' => $categories,
                'classLevels' => $classLevels
            ]);
        });
    
        View::composer('*', function ($view) {
            $month = Carbon::now()->format('F');
    
            $view->withMonth($month);
        });
    }
}

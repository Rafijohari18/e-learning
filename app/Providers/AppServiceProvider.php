<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Program;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale($this->app->getLocale());
         View()->composer('components.sidebar',function($view){
            // Config LINK  

            $data['program']   = Program::get();
        

            $view
            ->with('program' , $data['program']);
            
        });


    }
}

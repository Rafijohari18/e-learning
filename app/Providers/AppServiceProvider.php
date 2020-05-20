<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Program;
use App\Konten;
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
            $data['program']   = Program::orderBy('nama_program')->get();
            $view
            ->with('program' , $data['program']);
        });

        // LP FOOTER
        View()->composer('components.lpfooter',function($view){
            $program = Program::latest()->limit(3)->get();
            $view
            ->with('program',$program);
        });

        View()->composer('components.lpfooter',function($view){
            $konten = Konten::latest()->limit(3)->get();
            $view
            ->with('konten',$konten);
        });

    }
}
